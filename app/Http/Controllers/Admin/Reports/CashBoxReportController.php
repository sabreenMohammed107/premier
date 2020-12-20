<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\FinanTransaction;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Exports\UsersExport;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel as Excel;
class CashBoxReportController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(FinanTransaction $object)
    {

        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'Admin.reports.cashBox-trans.';
        $this->routeName = 'Admin-cashBox-report.';

        $this->message = 'تم حفظ البيانات';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $exception = $user->company->pluck('id')->toArray();
      
        $rows = Company::whereIn('id', $exception)->where('id', '!=', 100)->get();
        if(Auth::user()->role_id == 110){
            $rows = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        }
        // $rows = Company::where('active', 1)->where('id', '!=', 100)->get();

        return view($this->viewName . 'create', compact('rows'));
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
        $company_id = $request->input('companies_ids');
        $companies_ids = explode(",", $company_id[0]);



        $cashBox_id = $request->input('cashBox_ids');
        $cashBox_ids = explode(",", $cashBox_id[0]); //convert string to array

        $from_date = $request->get("from_date");
        $to_date = $request->get("to_date");

        $trans = FinanTransaction::whereIn('safe_id', $cashBox_ids);

        if (!empty($request->get("from_date"))) {
            $trans->where('transaction_date', '>=', Carbon::parse($request->get("from_date")));
        }
        if (!empty($request->get("to_date"))) {
            $trans->where('transaction_date', '<=', Carbon::parse($request->get("to_date")));
        }


        $trans = $trans->orderBy("transaction_date", "asc")->get();

        $filterd_trans = [];
        foreach ($companies_ids as $id) {
            $obj = new Collection();
            $obj->company_name = Company::where('id', $id)->first()->company_official_name ?? '';
            $obj->safe_id =Company::where('id', $id)->first()->safe_id;
            $obj->logo =Company::where('id', $id)->first()->company_logo;
            $obj->trans = array();
            foreach ($trans as $objs) {
                
                if ($objs->safe_id == Company::where('id', $id)->first()->safe_id) {
                    array_push($obj->trans, $objs);
                }
            }
            array_push($filterd_trans, $obj);
        }





        $data = [
            'Title' => \Lang::get('titles.cashbox_transactions_reports'),
            'trans' => $filterd_trans,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'Today' => date('Y-m-d'),
           
            'User'  =>  Auth::user(),
            

        ];
    

        if ($request->get('action') == 'savepdf') {
            
            $title = "My Report";
            $pdf = PDF::loadView('Admin.reports.cashBox-trans.cashBoxReport', $data);
            $pdf->allow_charset_conversion = false;
            $pdf->autoScriptToLang = true;
            $pdf->autoLangToFont = true;
          
    
            return $pdf->stream('medium.pdf');
            }
    
    
            if ($request->get('action') == 'saveExcel') {
                ob_end_clean(); // this
                ob_start(); // and this
               
                $range = ['start'=>$from_date, 'end'=>$to_date ,'cashIds'=>[$cashBox_ids]];
                //  return Excel::download(new UsersExport($range), 'invoices.xlsx');
        
                return (new UsersExport($range))->download('invoices.xlsx');
        
        
            }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
