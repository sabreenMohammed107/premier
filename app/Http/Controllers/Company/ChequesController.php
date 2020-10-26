<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CompanyUser;
use App\Models\Bank;
use App\Models\CashMaster;
use App\Models\Cheque;
use App\Models\Company;
use App\Models\FinanTransaction;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class ChequesController extends Controller
{
    //Cheques
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = session('company_id');
        $Company = Company::find($id);
        $Cheques = Cheque::where('company_id','=',$id)->get();
        // return $Cheques;
        return view('Company.cheques.index',[
            'Company'=>$Company,
            'Cheques'=>$Cheques,
        ]);
    }

    public function Add()
    {
        $id = session('company_id');
        $Company = Company::find($id);

        $Suppliers = Person::where([['company_id','=',$id],['person_type_id','=',101]])->get();

        $LastCheque = DB::table('cheques')
        ->where('company_id','=',$id)->orderBy('cheque_serial','DESC')->first();
        if($LastCheque){
            $FollowingCode = ($LastCheque->cheque_serial + 1);
        }else{
            $FollowingCode = 1;
        }

        return view('Company.cheques.add',[
            'Company'=>$Company,
            'Suppliers'=>$Suppliers,
            'Code'=>$FollowingCode,
        ]);
    }

    public function Edit(int $cash_id)
    {
        $id = session('company_id');
        $Company = Company::find($id);

        $Cheque = Cheque::find($cash_id);
        if($Cheque->person_id != null){
            $Person = Person::find($Cheque->person_id);
            $Persons = Person::where([['company_id','=',$id],['person_type_id','=',$Person->person_type_id]])->get();
        }else{
            $Person = new stdClass();
            $Person->person_type_id = 0;
            $Person->id = 0;
            $Persons = [];
        }


        return view('Company.cheques.edit',[
            'Company'=>$Company,
            'Persons'=>$Persons,
            'Person'=>$Person,
            'Cheque'=>$Cheque,
        ]);
    }

    public function View(int $cash_id)
    {
        $id = session('company_id');
        $Company = Company::find($id);

        $Cheque = Cheque::find($cash_id);
        if($Cheque->person_id != null){
            $Person = Person::find($Cheque->person_id);
            $Persons = Person::where([['company_id','=',$id],['person_type_id','=',$Person->person_type_id]])->get();
        }else{
            $Person = new stdClass();
            $Person->person_type_id = 0;
            $Person->id = 0;
            $Persons = [];
        }


        return view('Company.cheques.view',[
            'Company'=>$Company,
            'Persons'=>$Persons,
            'Person'=>$Person,
            'Cheque'=>$Cheque,
        ]);
    }

    public function Create(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = session('company_id');
            $Company = Company::find($id);
            $request->merge([
                'company_id' => $id,
            ]);
            if($request->optionsRadios0 == 'person'){
                $Person = Person::find($request->person_id);
                $request->merge([
                    'person_name' => $Person->person_name,
                ]);
                $Cheque = Cheque::create($request->except(['optionsRadios0','optionsRadios2','person_type']));

                if($request->optionsRadios2 == 'current'){
                    if($request->trans_type == 0){
                        DB::table('finan_transactions')->insert(
                            ['transaction_type_id' => '109',
                            'transaction_date' => $request->transaction_date,
                            'person_id'=>$request->person_id,
                            'person_name'=>$request->person_name,
                            'person_type_id'=>$request->person_type,
                            'bank_id'=>$request->bank_id,
                            'cheque_id'=>$Cheque->id,
                            'subtractive'=>$request->amount,
                            'purch_sales_statement'=>' حركة ايداع بنك '.$request->notes,
                            ]
                        );
                    }else{
                        DB::table('finan_transactions')->insert(
                            ['transaction_type_id' => '108',
                            'transaction_date' => $request->transaction_date,
                            'person_id'=>$request->person_id,
                            'person_name'=>$request->person_name,
                            'person_type_id'=>$request->person_type,
                            'bank_id'=>$request->bank_id,
                            'cheque_id'=>$Cheque->id,
                            'additive'=>$request->amount,
                            'purch_sales_statement'=>'حركة ايداع بنك '.$request->notes,
                            ]
                        );
                    }

                }
            }else{
                $Cheque = Cheque::create($request->except(['optionsRadios0','optionsRadios2','person_type']));
                if($request->optionsRadios2 == 'current'){
                    DB::table('finan_transactions')->insert(
                        ['transaction_type_id' => '108',
                            'transaction_date' => $request->transaction_date,
                            'bank_id'=>$request->bank_id,
                            'cheque_id'=>$Cheque->id,
                            'additive'=>$request->amount,
                            'purch_sales_statement'=>'حركة ايداع بنك '.$request->notes,
                        ]
                    );
                    DB::table('finan_transactions')->insert(
                        ['transaction_type_id' => '108',
                            'transaction_date' => $request->transaction_date,
                            'safe_id'=>$Company->safe_id,
                            'cheque_id'=>$Cheque->id,
                            'subtractive'=>$request->amount,
                            'purch_sales_statement'=>'حركة ايداع بنك '.$request->notes,
                        ]
                    );

                }



            }
            DB::commit();

            return redirect("/Cheques")->with('flash_success', "تم اضافة الشيك بنجاح");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return redirect("/Cheques")->with('flash_danger', "لم تتم اضافة الشيك ");
        }
    }

    public function Update(Request $request)
    {
       DB::beginTransaction();
       try {
            $Cheque = Cheque::find($request->id);
            $id = session('company_id');
            $request->merge([
                'company_id' => $id,
            ]);
            if($request->optionsRadios0 == 'person'){
                $Person = Person::find($request->person_id);
                $request->merge([
                    'person_name' => $Person->person_name,
                ]);
                $Transaction = FinanTransaction::where('cheque_id','=',$request->id)->first();
                if($Cheque->trans_type == 0){
                    $Transaction->Update([
                    'transaction_date' => $request->transaction_date,
                    'purch_sales_statement'=>'حركة صرف بنك '.$request->notes,
                    ]);
                }else{
                    $Transaction->Update([
                    'transaction_date' => $request->transaction_date,
                    'purch_sales_statement'=>'حركة ايداع بنك '.$request->notes,
                    ]);
                }

            }else{
                $request->merge([
                    'person_name' => null,
                    'person_id'=>null,
                ]);
                $Transactions = FinanTransaction::where('cheque_id','=',$request->id)->get();
                foreach ($Transactions as $key => $Transaction) {
                    if($Cheque->trans_type == 0){
                        $Transaction->Update([
                        'transaction_date' => $request->transaction_date,
                        'purch_sales_statement'=>'حركة صرف بنك '.$request->notes,
                        ]);
                    }else{
                        $Transaction->Update([
                        'transaction_date' => $request->transaction_date,
                        'purch_sales_statement'=>'حركة ايداع بنك '.$request->notes,
                        ]);
                    }
                }

            }
            $Cheque->update($request->except(['optionsRadios0','optionsRadios2','person_type']));
            DB::commit();
            return redirect("/Cheques")->with('flash_success', "تم تعديل بيانات الشيك رقم $Cheque->cheque_no بنجاح");
       } catch (\Throwable $th) {
           throw $th;
           DB::rollback();
           return redirect("/Cheques")->with('flash_danger', "لم يتم تعديل بيانات الشيك رقم $Cheque->cheque_no ");

       }
    }

    public function Delete(int $cash_id)
    {
        DB::beginTransaction();
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $Cheque = Cheque::find($cash_id);
            $Cheque->delete();
            $Transactions = FinanTransaction::where('cheque_id','=',$cash_id)->delete();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            DB::commit();
            return redirect("/Cheques")->with('flash_success', "تم حذف بيانات الشيك رقم $Cheque->cheque_no بنجاح");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return redirect("/Cheques")->with('flash_danger', "لم يتم حذف بيانات الشيك رقم $Cheque->cheque_no ");
        }
    }
}
