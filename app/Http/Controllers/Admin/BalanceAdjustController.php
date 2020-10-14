<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Person;
use App\Models\FinanTransaction;
use Carbon\Carbon;

class BalanceAdjustController extends Controller
{

    protected $viewName;

    protected $message;
    protected $errormessage;

    public function __construct()
    {

        $this->middleware('auth');

        $this->viewName = 'Admin.balance-adjust.';

        $this->message = 'تم حفظ البيانات';
    }


    public function index()
    {
        $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        $id = 0;
        $suppliers = Person::where('person_type_id', 101)->where('company_id', $id)->where('active', 1)->get();
        return view($this->viewName . 'index', compact('companies'));
    }

    public function fetchPerson(Request $request)
    {
        $value = $request->get('value');

        $suppliers = Person::where('person_type_id', 101)->where('company_id', $value)->where('active', 1)->get();




        $output = '<option value="" >المورد</option>
               ';
        foreach ($suppliers as $row) {

            $output .= '<option value="' . $row->id . '">' . $row->person_name . '</option>';
        }

        echo $output;
    }

    public function fetchClient(Request $request)
    {
        $value = $request->get('value');

        $clients = Person::where('person_type_id', 100)->where('company_id', $value)->where('active', 1)->get();




        $output = '<option value="" >العملاء</option>
               ';
        foreach ($clients as $row) {

            $output .= '<option value="' . $row->id . '">' . $row->person_name . '</option>';
        }

        echo $output;
    }
    public function dynamicPersonComp(Request $request)
    {
        $value = $request->get('value');
        $person_id = $request->get('person_id');

        $persons = Person::where('person_type_id', $person_id)->where('company_id', $value)->where('active', 1)->get();



        if ($person_id == 100) {
            $output = '<option value="" >العملاء</option>
        ';
            foreach ($persons as $row) {

                $output .= '<option value="' . $row->id . '">' . $row->person_name . '</option>';
            }
        } else {
            $output = '<option value="" >المورد</option>
        ';
            foreach ($persons as $row) {

                $output .= '<option value="' . $row->id . '">' . $row->person_name . '</option>';
            }
        }


        echo $output;
    }

    public function getCurrentBalance(Request $request)
    {
        $person = $request->get('person');
        $type = $request->get('type');
        $currentBalance = FinanTransaction::where('person_id', $person)->sum('additive') - FinanTransaction::where('person_id', $person)->sum('subtractive');

        echo $currentBalance;
    }


    public function store(Request $request)
    {
        $data = [
            'transaction_date' => Carbon::parse($request->input('transaction_date')),
            'person_type_id' => $request->input('optionsRadios1'),
            'person_id' => $request->input('person_id'),


        ];
        if ($request->input('additv') == 10) {
            $data['subtractive'] = $request->input('amount');
            $data['additive'] = 0;
            $data['transaction_type_id'] = 118;
            $data['purch_sales_statement'] = 'حركة تسوية زيادة';
        } else {
            $data['additive'] = $request->input('amount');
            $data['subtractive'] = 0;
            $data['transaction_type_id'] = 119;
            $data['purch_sales_statement'] = 'حركة تسوية عجز';
        }

        FinanTransaction::create($data);

        return redirect()->route('balance-adjust')->with('flash_success', $this->message);
    }
}
