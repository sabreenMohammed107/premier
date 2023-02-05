<?php

namespace App\Http\Controllers\Admin\Reports;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\FinanTransaction;
use App\Models\Item;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Carbon\Carbon;

class ItemsReportController extends Controller
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
        $this->viewName = 'Admin.reports.items-trans.';
        $this->routeName = 'Admin-client-report.';

        $this->message =  \Lang::get('titles.saving_msg');
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
        $items = [];
        return view($this->viewName . 'create', compact('rows', 'items'));
    }

    public function companyFetch(Request $request)
    {

        $company_id = $request->input('company_id');
        $items = Item::where('company_id', $company_id)->where('active', 1)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'createTable', compact('items'))->render();
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
        $company_id = $request->input('select_company');
        $item_id = $request->input('item_ids');
        $item_ids = explode(",", $item_id[0]); //convert string to array
        $from_date = $request->get("from_date");
        $to_date = $request->get("to_date");
        $company = Company::where('id', $company_id)->first();

        $trans = FinanTransaction::whereIn('item_id', $item_ids);

        if (!empty($request->get("from_date"))) {
            $trans->where('transaction_date', '>=', Carbon::parse($request->get("from_date")));
        }
        if (!empty($request->get("to_date"))) {
            $trans->where('transaction_date', '<=', Carbon::parse($request->get("to_date")));
        }


        $trans = $trans->orderBy("transaction_date", "asc")->get();

        $filterd_trans = [];
        foreach ($item_ids as $id) {
            $obj = new Collection();
            $obj->item_name = Item::where('id',$id)->first()->item_arabic_name ?? '';
            $obj->item_id = $id;
            $obj->trans = array();
            foreach ($trans as $objs) {
                if ($objs->item_id == $id) {
                    array_push($obj->trans, $objs);
                }
              
            }
            array_push($filterd_trans, $obj);
        }





        $data = [
            'Title' =>  \Lang::get('titles.items_transactions_reports'),
            'trans' => $filterd_trans,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'Today' => date('Y-m-d'),
            'Logo'  => $company->company_logo ?? '',
            'Company' => $company,
            'User'  =>  Auth::user(),
            'clients' => $item_ids,

        ];
        $title = "My Report";
        $pdf = PDF::loadView('Admin.reports.items-trans.itemReport', $data);
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;

        return $pdf->stream('medium.pdf');
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
