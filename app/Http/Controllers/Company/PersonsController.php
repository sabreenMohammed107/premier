<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class PersonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    Employee functions
    */
    //View employees->all()
    public function Employees()
    {
        $id = session('company_id');
        // $Employees = DB::table('persons')
        // ->where([['company_id','=',$id],['person_type_id','=',102]])->get();
        $TotalPay = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.subtractive) as total_pay, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [102, 107, 109])
        ->groupBy('person_id');

        $TotalRec = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.additive) as total_rec, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [104, 106, 108])
        ->groupBy('person_id');

        $EmployeeTrans = DB::table('persons')
        ->select(DB::raw('person_logo ,active,ifnull(total_pay,0) as total_pay,ifnull(total_rec,0) as total_rec,persons.id,ifnull(persons.phone1,0) as phone1,sum(ifnull(total_price_post_discounts,0)) as total_sales,persons.person_name, ifnull(persons.open_balance,0) as open_balance, sum(ifnull(total_price_post_discounts,0) + ifnull(persons.open_balance,0) + ifnull(total_pay,0) - ifnull(total_rec,0)) as current'))
        ->leftJoin('invoices','invoices.person_id','=','persons.id')
        ->leftJoinSub($TotalPay,'finan_transactions',function($join){
            $join->on('finan_transactions.person_id', '=', 'persons.id');
        })
        ->leftJoinSub($TotalRec,'finan_transactions_rec',function($join){
            $join->on('finan_transactions_rec.person_id', '=', 'persons.id');
        })
        ->where([['person_type_id','=',102],['persons.company_id','=',$id]])
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->groupBy('person_logo','persons.person_name','total_pay','total_rec','persons.id','phone1','persons.open_balance')
        ->get();
        // return $Employees;
        return view('Company.employees.Employees',[
            // 'Employees'=>$Employees,
            'id'=>$id,
            'EmployeeTrans'=>$EmployeeTrans,
        ]);
    }

    //Add Employee
    public function AddEmployees(string $type)
    {
        $compid = session('company_id');
        //Company details
        $Company = Company::find($compid);

        return view('Company.employees.Employee-all',[
            'Company'=>$Company,
            'type'=>$type,
            'CompanyId'=>$compid
        ]);
    }

    //(Edit - View) Employee
    public function EmployeesData(int $id, string $type)
    {
        $compid = session('company_id');
        //Company details
        $Company = Company::find($compid);
        //check for open balance availability
        $OpenBalance = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['person_id','=',$id],['person_type_id','=',101]])->count();

        if($OpenBalance != 0){
            $open = 1;
        }else{
            $open=0;
        }
        //Current employee perfo
        // $Employee = DB::table('persons')
        // ->where([['person_type_id','=',102],['id','=',$id]])->first();

        // //Current person balance value
        // $TotalBalanceRec = DB::table('finan_transactions')
        //     ->select(DB::raw('sum(additive - subtractive) as total'))
        //     ->where([['person_id','=',$id],['person_type_id','=',102]])
        //     ->first();
        // $TotalBalance = $TotalBalanceRec->total;
        //Current employee perfo
        $TotalPay = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.subtractive) as total_pay, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [102, 107, 109])
        ->groupBy('person_id');

        $TotalRec = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.additive) as total_rec, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [104, 106, 108])
        ->groupBy('person_id');

        $Employee = DB::table('persons')
        ->select(DB::raw('person_logo ,persons.notes,person_nick_name,persons.registeration_no ,phone2 ,address ,tax_authority ,email ,balance_start_date,active,ifnull(total_pay,0) as total_pay,ifnull(total_rec,0) as total_rec,persons.id,ifnull(persons.phone1,0) as phone1,sum(ifnull(total_price_post_discounts,0)) as total_sales,persons.person_name, ifnull(persons.open_balance,0) as open_balance, sum(ifnull(total_price_post_discounts,0) + ifnull(persons.open_balance,0) + ifnull(total_pay,0) - ifnull(total_rec,0)) as current'))
        ->leftJoin('invoices','invoices.person_id','=','persons.id')
        ->leftJoinSub($TotalPay,'finan_transactions',function($join){
            $join->on('finan_transactions.person_id', '=', 'persons.id');
        })
        ->leftJoinSub($TotalRec,'finan_transactions_rec',function($join){
            $join->on('finan_transactions_rec.person_id', '=', 'persons.id');
        })
        ->where([['person_type_id','=',102],['persons.id','=',$id],['persons.company_id','=',$compid]])
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->groupBy('person_logo','persons.person_name','total_pay','total_rec','persons.id','phone1','persons.open_balance')
        ->first();
        return view('Company.employees.Employee-all',[
            'type'=>$type,
            'id'=>$id,
            'CompanyId'=>$compid,
            // 'Employee'=>$Employee,
            'Company'=>$Company,
            'Open'=>$open,
            // 'TotalBalance'=>$TotalBalance,
            'Employee'=>$Employee,
        ]);
    }

    //Create Employee
    public function CreateEmployees(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            //Configure file and storing it
            if($request->hasFile('logo')){
                $extension = $request->logo->extension();
                $filename = time() . '.' . $extension;
                $path = public_path('uploads/person');
                $request->file('logo')->move($path,$filename);
                $request->merge([
                    'person_logo' => $filename,
                ]);
            }
            //configure data
            //configure checkbox
            if ($request->active == "on") {
                $request->merge([
                    'active' => 1,
                ]);
            }else{
                $request->merge([
                    'active' => 0,
                ]);
            }

            //create a record of person from received request
            $Person = Person::create($request->except(['logo','role_name','id']));
            //Create transaction (open balance)
            //Verify either additive or subtractive
            if($request->open_balance > 0){
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'person_id' => $Person->id,
                    'additive' => $request->open_balance,
                    'person_name'=>$request->person_name,
                    'person_type_id'=> '102',
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );
            }elseif($request->open_balance < 0){
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'person_id' => $Person->id,
                    'subtractive' => abs($request->open_balance),
                    'person_name'=>$request->person_name,
                    'person_type_id'=> '102',
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );
            }else{
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'person_id' => $Person->id,
                    'person_name'=>$request->person_name,
                    'person_type_id'=> '102',
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );
            }


            //Commit data
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect("/Company/Employees")->with('flash_success', "تم اضافة الموظف : $request->person_name");


        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect("/Company/Employees")->with('flash_danger', "لم يتم اضافة الموظف : $request->person_name");
        }
    }

    //Update Employee
    public function UpdateEmployees(Request $request)
    {
        //person to update
        $Person = Person::find($request->id);
        //Transactions check for open_balance
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['person_id','=',$Person->id],['person_type_id','=',102]])->count();
        if ($Transactions == 0) {
            DB::beginTransaction();
            try {
                //Configure file and storing it
                if($request->hasFile('logo')){
                    $extension = $request->logo->extension();
                    $filename = time() . '.' . $extension;
                    $path = public_path('uploads/person');
                    $request->file('logo')->move($path,$filename);
                    $request->merge([
                        'person_logo' => $filename,
                    ]);
                }
                // ////open balance sign
                // $request->merge([
                //     'open_balance' => abs($request->open_balance),
                // ]);
                //configure checkbox
                if ($request->active == "on") {
                    $request->merge([
                        'active' => 1,
                    ]);
                }else{
                    $request->merge([
                        'active' => 0,
                    ]);
                }
                //open balance transaction
                $OpenBalance = DB::table('finan_transactions')
                ->where([['transaction_type_id','=',110],['person_id','=',$Person->id],['person_type_id','=',102]]);
                //update a record of person from received request
                $Person->update($request->except(['logo','role_name','id']));
                //update transaction data
                if($request->open_balance > 0){
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => $request->open_balance,
                        'subtractive' => 0,
                        ]);

                }elseif($request->open_balance < 0){
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => 0,
                        'subtractive' => abs($request->open_balance),
                        ]);
                }else{
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => 0,
                        'subtractive' => 0,
                    ]);
                }
                DB::commit();
                return redirect("/Company/Employees")->with('flash_success', "تم تعديل بيانات الموظف : $request->person_name ");
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                return redirect("/Company/Employees")->with('flash_danger', "لم يتم تعديل بيانات الموظف : $request->person_name بسبب خطأ ما حاول مره أخرى");
            }
        }else{
            //Configure
            //configure checkbox
            if ($request->active == "on") {
                $request->merge([
                    'active' => 1,
                ]);
            }else{
                $request->merge([
                    'active' => 0,
                ]);
            }
            if($request->hasFile('logo')){
                $extension = $request->logo->extension();
                $filename = time() . '.' . $extension;
                $path = public_path('uploads/person');
                $request->file('logo')->move($path,$filename);
                $request->merge([
                    'person_logo' => $filename,
                ]);
            }
            //update a record of person from received request
            $Person->update($request->except(['logo','role_name','id','open_balance','open_balance']));
            return redirect("/Company/Employees")->with('flash_info', "تم تعديل بيانات باستثناء الرصيد الافتتاحي و تاريخ الترصيد لوجود حركات تمت على الموظف : $request->person_name");

        }

    }


    //Delete Employee's Data
    public function DeleteEmployees(int $id)
    {
        //person to delete
        $Person = Person::find($id);
        //Transactions check for open_balance
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['person_id','=',$Person->id],['person_type_id','=',102]])->count();
        //Actions
        if($Transactions == 0){
            DB::beginTransaction();
            try {
                $Person->delete();

                DB::commit();
                return redirect("/Company/Employees")->with('flash_success', "تم حذف بيانات الموظف : $Person->person_name ");

            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
                return redirect("/Company/Employees")->with('flash_danger', "لم يتم حذف الموظف: $Person->person_name لوجود خطأ ما");
            }
        }else{
            return redirect("/Company/Employees")->with('flash_danger', "لم يتم حذف الموظف: $Person->person_name لوجود حركات تمت عليه");
        }
    }

    /*
    Supplier functions
    */
    //View suppliers->all()
    public function Suppliers()
    {
        $id = session('company_id');
        //All Company suppliers
        // $Suppliers = DB::table('persons')
        // ->where([['company_id','=',$id],['person_type_id','=',101]])->get();
        $TotalPay = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.subtractive) as total_pay, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [102, 107, 109])
        ->groupBy('person_id');

        $TotalRec = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.additive) as total_rec, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [104, 106, 108])
        ->groupBy('person_id');

        $SupplierTrans = DB::table('persons')
        ->select(DB::raw('person_logo,active, ifnull(total_pay,0) as total_pay,ifnull(total_rec,0) as total_rec,persons.id,ifnull(persons.phone1,0) as phone1,sum(total_price_post_discounts) as total_purch,persons.person_name, persons.open_balance, sum(ifnull(total_price_post_discounts,0) + ifnull(persons.open_balance,0) + ifnull(total_rec,0) - ifnull(total_pay,0)) as current'))
        ->leftJoin('invoices','invoices.person_id','=','persons.id')
        ->leftJoinSub($TotalPay,'finan_transactions',function($join){
            $join->on('finan_transactions.person_id', '=', 'persons.id');
        })
        ->leftJoinSub($TotalRec,'finan_transactions_rec',function($join){
            $join->on('finan_transactions_rec.person_id', '=', 'persons.id');
        })
        ->where([['person_type_id','=',101],['persons.company_id','=',$id]])
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->groupBy('person_logo','persons.person_name','total_pay','total_rec','persons.id','phone1','persons.open_balance')
        ->get();

        return view('Company.suppliers.Suppliers',[
            // 'Suppliers'=>$Suppliers,
            'id'=>$id,
            'SupplierTrans'=>$SupplierTrans,
        ]);
    }

    //Add Supplier
    public function AddSuppliers(string $type)
    {
        $compid = session('company_id');
        //Company details
        $Company = Company::find($compid);

        return view('Company.suppliers.Supplier-all',[
            'Company'=>$Company,
            'type'=>$type,
            'CompanyId'=>$compid
        ]);
    }

    //(Edit - View) Supplier
    public function SuppliersData(int $id, string $type)
    {
        $compid = session('company_id');
        //Company details
        $Company = Company::find($compid);
        //check for open balance availability
        $OpenBalance = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['person_id','=',$id],['person_type_id','=',101]])->count();

        if($OpenBalance != 0){
            $open = 1;
        }else{
            $open=0;
        }

        //Current supplier person
        $Supplier = DB::table('persons')
        ->where([['person_type_id','=',101],['id','=',$id]])->first();

        //Current person balance value
        // $TotalBalanceRec = DB::table('finan_transactions')
        //     ->select(DB::raw('sum(additive - subtractive) as total'))
        //     ->where([['person_id','=',$id],['person_type_id','=',101]])
        //     ->first();
        // $TotalBalance = $TotalBalanceRec->total;

        $TotalPay = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.subtractive) as total_pay, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [102, 107, 109])
        ->groupBy('person_id');

        $TotalRec = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.additive) as total_rec, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [104, 106, 108])
        ->groupBy('person_id');

        $SupplierTrans = DB::table('persons')
        ->select(DB::raw('ifnull(total_pay,0) as total_pay,ifnull(total_rec,0) as total_rec,persons.id,ifnull(persons.phone1,0) as phone1,sum(total_price_post_discounts) as total_purch,persons.person_name, persons.open_balance, sum(ifnull(total_price_post_discounts,0) + ifnull(persons.open_balance,0) + ifnull(total_rec,0) - ifnull(total_pay,0)) as current'))
        ->leftJoin('invoices','invoices.person_id','=','persons.id')
        ->leftJoinSub($TotalPay,'finan_transactions',function($join){
            $join->on('finan_transactions.person_id', '=', 'persons.id');
        })
        ->leftJoinSub($TotalRec,'finan_transactions_rec',function($join){
            $join->on('finan_transactions_rec.person_id', '=', 'persons.id');
        })
        ->where([['person_type_id','=',101],['persons.company_id','=',$compid],['persons.id','=',$id]])
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->groupBy('person_logo','persons.person_name','total_pay','total_rec','persons.id','phone1','persons.open_balance')
        ->first();
        return view('Company.suppliers.Supplier-all',[
            'type'=>$type,
            'id'=>$id,
            'CompanyId'=>$compid,
            'Supplier'=>$Supplier,
            'Company'=>$Company,
            'SupplierTrans'=>$SupplierTrans,
            'Open'=>$open,
            // 'TotalBalance'=>$TotalBalance,
        ]);
    }

    //Create Supplier
    public function CreateSuppliers(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            //Configure file and storing it
            if($request->hasFile('logo')){
                $extension = $request->logo->extension();
                $filename = time() . '.' . $extension;
                $path = public_path('uploads/person');
                $request->file('logo')->move($path,$filename);
                $request->merge([
                    'person_logo' => $filename,
                ]);
            }
            //configure data
            //configure checkbox
            if ($request->active == "on") {
                $request->merge([
                    'active' => 1,
                ]);
            }else{
                $request->merge([
                    'active' => 0,
                ]);
            }
            //configure checkbox
            if ($request->taxable == "on") {
                $request->merge([
                    'taxable' => 1,
                ]);
            }else{
                $request->merge([
                    'taxable' => 0,
                ]);
            }
            //create a record of person from received request
            $Person = Person::create($request->except(['logo','role_name','id']));
            //Create transaction (open balance)
            //Verify either additive or subtractive
            if($request->open_balance > 0){
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'person_id' => $Person->id,
                    'additive' => $request->open_balance,
                    'person_name'=>$request->person_name,
                    'person_type_id'=> '101',
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );
            }elseif($request->open_balance < 0){
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'person_id' => $Person->id,
                    'subtractive' => abs($request->open_balance),
                    'person_name'=>$request->person_name,
                    'person_type_id'=> '101',
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );
            }else{
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'person_id' => $Person->id,
                    'person_name'=>$request->person_name,
                    'person_type_id'=> '101',
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );
            }

            //Commit data
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect("/Company/Suppliers")->with('flash_success', "تم اضافة المورد : $request->person_name");


        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect("/Company/Suppliers")->with('flash_danger', "لم يتم اضافة الموظف : $request->person_name بسبب خطأ ما حاول مرة أخرى");
        }
    }

    //Update Suppluer
    public function UpdateSuppliers(Request $request)
    {
        //person to update
        $Person = Person::find($request->id);
        //Transactions check for open_balance
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['person_id','=',$Person->id],['person_type_id','=',101]])->count();
        if ($Transactions == 0) {
            DB::beginTransaction();
            try {
                // Disable foreign key checks!
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                //Configure file and storing it
                if($request->hasFile('logo')){
                    $extension = $request->logo->extension();
                    $filename = time() . '.' . $extension;
                    $path = public_path('uploads/person');
                    $request->file('logo')->move($path,$filename);
                    $request->merge([
                        'person_logo' => $filename,
                    ]);
                }
                //configure checkbox
                if ($request->active == "on") {
                    $request->merge([
                        'active' => 1,
                    ]);
                }else{
                    $request->merge([
                        'active' => 0,
                    ]);
                }
                //configure checkbox
                if ($request->taxable == "on") {
                    $request->merge([
                        'taxable' => 1,
                    ]);
                }else{
                    $request->merge([
                        'taxable' => 0,
                    ]);
                }

                //open balance transaction
                $OpenBalance = DB::table('finan_transactions')
                ->where([['transaction_type_id','=',110],['person_id','=',$Person->id],['person_type_id','=',101]]);
                //update a record of person from received request
                $Person->update($request->except(['logo','role_name','id']));
                //update transaction data
                if($request->open_balance > 0){
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => $request->open_balance,
                        'subtractive' => 0,
                        ]);

                }elseif($request->open_balance < 0){
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => 0,
                        'subtractive' => abs($request->open_balance),
                        ]);
                }else{
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => 0,
                        'subtractive' => 0,
                    ]);
                }

                DB::commit();
                return redirect("/Company/Suppliers")->with('flash_success', "تم تعديل بيانات المررد : $request->person_name");

            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                return redirect("/Company/Suppliers")->with('flash_danger', "لم يتم تعديل بيانات المورد : $request->person_name");


            }
        }else{
            //Configure
            //configure checkbox
            // return $request;
            if($request->hasFile('logo')){
                $extension = $request->logo->extension();
                $filename = time() . '.' . $extension;
                $path = public_path('uploads/person');
                $request->file('logo')->move($path,$filename);
                $request->merge([
                    'person_logo' => $filename,
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
            if ($request->taxable == "on") {
                $request->merge([
                    'taxable' => 1,
                ]);
            }else{
                $request->merge([
                    'taxable' => 0,
                ]);
            }

            //update a record of person from received request
            $Person->update($request->except(['logo','role_name','id','open_balance','open_balance']));
            return redirect("/Company/Suppliers")->with('flash_info', "تم تعديل بيانات باستثناء الرصيد الافتتاحي و تاريخ الترصيد لوجود حركات تمت على المورد : $request->person_name");
        }



    }


    //Delete Supplier's Data
    public function DeleteSuppliers(int $id)
    {
        //person to delete
        $Person = Person::find($id);
        //Transactions check for open_balance
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['person_id','=',$Person->id],['person_type_id','=',101]])->count();
        //Actions
        if($Transactions == 0){
            DB::beginTransaction();
            try {
                $Person->delete();

                DB::commit();
                return redirect("/Company/Suppliers")->with('flash_success', "تم حذف بيانات المورد : $Person->person_name ");

            } catch (\Throwable $th) {
                DB::rollBack();
                // throw $th;
                return redirect("/Company/Suppliers")->with('flash_danger', "لم يتم حذف المورد: $Person->person_name لوجود خطأ ما");
            }
        }else{
            return redirect("/Company/Suppliers")->with('flash_danger', "لم يتم حذف المورد: $Person->person_name لوجود حركات تمت عليه");
        }
    }

        /*
    Client functions
    */
    //View clients->all()
    public function Clients()
    {
        $id = session('company_id');
        //All Company suppliers
        // $Clients = DB::table('persons')
        // ->where([['company_id','=',$id],['person_type_id','=',100]])->get();

        $TotalPay = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.subtractive) as total_pay, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [102, 107, 109])
        ->groupBy('person_id');

        $TotalRec = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.additive) as total_rec, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [104, 106, 108])
        ->groupBy('person_id');

        $ClientTrans = DB::table('persons')
        ->select(DB::raw('person_logo ,active,ifnull(total_pay,0) as total_pay,ifnull(total_rec,0) as total_rec,persons.id,ifnull(persons.phone1,0) as phone1,sum(ifnull(total_price_post_discounts,0)) as total_sales,persons.person_name, ifnull(persons.open_balance,0) as open_balance, sum(ifnull(total_price_post_discounts,0) + ifnull(persons.open_balance,0) + ifnull(total_pay,0) - ifnull(total_rec,0)) as current'))
        ->leftJoin('invoices','invoices.person_id','=','persons.id')
        ->leftJoinSub($TotalPay,'finan_transactions',function($join){
            $join->on('finan_transactions.person_id', '=', 'persons.id');
        })
        ->leftJoinSub($TotalRec,'finan_transactions_rec',function($join){
            $join->on('finan_transactions_rec.person_id', '=', 'persons.id');
        })
        ->where([['person_type_id','=',100],['persons.company_id','=',$id]])
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->groupBy('person_logo','persons.person_name','total_pay','total_rec','persons.id','phone1','persons.open_balance')
        ->get();

        return view('Company.clients.Clients',[
            // 'Clients'=>$Clients,
            'id'=>$id,
            'ClientTrans'=>$ClientTrans,
        ]);
    }

    //Add Client
    public function AddClients(string $type)
    {
        $compid = session('company_id');
        //Company details
        $Company = Company::find($compid);

        return view('Company.clients.Client-all',[
            'Company'=>$Company,
            'type'=>$type,
            'CompanyId'=>$compid
        ]);
    }

    //(Edit - View) Client
    public function ClientsData(int $id, string $type)
    {
        $compid = session('company_id');
        //Company details
        $Company = Company::find($compid);
        //check for open balance availability
        $OpenBalance = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['person_id','=',$id],['person_type_id','=',100]])->count();

        if($OpenBalance != 0){
            $open = 1;
        }else{
            $open=0;
        }

        //Current client person
        $Client = DB::table('persons')
        ->where([['person_type_id','=',100],['id','=',$id]])->first();

        //Current person balance value
        // $TotalBalanceRec = DB::table('finan_transactions')
        //     ->select(DB::raw('sum(additive - subtractive) as total'))
        //     ->where([['person_id','=',$id],['person_type_id','=',100]])
        //     ->first();
        // $TotalBalance = $TotalBalanceRec->total;

        $TotalPay = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.subtractive) as total_pay, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [102, 107, 109])
        ->groupBy('person_id');

        $TotalRec = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.additive) as total_rec, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [104, 106, 108])
        ->groupBy('person_id');

        $ClientTrans = DB::table('persons')
        ->select(DB::raw('ifnull(total_pay,0) as total_pay,ifnull(total_rec,0) as total_rec,persons.id,ifnull(persons.phone1,0) as phone1,sum(ifnull(total_price_post_discounts,0)) as total_sales,persons.person_name, ifnull(persons.open_balance,0) as open_balance, sum(ifnull(total_price_post_discounts,0) + ifnull(persons.open_balance,0) + ifnull(total_pay,0) - ifnull(total_rec,0)) as current'))
        ->leftJoin('invoices','invoices.person_id','=','persons.id')
        ->leftJoinSub($TotalPay,'finan_transactions',function($join){
            $join->on('finan_transactions.person_id', '=', 'persons.id');
        })
        ->leftJoinSub($TotalRec,'finan_transactions_rec',function($join){
            $join->on('finan_transactions_rec.person_id', '=', 'persons.id');
        })
        ->where([['person_type_id','=',100],['persons.company_id','=',$compid],['persons.id','=',$id]])
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->groupBy('person_logo','persons.person_name','total_pay','total_rec','persons.id','phone1','persons.open_balance')
        ->first();

        return view('Company.clients.Client-all',[
            'type'=>$type,
            'id'=>$id,
            'CompanyId'=>$compid,
            'Client'=>$Client,
            'Company'=>$Company,
            'Open'=>$open,
            'ClientTrans'=>$ClientTrans,
        ]);
    }

    //Create Client
    public function CreateClients(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            //Configure file and storing it
            if($request->hasFile('logo')){
                $extension = $request->logo->extension();
                $filename = time() . '.' . $extension;
                $path = public_path('uploads/person');
                $request->file('logo')->move($path,$filename);
                $request->merge([
                    'person_logo' => $filename,
                ]);
            }
            //configure checkbox
            if ($request->active == "on") {
                $request->merge([
                    'active' => 1,
                ]);
            }else{
                $request->merge([
                    'active' => 0,
                ]);
            }
            //configure checkbox
            if ($request->taxable == "on") {
                $request->merge([
                    'taxable' => 1,
                ]);
            }else{
                $request->merge([
                    'taxable' => 0,
                ]);
            }
            //create a record of person from received request
            $Person = Person::create($request->except(['logo','role_name','id']));
            //Create transaction (open balance)
            //Verify either additive or subtractive
            if($request->open_balance > 0){
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'person_id' => $Person->id,
                    'additive' => $request->open_balance,
                    'person_name'=>$request->person_name,
                    'person_type_id'=> '100',
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );
            }elseif($request->open_balance < 0){
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'person_id' => $Person->id,
                    'subtractive' => abs($request->open_balance),
                    'person_name'=>$request->person_name,
                    'person_type_id'=> '100',
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );
            }else{
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'person_id' => $Person->id,
                    'person_name'=>$request->person_name,
                    'person_type_id'=> '100',
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );
            }


            //Commit data
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect("/Company/Clients")->with('flash_success', "تم اضافة العميل : $request->person_name");


        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect("/Company/Clients")->with('flash_danger', "لم يتم اضافة العميل : $request->person_name بسبب خطأ ما حاول مرة أخرى");
        }
    }

    //Update Client
    public function UpdateClients(Request $request)
    {
        //person to update
        $Person = Person::find($request->id);
        //Transactions check for open_balance
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['person_id','=',$Person->id],['person_type_id','=',100]])->count();
        if ($Transactions == 0) {
            DB::beginTransaction();
            try {
                //Configure file and storing it
                if($request->hasFile('logo')){
                    $extension = $request->logo->extension();
                    $filename = time() . '.' . $extension;
                    $path = public_path('uploads/person');
                    $request->file('logo')->move($path,$filename);
                    $request->merge([
                        'person_logo' => $filename,
                    ]);
                }
                //configure checkbox
                if ($request->active == "on") {
                    $request->merge([
                        'active' => 1,
                    ]);
                }else{
                    $request->merge([
                        'active' => 0,
                    ]);
                }
                //configure checkbox
                if ($request->taxable == "on") {
                    $request->merge([
                        'taxable' => 1,
                    ]);
                }else{
                    $request->merge([
                        'taxable' => 0,
                    ]);
                }

                //open balance transaction
                $OpenBalance = DB::table('finan_transactions')
                ->where([['transaction_type_id','=',110],['person_id','=',$Person->id],['person_type_id','=',100]]);
                //Verify either additive or subtractive
                //update transaction data
                if($request->open_balance > 0){
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => $request->open_balance,
                        'subtractive' => 0,
                        ]);

                }elseif($request->open_balance < 0){
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => 0,
                        'subtractive' => abs($request->open_balance),
                        ]);
                }else{
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => 0,
                        'subtractive' => 0,
                    ]);
                }

                //update a record of person from received request
                $Person->update($request->except(['logo','role_name','id']));
                DB::commit();
                return redirect("/Company/Clients")->with('flash_success', "تم تعديل بيانات العميل : $request->person_name");

            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                return redirect("/Company/Clients")->with('flash_danger', "لم يتم تعديل بيانات العميل : $request->person_name");


            }
        }else{
            //Configure
            //configure checkbox
            if ($request->active == "on") {
                $request->merge([
                    'active' => 1,
                ]);
            }else{
                $request->merge([
                    'active' => 0,
                ]);
            }
            if($request->hasFile('logo')){
                $extension = $request->logo->extension();
                $filename = time() . '.' . $extension;
                $path = public_path('uploads/person');
                $request->file('logo')->move($path,$filename);
                $request->merge([
                    'person_logo' => $filename,
                ]);
            }

            if ($request->taxable == "on") {
                $request->merge([
                    'taxable' => 1,
                ]);
            }else{
                $request->merge([
                    'taxable' => 0,
                ]);
            }
            //update a record of person from received request
            $Person->update($request->except(['logo','role_name','id','open_balance','open_balance']));
            return redirect("/Company/Clients")->with('flash_info', "تم تعديل بيانات باستثناء الرصيد الافتتاحي و تاريخ الترصيد لوجود حركات تمت على العميل : $request->person_name");
        }



    }


    //Delete Client's Data
    public function DeleteClients(int $id)
    {
        //person to delete
        $Person = Person::find($id);

        //Transactions check for open_balance
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['person_id','=',$Person->id],['person_type_id','=',100]])->count();
        //Actions
        if($Transactions == 0){
            DB::beginTransaction();
            try {
                $Person->delete();

                DB::commit();
                return redirect("/Company/Clients")->with('flash_success', "تم حذف بيانات العميل : $Person->person_name ");

            } catch (\Throwable $th) {
                DB::rollBack();
                // throw $th;
                return redirect("/Company/Clients")->with('flash_danger', "لم يتم حذف العميل: $Person->person_name لوجود خطأ ما");

            }
        }else{
            return redirect("/Company/Clients")->with('flash_danger', "لم يتم حذف العميل: $Person->person_name لوجود حركات تمت عليه");
        }
    }
}
