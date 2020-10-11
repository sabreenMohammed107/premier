<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\FinanTransaction;
use App\Models\Person;
use Illuminate\Http\Request;
 use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;
class clientsReportController extends Controller
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
        $this->viewName = 'Admin.reports.';
        $this->routeName = 'Admin-client-report.';

        $this->message = 'تم حفظ البيانات';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Company::where('active', 1)->where('id', '!=', 100)->get();
        $clients = [];
        return view($this->viewName . 'create', compact('rows', 'clients'));
    }



    public function companyFetch(Request $request)
    {

        $company_id = $request->input('company_id');
        $clients = Person::where('person_type_id', 100)->where('company_id', $company_id)->where('active', 1)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'createTable', compact('clients'))->render();
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
        $company_id = $request->input('company_id');
        $client_ids = $request->input('client_ids');
        \Log::info($client_ids);
        $data = [
            'Title' => 'تقرير حركة العميل',
           
        ];
        $title = "My Report";
        $pdf = PDF::loadView('admin.reports.clientReport', $data);
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
