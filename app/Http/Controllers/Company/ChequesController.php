<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CashMaster;
use App\Models\Cheque;
use App\Models\Company;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class ChequesController extends Controller
{
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

        $FollowingCode = ($LastCheque->cheque_serial + 1);

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
        $id = session('company_id');
        if($request->optionsRadios0 == 'person'){
            $Person = Person::find($request->person_id);
            $request->merge([
                'person_name' => $Person->person_name,
            ]);
        }
        $request->merge([
            'company_id' => $id,
        ]);

        $Cheque = Cheque::create($request->except(['optionsRadios0','optionsRadios2','person_type']));

        return redirect("/Cheques")->with('flash_success', "تم اضافة الشيك بنجاح");
    }

    public function Update(Request $request)
    {
        $Cheque = Cheque::find($request->id);
        $id = session('company_id');
        if($request->optionsRadios0 == 'person'){
            $Person = Person::find($request->person_id);
            $request->merge([
                'person_name' => $Person->person_name,
            ]);
        }else{
            $request->merge([
                'person_name' => null,
                'person_id'=>null,
            ]);
        }
        $request->merge([
            'company_id' => $id,
        ]);

        $Cheque->update($request->except(['optionsRadios0','optionsRadios2','person_type']));

        return redirect("/Cheques")->with('flash_success', "تم تعديل بيانات الشيك رقم $Cheque->cheque_no بنجاح");
    }

    public function Delete(int $cash_id)
    {
        $Cheque = Cheque::find($cash_id);
        $Cheque->delete();

        return redirect("/Cheques")->with('flash_success', "تم حذف بيانات الشيك رقم $Cheque->cheque_no بنجاح");
    }
}
