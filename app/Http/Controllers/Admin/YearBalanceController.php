<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BalanceMonth;
use App\Models\BalanceYear;
use Illuminate\Http\Request;
use App\Models\Company;

class YearBalanceController extends Controller
{
    protected $viewName;

    protected $message;
    protected $errormessage;

    public function __construct()
    {

        $this->middleware('auth');

        $this->viewName = 'Admin.year-balance.';

        $this->message = 'تم حفظ البيانات';
    }
    public function index()
    {
        $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        $years = array();
        $company = new Company();
        return view($this->viewName . 'index', compact('companies', 'years', 'company'));
    }


    public function fetchYear(Request $request)
    {
        $value = $request->get('value');
        $company = Company::where('id', $value)->first();
        $years = BalanceYear::where('company_id', $value)->with('company')->get();
        $company = BalanceYear::where('company_id', $value)->with('company')->orderBy("created_at", "Desc")->first();
        if (!$company) {
            $company = new Company();
        }
        return view($this->viewName . 'tableData', compact('years', 'company'))->render();
    }


    public function yearClose(Request $request)
    {
        $id = $request->get('id');
        
        $year = BalanceYear::where('id', $id)->first();
        $company = BalanceYear::where('company_id', $year->company_id)->with('company')->orderBy("created_at", "Desc")->first();
        if (!$company) {
            $company = new Company();
        }
      


        // can_change

        $month = BalanceMonth::where('company_id', '=',$year->company_id)->where('year', '=', $year->year)->orderBy("id", "Desc")->first();
      
        if (!$month->can_change==0) {

            $strr=' هناك شهور لم تغلق !';
            $years = BalanceYear::where('company_id', $year->company_id)->with('company')->get();
            $company = BalanceYear::where('company_id', $year->company_id)->with('company')->orderBy("created_at", "Desc")->first();

            return view($this->viewName . 'tableData', compact('years', 'company','strr'))->render();
       
        }else{
            $year->year_type = 0;
         
            $year->update();
     
            $years = BalanceYear::where('company_id', $year->company_id)->with('company')->get();
            $company = BalanceYear::where('company_id', $year->company_id)->with('company')->orderBy("created_at", "Desc")->first();



            return view($this->viewName . 'tableData', compact('years', 'company'))->render();
       
    }
  
    }

    public function yearOpen(Request $request)
    {
        $id = $request->get('id');
        
        $year = BalanceYear::where('id', $id)->first();
        $company = BalanceYear::where('company_id', $year->company_id)->with('company')->orderBy("created_at", "Desc")->first();
        if (!$company) {
            $company = new Company();
        }
    

       
        $years = BalanceYear::where('company_id', $year->company_id)->with('company')->get();

        if (!$years->count()==1) {

            $year->year_type = 2;
         
            $year->update();
     
       
        }else{
            $year->year_type = 1;
         
            $year->update();
     
       



          
       
    }
    $years = BalanceYear::where('company_id', $year->company_id)->with('company')->get();
    $company = BalanceYear::where('company_id', $year->company_id)->with('company')->orderBy("created_at", "Desc")->first();

    return view($this->viewName . 'tableData', compact('years', 'company'))->render();

   
}
}
