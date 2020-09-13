<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\BusinessItemsSetup;
use App\Models\CashMaster;
use App\Models\Company;
use App\Models\Person;
use App\Models\Safe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class PaymentsController extends Controller
{

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

        $maxCashPurchase = DB::table('cash_master')
        ->where([['company_id','=',$id],['cash_master_type','=',0]])->orderBy('exit_permission_code','DESC')->first();

        $followingExitCode = ($maxCashPurchase->exit_permission_code + 1);

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
        ]);
    }

    public function Create(Request $request)
    {
        $id = session('company_id');
        if($request->person_type != null){
            $Person = Person::find($request->person_id);
            $request->merge([
                'person_name' => $Person->person_name,
            ]);
        }
        $request->merge([
            'company_id' => $id,
        ]);

        $CashPurch = CashMaster::create($request->all());

        return redirect("/Cash/Purchasing")->with('flash_success', "تم اضافة المدفوعات بنجاح");

    }

    public function Update(Request $request, int $cash_id)
    {
        $Cash = CashMaster::find($cash_id);
        $id = session('company_id');
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
        $request->merge([
            'company_id' => $id,
        ]);

        $CashPurch = $Cash->update($request->except('id'));

        return redirect("/Cash/Purchasing")->with('flash_success', "تم تعديل بيانات المدفوعات بنجاح");

    }

    public function Delete(int $cash_id)
    {
        $Cash = CashMaster::find($cash_id);
        $Cash->delete();

        return redirect("/Cash/Purchasing")->with('flash_success', "تم حذف بيانات المدفوعات بنجاح");
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
