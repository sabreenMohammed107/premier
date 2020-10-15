<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BalanceMonth;
use App\Models\BalanceYear;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
class RestrictionsController extends Controller
{
    protected $viewName;

    protected $message;
    protected $errormessage;

    public function __construct()
    {

        $this->middleware('auth');

        $this->viewName = 'Admin.restrictions.';

        $this->message = 'تم حفظ البيانات';
    }
    public function index()
    {
        $user=Auth::user();
        $exception = $user->company->pluck('id')->toArray();
      
        $companies = Company::whereIn('id', $exception)->where('id', '!=', 100)->get();
        return view($this->viewName . 'index', compact('companies'));
    }

    /***
     * 
     */
    public function fetchYear(Request $request){

        $select = $request->get('select');
        $value = $request->get('value');

        $data =  BalanceYear::where('company_id', $value)->whereIn('year_type',[1,2])->get();

        $output = '<option value="">إختر السنه</option>';
        foreach ($data as $row) {

            $output .= '<option value="' . $row->id . '">' . $row->year . '</option>';
        }



        echo $output;

    }


    /***
     * 
     */
    public function fetchMonth(Request $request){

        $select = $request->get('select');
        $value = $request->get('company_id');

        $data = BalanceMonth::where('company_id', $value)->WhereHas('company', function ($q)  {
            $q->with('comLast');
        })->orderBy("created_at", "Desc")->limit(12)
        ->get();

        $output = '<option value="">إختر الشهر</option>';
        foreach ($data as $row) {

            $output .= '<option value="' . $row->month_no . '">' . $row->month_no . '</option>';
        }



        echo $output;
    }
}
