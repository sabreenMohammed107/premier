<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CompanyUser;
use App\Models\BusinessItemsSetup;
use App\Models\CashMaster;
use App\Models\Company;
use App\Models\FinanTransaction;
use App\Models\Person;
use App\Models\Safe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function Index()
    {
        $id = session('company_id');
        $Company = Company::find($id);
        $cash_purchasing = DB::table('cash_master')
        ->where([['company_id','=',$id],['cash_master_type','=',0]])->get();

        return view('Company.cashPurchasing.index',[
            'cash_purchasing'=>$cash_purchasing,
            'Company'=>$Company,
        ]);
    }

    // Add new cash purchasing
    public function Add()
    {
        $id = session('company_id');
        $Company = Company::find($id);

        $Suppliers = DB::table('persons')
        ->where([['company_id','=',$id],['person_type_id','=',101]])->get();

        $SafeCurrentBalance = DB::table('finan_transactions')
        ->select(DB::raw('sum(additive-subtractive) as current'))
        ->where('safe_id','=',$Company->safe_id)
        ->first();

        $maxCashPurchase = DB::table('cash_master')
        ->where([['company_id','=',$id],['cash_master_type','=',0]])->orderBy('exit_permission_code','DESC')->first();
        if($maxCashPurchase){
            $followingExitCode = ($maxCashPurchase->exit_permission_code + 1);
        }else{
            $followingExitCode = 1;
        }

        $VAT = BusinessItemsSetup::find(100);
        $CIT_Items = BusinessItemsSetup::find(101);
        $CIT_Services = BusinessItemsSetup::find(102);

        return view('Company.cashPurchasing.add',[
            'Suppliers'=>$Suppliers,
            'Code'=>$followingExitCode,
            'VAT'=>$VAT,
            'CIT_Items'=>$CIT_Items,
            'CIT_Services'=>$CIT_Services,
            'Company'=>$Company,
            'SafeCurrentBalance'=>$SafeCurrentBalance,
        ]);
    }

    //Edit page
    public function Edit(int $cash_id)
    {
        $id = session('company_id');
        $Company = Company::find($id);

        $Cash = CashMaster::find($cash_id);
        if($Cash->person_id){
            $Person = Person::find($Cash->person_id);
            $Persons = DB::table('persons')
            ->where([['company_id','=',$id],['person_type_id','=',$Person->person_type_id]])->get();
        }else{
            $Person = new stdClass();
            $Person->person_type_id = 0;
            $Person->id = 0;
            $Persons = [];
        }

        $SafeCurrentBalance = DB::table('finan_transactions')
        ->select(DB::raw('sum(additive-subtractive) as current'))
        ->where('safe_id','=',$Company->safe_id)->first();

        $VAT = BusinessItemsSetup::find(100);
        $CIT_Items = BusinessItemsSetup::find(101);
        $CIT_Services = BusinessItemsSetup::find(102);


        return view('Company.cashPurchasing.edit',[
            'Persons'=>$Persons,
            'Cash'=>$Cash,
            'Person'=>$Person,
            'VAT'=>$VAT,
            'CIT_Items'=>$CIT_Items,
            'CIT_Services'=>$CIT_Services,
            'Company'=>$Company,
            'SafeCurrentBalance'=>$SafeCurrentBalance,
        ]);
    }

    public function Create(Request $request)
    {
        // return $request->person_id;
        DB::beginTransaction();
        try {
            $id = session('company_id');
            $Company = Company::find($id);
            $request->merge([
                'company_id' => $id,
            ]);
            if($request->person_type != null){
                $Person = Person::find($request->person_id);
                $request->merge([
                    'person_name' => $Person->person_name,
                ]);
            }


            $CashPurch = CashMaster::create($request->all());
            if($request->person_type != null){
                FinanTransaction::create(
                    ['transaction_type_id' => '107',
                    'transaction_date' => $CashPurch->cash_date,
                    'person_id' => $Person->id,
                    'person_name'=>$Person->person_name,
                    'person_type_id'=> $Person->person_type_id,
                    'safe_id'=>$Company->safe_id,
                    'cash_id'=>$CashPurch->id,
                    'permission_code'=>$request->exit_permission_code,
                    'subtractive'=>$request->net_value,
                    'purch_sales_statement'=>$request->statement,
                    ]
                );
            }else{
                FinanTransaction::create(
                    ['transaction_type_id' => '107',
                    'transaction_date' => $CashPurch->cash_date,
                    'person_name'=>$request->person_name,
                    'safe_id'=>$Company->safe_id,
                    'cash_id'=>$CashPurch->id,
                    'subtractive'=>$request->net_value,
                    'permission_code'=>$request->exit_permission_code,
                    'purch_sales_statement'=>$request->statement,
                    ]
                );
            }
            DB::commit();
            return redirect("/Cash/Purchasing")->with('flash_success', "تم اضافة المدفوعات بنجاح");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return redirect("/Cash/Purchasing")->with('flash_danger', "لم يتم اضافة المدفوعات ");

        }


    }

    public function Update(Request $request, int $cash_id)
    {
        DB::beginTransaction();
        try {
            $Cash = CashMaster::find($cash_id);
            $id = session('company_id');
            $Company = Company::find($id);
            $request->merge([
                'company_id' => $id,
            ]);
            if($request->person_type != null){
                $Person = Person::find($request->person_id);
                $request->merge([
                    'person_name' => $Person->person_name,
                ]);
            }else{
                $request->merge([
                    'person_id' => null,
                ]);
            }

            $CashPurch = $Cash->update($request->except('id'));
            $Transaction = FinanTransaction::where('cash_id','=',$cash_id)->first();
            if($request->person_type != null){
                $Transaction->update(
                    ['transaction_type_id' => '107',
                    'transaction_date' => $CashPurch->cash_date,
                    'person_id' => $Person->id,
                    'person_name'=>$Person->person_name,
                    'cash_id'=>$cash_id,
                    'person_type_id'=> $Person->person_type_id,
                    'safe_id'=>$Company->safe_id,
                    'subtractive'=>$request->net_value,
                    'purch_sales_statement'=>$request->statement,
                    ]
                );
            }else{
                $Transaction->update(
                    ['transaction_type_id' => '107',
                    'transaction_date' => $CashPurch->cash_date,
                    'person_name'=>$request->person_name,
                    'person_id'=>null,
                    'person_type_id'=>null,
                    'safe_id'=>$Company->safe_id,
                    'cash_id'=>$cash_id,
                    'subtractive'=>$request->net_value,
                    'purch_sales_statement'=>$request->statement,
                    ]
                );
            }

            DB::commit();
            return redirect("/Cash/Purchasing")->with('flash_success', "تم تعديل بيانات المدفوعات بنجاح");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return redirect("/Cash/Purchasing")->with('flash_danger', "لم يتم تعديل بيانات المدفوعات ");
        }

    }

    public function Delete(int $cash_id)
    {
        DB::beginTransaction();
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $Cash = CashMaster::find($cash_id);
            $Transaction = FinanTransaction::where('cash_id','=',$cash_id)->first();

            $Cash->delete();
            $Transaction->delete();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            DB::commit();
            return redirect("/Cash/Purchasing")->with('flash_success', "تم حذف بيانات المدفوعات بنجاح");

        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return redirect("/Cash/Purchasing")->with('flash_danger', "لم يتم حذف بيانات المدفوعات");
        }



    }


    public function View(int $cash_id)
    {
        $id = session('company_id');
        $Cash = CashMaster::find($cash_id);
        $Company = Company::find($id);

        return view('Company.cashPurchasing.view',[
            'Cash'=>$Cash,
            'Company'=>$Company,
        ]);
    }
}
