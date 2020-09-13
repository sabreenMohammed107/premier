<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BalanceMonth;
use App\Models\BalanceYear;
use App\Models\Company;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;
use DB;
use Log;
use File;

class AllCompaniesController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Company $object)
    {

        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'Admin.home.';
        $this->routeName = 'home.';

        $this->message = 'تم حفظ البيانات';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Company::where('active', 1)->paginate(8);
       
         return view($this->viewName . 'index', compact('rows'));
    }

    public function home()
    {
        $rows = Company::where('active', 1)->paginate(8);

        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view($this->viewName . 'add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'company_official_name' => $request->input('company_official_name'),
            'company_nick_name' => $request->input('company_nick_name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'tax_authority' => $request->input('tax_authority'),
            'registeration_no' => $request->input('registeration_no'),
            'commercial_register' => $request->input('commercial_register'),
            'tax_card' => $request->input('tax_card'),
            'equity_capital' => $request->input('equity_capital'),
            'legal_entity' => $request->input('legal_entity'),

            'chairman_person_name' => $request->input('chairman_person_name'),
            'contact_person_name' => $request->input('contact_person_name'),
            'fax' => $request->input('fax'),

            'phone2' => $request->input('phone2'),
            'phone1' => $request->input('phone1'),
            'address' => $request->input('address'),


            'notes' => $request->input('notes'),
            'active' => $request->input('active'),
            'taxable' => $request->input('taxable'),

        ];

        if ($request->hasFile('company_logo')) {
            $company_logo = $request->file('company_logo');

            $data['company_logo'] = $this->UplaodImage($company_logo);
        }




        // DB::beginTransaction();
        // try {
            $company = $this->object::create($data);
            $yy = date("Y");
         
            $yearData = [
                'year' => $yy,
                'company_id' => $company->id,
                'period_from_date' => Carbon::create("$yy-01-01"),
                'period_to_date' => Carbon::create("$yy-12-31"),
                'year_type' => 2,
                'period_open_date' => Carbon::create("$yy-01-01"),
                'period_closed_date' => Carbon::create("$yy-12-31"),
                'notes' => "سنه افتتاحيه"
            ];


            $year = BalanceYear::create($yearData);
        

            for ($i = 1; $i <= 12; $i++) {
                $monthData = new BalanceMonth();
                $monthData->year = date("Y");
                $monthData->company_id = $company->id;
                $monthData->month_no = $i;
                $monthData->period_from_date = Carbon::create("$yy-$i-01");
                $monthData->period_open_date = Carbon::create("$yy-$i-01");
                $monthData->notes = "شهر افتتاحيه";
                if ($i == 1) {
                    $monthData->can_change = 1;
                } else {
                    $monthData->can_change = 2;
                }
                $monthData->period_end_date = date("$yy-$i-t", strtotime("$yy-$i-1"));
                $monthData->period_closed_date = date("$yy-$i-t", strtotime("$yy-$i-1"));
                $monthData->save();
            }
         

            return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     DB::rollBack();
        //     return redirect()->back()->with('flash_danger', "لم يتم حفظها بسبب خطأ ما حاول مرة أخرى و تأكد من البيانات المدخله");
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = Person::where('person_type_id', 100)->where('company_id', $id)->where('active', 1)->paginate(8);
        $suppliers = Person::where('person_type_id', 101)->where('company_id', $id)->where('active', 1)->paginate(8);
        $employees = Person::where('person_type_id', 102)->where('company_id', $id)->where('active', 1)->paginate(8);

        $companyrow = Company::where('id', '=', $id)->first();

        return view($this->viewName . 'view', compact('companyrow', 'clients', 'suppliers', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Company::where('id', '=', $id)->first();

        return view($this->viewName . 'edit', compact('row'));
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
        $data = [
            'company_official_name' => $request->input('company_official_name'),
            'company_nick_name' => $request->input('company_nick_name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'tax_authority' => $request->input('tax_authority'),
            'registeration_no' => $request->input('registeration_no'),
            'commercial_register' => $request->input('commercial_register'),
            'tax_card' => $request->input('tax_card'),
            'equity_capital' => $request->input('equity_capital'),
            'legal_entity' => $request->input('legal_entity'),

            'chairman_person_name' => $request->input('chairman_person_name'),
            'contact_person_name' => $request->input('contact_person_name'),
            'fax' => $request->input('fax'),

            'phone2' => $request->input('phone2'),
            'phone1' => $request->input('phone1'),
            'address' => $request->input('address'),


            'notes' => $request->input('notes'),
            'active' => $request->input('active'),
            'taxable' => $request->input('taxable'),

        ];

        if ($request->hasFile('company_logo')) {
            $company_logo = $request->file('company_logo');

            $data['company_logo'] = $this->UplaodImage($company_logo);
        }





        $this->object::findOrFail($id)->update($data);

        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Company::where('id', '=', $id)->first();
        // Delete File ..

        $file = $row->company_logo;

        $file_name = public_path('uploads/companies/' . $file);


        //  }
        try {
            $row->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'هذا الجدول مرتبط ببيانات أخرى');
        }
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحذف بنجاح !');
    }



    /**
     * uplaud image
     */
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();


        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/companies');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }

    /**
     * Make pagination on employee and return with ajax
     */


    function fetch_emp(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('company_id');


            $employees = Person::where('person_type_id', 102)->where('company_id', $id)->where('active', 1)->paginate(8);


            return view($this->viewName . 'employee', compact('employees'));
        }
    }

    /**
     * Make pagination on client and return with ajax
     */


    function fetch_client(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('company_id');


            $clients = Person::where('person_type_id', 100)->where('company_id', $id)->where('active', 1)->paginate(8);


            return view($this->viewName . 'client', compact('clients'));
        }
    }

    /**
     * Make pagination on supplier and return with ajax
     */


    function fetch_supplier(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('company_id');


            $suppliers = Person::where('person_type_id', 101)->where('company_id', $id)->where('active', 1)->paginate(8);


            return view($this->viewName . 'supplier', compact('suppliers'));
        }
    }

    function search_emp(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('company_id');
            $input = $request->input('searchEmp');

            $employees = Person::where('person_type_id', 102)->where('company_id', $id)->where('active', 1)
                ->where('person_name', 'LIKE', '%' . $input . '%')->orWhere('person_nick_name', 'LIKE', '%' . $input . '%')->paginate(8);


            return view($this->viewName . 'employee', compact('employees'));
        }
    }


    function search_client(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('company_id');
            $input = $request->input('searchClient');

            $clients = Person::where('person_type_id', 100)->where('company_id', $id)->where('active', 1)
                ->where('person_name', 'LIKE', '%' . $input . '%')->orWhere('person_nick_name', 'LIKE', '%' . $input . '%')->paginate(8);


            return view($this->viewName . 'client', compact('clients'));
        }
    }


    function search_sup(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('company_id');
            $input = $request->input('searchSup');

            $suppliers = Person::where('person_type_id', 101)->where('company_id', $id)->where('active', 1)
                ->where('person_name', 'LIKE', '%' . $input . '%')->orWhere('person_nick_name', 'LIKE', '%' . $input . '%')->paginate(8);


            return view($this->viewName . 'supplier', compact('suppliers'));
        }
    }
}
