<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bank;
use App\Models\FinanTransaction;
use App\Models\Safe;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;
class CompaniesController extends Controller
{
    protected $lang;

    public function __construct()
    {
        $this->middleware('auth');
      
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // for lang
        // dd(app()->getLocale());
        $id = session('company_id');
        //Current Company data
        $Company = Company::find($id);

        //Check if found
        $EmpCount = Person::where('person_type_id','=',102)->count();
        $SupCount = Person::where('person_type_id','=',101)->count();
        $ClientCount = Person::where('person_type_id','=',100)->count();
        //Suppliers Data belongs to the same company
        $Suppliers = DB::table('persons')
        ->select(DB::raw('sum(additive - subtractive) as total,persons.id,persons.person_name,person_logo,phone1,phone2,registeration_no,contact_person_name,active,persons.person_type_id'))
        ->join('finan_transactions','finan_transactions.person_id','=','persons.id')
        ->where([
            ['persons.person_type_id','=',101],
            ['company_id','=',$id]
        ])
        ->groupBy(['persons.id','persons.person_name','person_logo','phone1','phone2','registeration_no','contact_person_name','active','persons.person_type_id'])
        ->paginate(6,'','suppliers_page');

        //Employees Data belongs to the same company
        $Employees = DB::table('persons')
        ->select(DB::raw('sum(additive - subtractive) as total,persons.id,person_logo,persons.person_name,phone1,phone2,registeration_no,contact_person_name,active,persons.person_type_id'))
        ->join('finan_transactions','finan_transactions.person_id','=','persons.id')
        ->where([
            ['persons.person_type_id','=',102],
            ['company_id','=',$id]
        ])
        ->groupBy(['persons.id','persons.person_name','person_logo','phone1','phone2','registeration_no','contact_person_name','active','persons.person_type_id'])
        ->paginate(6,'','employees_page');

        //Clients Data belongs to the same company
        $Clients = DB::table('persons')
        ->select(DB::raw('sum(additive - subtractive) as total,persons.id,persons.person_name,person_logo,phone1,phone2,registeration_no,contact_person_name,active,persons.person_type_id'))
        ->join('finan_transactions','finan_transactions.person_id','=','persons.id')
        ->where([
            ['persons.person_type_id','=',100],
            ['company_id','=',$id]
        ])
        ->groupBy(['persons.id','persons.person_name','person_logo','phone1','phone2','registeration_no','contact_person_name','active','persons.person_type_id'])
        ->paginate(6,'','clients_page');



        //Transactions to calculate capital
        if($Company->safe_id){
            $SafeAdditiveSum = DB::table('finan_transactions')
            ->select(DB::raw('sum(additive - subtractive) as total'))
            ->where('safe_id','=',$Company->safe_id)
            ->first();
            $SafeTotal = $SafeAdditiveSum->total;
        }else{
            $SafeTotal = 0;
        }
        if($Company->bank_id){
            $BankAdditiveSum = DB::table('finan_transactions')
            ->select(DB::raw('sum(additive - subtractive) as total'))
            ->Where('bank_id','=',$Company->bank_id)
            ->first();

            $BankTotal = $BankAdditiveSum->total;
        }else{
            $BankTotal = 0;
        }
        // $Capital = $SafeTotal + $BankTotal;
        // return $Capital;

        //Company bank
        $Bank = $Company->bank()->first();

        //Company safe
        $Safe = $Company->safe()->first();

        return view('Company.companies.company-profile',[
            'Suppliers' => $Suppliers,
            'Employees'=>$Employees,
            'Clients'=>$Clients,
            'Company'=>$Company,
            'Bank'=>$Bank,
            'Safe'=>$Safe,
            'BankTotal'=>$BankTotal,
            'SafeTotal'=>$SafeTotal,
            'EmpCount'=>$EmpCount,
            'SupCount'=>$SupCount,
            'ClientCount'=>$ClientCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = session('company_id');
        //Company data
        $Company = Company::find($id);

        //Company safe and bank
        $Safe = $Company->safe()->first();
        $Bank = $Company->bank()->first();

        //Transactions to calculate capital
        if($Company->safe_id){
            $SafeAdditiveSum = DB::table('finan_transactions')
            ->select(DB::raw('sum(additive - subtractive) as total'))
            ->where('safe_id','=',$Company->safe_id)
            ->first();
            //check for safe open balance availability
            $SafeOpenBalance = DB::table('finan_transactions')
            ->where([['transaction_type_id','<>',110],['safe_id','=',$Company->safe_id]])->count();
            if($SafeOpenBalance != 0){
                $Sopen = 1;
            }else{
                $Sopen = 0;
            }
            $SafeTotal = $SafeAdditiveSum->total;
        }else{
            $SafeTotal = 0;
            $Sopen = 0;
        }
        if($Company->bank_id){
            $BankAdditiveSum = DB::table('finan_transactions')
            ->select(DB::raw('sum(additive - subtractive) as total'))
            ->Where('bank_id','=',$Company->bank_id)
            ->first();
            //check for Bank open balance availability
            $BankOpenBalance = DB::table('finan_transactions')
            ->where([['transaction_type_id','<>',110],['bank_id','=',$Company->bank_id]])->count();
            if($BankOpenBalance != 0){
                $Bopen = 1;
            }else{
                $Bopen = 0;
            }
            $BankTotal = $BankAdditiveSum->total;
        }else{
            $BankTotal = 0;
            $Bopen = 0;
        }
        // $Capital = $SafeTotal + $BankTotal;

        return view('Company.companies.company-edit',[
            'Company'=>$Company,
            'Safe'=>$Safe,
            'Bank'=>$Bank,
            // 'Capital'=>$Capital,
            'BankTotal'=>$BankTotal,
            'SafeTotal'=>$SafeTotal,
            'Sopen'=>$Sopen,
            'Bopen'=>$Bopen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = session('company_id');

        //Company data
        $Company = Company::find($id);
            DB::beginTransaction();
            try {
                //select open balance
                $OpenBalance = DB::table('finan_transactions')
                ->where([['transaction_type_id','=',110],['company_id','=',$id]]);

                //Store Company image
                if($request->hasFile('company_logo')){
                    $extension = $request->company_logo->extension();
                    $filename = time() . '.' . $extension;
                    $path = public_path('uploads/companies');
                    $request->file('company_logo')->move($path,$filename);
                    // return $filename;
                    $Company->company_logo = $filename;
                    $Company->save();
                }

                //Edit request data
                if ($request->taxable == "on") {
                    $request->merge([
                        'taxable' => 1,
                    ]);
                }else{
                    $request->merge([
                        'taxable' => 0,
                    ]);
                }
                if ($request->active == "on") {
                    $request->merge([
                        'active' => 1,
                    ]);
                }else{
                    $request->merge([
                        'active' => 0,
                    ]);
                }

                $Company->update($request->except('company_logo'));

                DB::commit();

                return redirect("/Company")->with('flash_success', \Lang::get('titles.update_msg'));
           
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();

                return redirect("/Company")->with('flash_danger',\Lang::get('titles.update_msg_error'));
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //same route different functions
    // Add safe
    public function AddSafe(Request $request)
    {
        $id = session('company_id');
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $Safe = Safe::create($request->all());

            $Company = Company::find($id);
            $Company->update(['safe_id' => $Safe->id]);

            DB::table('finan_transactions')->insert(
                ['transaction_type_id' => '110',
                 'transaction_date' => $request->balance_start_date,
                 'safe_id' => $Safe->id,
                 'additive' => $request->open_balance,
                 'purch_sales_statement'=>'رصيد افتتاحي',
                ]
            );

            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect("/Company")->with('flash_success', \Lang::get('titles.update_msg'));
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect("/Company")->with('flash_danger', \Lang::get('titles.update_msg_error'));
        }



    }

    //Edit safe
    public function EditSafe(Request $request)
    {
        $id = session('company_id');
        $Company = Company::find($id);
        $Safe = Safe::find($Company->safe_id);
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['safe_id','=',$Company->safe_id]])->count();
        if($Transactions == 0){
            DB::beginTransaction();
            try {

                //open balance transaction
                $SafeTrans = DB::table('finan_transactions')
                ->where([
                    ['safe_id','=',$Company->safe_id],
                    ['transaction_type_id','=',110]
                ]);
                //update data
                $Safe->update($request->all());
                $SafeTrans->update([
                'transaction_date' => $request->balance_start_date,
                'additive' => $request->open_balance,
                ]);
                DB::commit();
                return redirect("/Company")->with('flash_success', \Lang::get('titles.update_msg'));
            } catch (\Throwable $th) {

                DB::rollBack();
                // throw $th;
                return redirect("/Company")->with('flash_danger', \Lang::get('titles.update_msg_error'));
            }

        }else{
            $Safe->update($request->except(['open_balance','balance_start_date']));
            return redirect("/Company")->with('flash_info', \Lang::get('titles.balance_msg'));
        }

    }

    //same route different functions
    // Add Bank
    public function AddBank(Request $request)
    {
        $id = session('company_id');
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $Bank = Bank::create($request->all());

            $Company = Company::find($id);
            $Company->update(['bank_id' => $Bank->id]);

            DB::table('finan_transactions')->insert(
                ['transaction_type_id' => '110',
                'transaction_date' => $request->balance_start_date,
                'bank_id' => $Bank->id,
                'additive' => $request->open_balance,
                ]
            );

            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect("/Company")->with('flash_success', \Lang::get('titles.update_msg'));

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect("/Company")->with('flash_danger', \Lang::get('titles.update_msg_error'));

        }


    }

    //Edit Bank
    public function EditBank(Request $request)
    {
        $id = session('company_id');
        $Company = Company::find($id);
        $Bank = Bank::find($Company->bank_id);
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['bank_id','=',$Company->bank_id]])->count();
        if ($Transactions == 0) {
            DB::beginTransaction();
            try {
                //open balance transaction
                $BankTrans = DB::table('finan_transactions')
                ->where([
                    ['bank_id','=',$Company->bank_id],
                    ['transaction_type_id','=',110]
                ]);

                //update data
                $Bank->update($request->all());
                $BankTrans->update([
                    'transaction_date' => $request->balance_start_date,
                    'additive' => $request->open_balance,
                ]);
                DB::commit();
                return redirect("/Company")->with('flash_success',\Lang::get('titles.update_msg'));

            } catch (\Throwable $th) {
                DB::rollBack();
                // throw $th;
                return redirect("/Company")->with('flash_danger', \Lang::get('titles.update_msg_error'));
            }
        }else{

            $Bank->update($request->except(['open_balance','balance_start_date']));
            return redirect("/Company")->with('flash_info', \Lang::get('titles.balance_msg'));
        }
    }

    //Search function (Employees - Suppliers - Clients)
    public function Search(Request $request,string $type)
    {

        if(request()->ajax()){
            if ($type == 'Employee') {
                $data = $request->data;
                $id = $request->id;
                $Employees = DB::table('persons')
                ->where([['person_type_id', '=', 102],['company_id','=',$id]])
                ->where(function ($query) use ($data){
                $query->where('person_name', 'like',"%$data%")
                ->orWhere('person_nick_name', 'like', "%$data%")
                ->orWhere('address', 'like', "%$data%")
                ->orWhere('legal_entity', 'like', "%$data%")
                ->orWhere('phone1', 'like', "%$data%")
                ->orWhere('phone2', 'like', "%$data%")
                ->orWhere('fax', 'like', "%$data%")
                ->orWhere('email', 'like', "%$data%");
                })->get();

                return $Employees;
            }elseif($type == 'Supplier'){
                $data = $request->data;
                $id = $request->id;
                $Suppliers = DB::table('persons')
                ->where([['person_type_id', '=', 101],['company_id','=',$id]])
                ->where(function ($query) use ($data){
                $query->where('person_name', 'like',"%$data%")
                ->orWhere('person_nick_name', 'like', "%$data%")
                ->orWhere('address', 'like', "%$data%")
                ->orWhere('legal_entity', 'like', "%$data%")
                ->orWhere('phone1', 'like', "%$data%")
                ->orWhere('phone2', 'like', "%$data%")
                ->orWhere('fax', 'like', "%$data%")
                ->orWhere('email', 'like', "%$data%");
                })->get();

                return $Suppliers;
            }elseif($type == 'Client'){
                $data = $request->data;
                $id = $request->id;
                $Clients = DB::table('persons')
                ->where([['person_type_id', '=', 100],['company_id','=',$id]])
                ->where(function ($query) use ($data){
                $query->where('person_name', 'like',"%$data%")
                ->orWhere('person_nick_name', 'like', "%$data%")
                ->orWhere('address', 'like', "%$data%")
                ->orWhere('legal_entity', 'like', "%$data%")
                ->orWhere('phone1', 'like', "%$data%")
                ->orWhere('phone2', 'like', "%$data%")
                ->orWhere('fax', 'like', "%$data%")
                ->orWhere('email', 'like', "%$data%");
                })->get();

                return $Clients;
            }elseif($type == 'Item'){
                $data = $request->data;
                $id = $request->id;
                $Items = DB::table('items')
                ->where([['company_id','=',$id]])
                ->where(function ($query) use ($data){
                $query->where('item_code', 'like',"%$data%")
                ->orWhere('item_arabic_name', 'like', "%$data%")
                ->orWhere('item_english_name', 'like', "%$data%")
                ->orWhere('balance_start_date', 'like', "%$data%")
                ->orWhere('total_open_balance_qty', 'like', "%$data%")
                ->orWhere('total_open_balance_cost', 'like', "%$data%")
                ->orWhere('open_item_price', 'like', "%$data%")
                ->orWhere('notes', 'like', "%$data%");
                })->get();

                return $Items;
            }else{
                return false;
            }

        }
    }

}
