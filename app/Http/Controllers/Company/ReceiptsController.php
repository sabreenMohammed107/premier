<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\BusinessItemsSetup;
use App\Models\CashMaster;
use App\Models\Company;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class ReceiptsController extends Controller
{
    public function Index()
    {
        $id = session('company_id');

        $Company = Company::find($id);

        $cash_sales = DB::table('cash_master')
        ->where([['company_id','=',$id],['cash_master_type','=',1]])->get();

        return view('Company.cashSales.index',[
            'cash_sales'=>$cash_sales,
            'Company'=>$Company,
        ]);
    }

    // Add new cash purchasing
    public function Add()
    {
        $id = session('company_id');
        $Company = Company::find($id);

        $Clients = DB::table('persons')
        ->where([['company_id','=',$id],['person_type_id','=',100]])->get();

        $maxCashSales = DB::table('cash_master')
        ->where([['company_id','=',$id],['cash_master_type','=',1]])->orderBy('cash_receipt_note','DESC')->first();
        if($maxCashSales){
            $followingExitCode = ($maxCashSales->cash_receipt_note + 1);
        }else{
            $followingExitCode = 1;
        }

        return view('Company.cashSales.add',[
            'Clients'=>$Clients,
            'Code'=>$followingExitCode,
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


        return view('Company.cashSales.edit',[
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

        $CashSales = CashMaster::create($request->all());

        return redirect("/Cash/Sales")->with('flash_success', "تم اضافة المقبوضات بنجاح");

    }

    public function FetchPerson(Request $request, string $type)
    {
        if ($request->ajax()) {
            if ($type == 'Employees') {
                $Persons = DB::table('persons')
                ->where([['company_id','=',$request->compid],['person_type_id','=',102]])->get();
                $type = 'موظف';
            }elseif ($type == 'Clients') {
                $Persons = DB::table('persons')
                ->where([['company_id','=',$request->compid],['person_type_id','=',100]])->get();
                $type = 'عميل';

            }elseif ($type == 'Suppliers') {
                $Persons = DB::table('persons')
                ->where([['company_id','=',$request->compid],['person_type_id','=',101]])->get();
                $type = 'مورد';

            }else{
                $Persons = [];
                $type = 'أخرى';
            }
            $ajaxComponent = view('Company.components.ajax.CashPersonType',['Persons'=>$Persons,'type'=>$type]);

            return $ajaxComponent->render();
        }
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

        return redirect("/Cash/Sales")->with('flash_success', "تم تعديل بيانات المقبوضات بنجاح");

    }

    public function Delete(int $cash_id)
    {
        $Cash = CashMaster::find($cash_id);
        $Cash->delete();

        return redirect("/Cash/Sales")->with('flash_success', "تم حذف بيانات المدفوعات بنجاح");
    }

    public function View(int $cash_id)
    {
        $id = session('company_id');
        $Cash = CashMaster::find($cash_id);
        $Company = Company::find($id);

        return view('Company.cashSales.view',[
            'Cash'=>$Cash,
            'Company'=>$Company,
        ]);
    }
}
