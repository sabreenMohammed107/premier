<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BalanceMonth;
use App\Models\BalanceYear;
use Illuminate\Http\Request;
use App\Models\Company;
use Carbon\Carbon;
use DB;
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
/**
 * Get data After Ajax 
 */

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
/**
 * Closing Year
 */

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
/**
 * Cancel Close Year
 */
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
/***
 * opening new Year
 */

public function openYearBalance(Request $request){
    $id = $request->get('id');
    $yearNow = BalanceYear::where('id', $id)->first();
    $companyf = BalanceYear::where('company_id', $yearNow->company_id)->with('company')->orderBy("created_at", "Desc")->first();
    $xx=count(BalanceYear::where('company_id', $companyf->id)->whereIn('year_type',[1,2])->get());
  
    DB::beginTransaction();
    try {
    if($xx==0){
        $yy = date("Y");
     
        $yearData = [
            'year' => $yy,
            'company_id' =>$yearNow->company_id,
            'period_from_date' => Carbon::create("$yy-01-01"),
            'period_to_date' => Carbon::create("$yy-12-31"),
            'year_type' => 1,
            'period_open_date' => Carbon::create("$yy-01-01"),
            'period_closed_date' => Carbon::create("$yy-12-31"),
            'notes' => "سنه مفتوحة"
        ];
    $lastMonth=BalanceMonth::where('Company_id',$yearNow->company_id)->where('year',$yearNow->year)->where("month_no", 12)->first();
         $lastMonth->month_type = 1;

         $lastMonth->update();
     
        $year = BalanceYear::create($yearData);

        for ($i = 1; $i <= 12; $i++) {
            $monthData = new BalanceMonth();
            $monthData->year = date("Y");
            $monthData->company_id =$yearNow->company_id;
            $monthData->month_no = $i;
            $monthData->period_from_date = Carbon::create("$yy-$i-01");
            $monthData->period_open_date = Carbon::create("$yy-$i-01");
            $monthData->notes = "شهر مفتوح";
            if ($i == 1) {
                $monthData->can_change = 1;
            } else {
                $monthData->can_change = 2;
            }
            $monthData->period_end_date = date("$yy-$i-t", strtotime("$yy-$i-1"));
            $monthData->period_closed_date = date("$yy-$i-t", strtotime("$yy-$i-1"));
            $monthData->save();
        }
     
       
    }
     DB::commit();
    $years = BalanceYear::where('company_id',$yearNow->company_id)->with('company')->get();
    $company = BalanceYear::where('company_id',$yearNow->company_id)->with('company')->orderBy("created_at", "Desc")->first();

    return view($this->viewName . 'tableData', compact('years', 'company'))->render();
} catch (\Throwable $th) {
    //throw $th;
    DB::rollBack();
    $strr=' هناك شهور لم تغلق !';
    $years = BalanceYear::where('company_id',$yearNow->company_id)->with('company')->get();
    $company = BalanceYear::where('company_id',$yearNow->company_id)->with('company')->orderBy("created_at", "Desc")->first();
    return view($this->viewName . 'tableData', compact('years', 'company','strr'))->render();
}

}
/**
 * Cancel Opening New Year
 */
public function cancelBalance(Request $request){
    $id = $request->get('id');
    $yearNow = BalanceYear::where('id', $id)->first();

   
   
        $month = BalanceMonth::where('company_id', '=',$yearNow->company_id)->where('year', '=', $yearNow->year)->orderBy("id", "Desc")->first();
        if ($month->can_change==1) {
            DB::beginTransaction();
            try {
        $yearNow->delete();
        BalanceMonth::where('Company_id',$yearNow->company_id)->where('year',$yearNow->year)->delete();
        
        DB::commit();
            
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
          
        }
    }else{
        $strr=' هناك شهور مغلقة لا يمكن إلغاء الترصيد !';
        $years = BalanceYear::where('company_id',$yearNow->company_id)->with('company')->get();
        $company = BalanceYear::where('company_id',$yearNow->company_id)->with('company')->orderBy("created_at", "Desc")->first();
        return view($this->viewName . 'tableData', compact('years', 'company','strr'))->render();
    }
        $years = BalanceYear::where('company_id',$yearNow->company_id)->with('company')->get();
        $company = BalanceYear::where('company_id',$yearNow->company_id)->with('company')->orderBy("created_at", "Desc")->first();
    
        return view($this->viewName . 'tableData', compact('years', 'company'))->render();

}

}
