<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BalanceMonth;
use Illuminate\Http\Request;
use App\Models\Company;

class MonthBalanceController extends Controller
{
    protected $viewName;

    protected $message;
    protected $errormessage;

    public function __construct()
    {

        $this->middleware('auth');

        $this->viewName = 'Admin.month-balance.';

        $this->message = 'تم حفظ البيانات';
    }
    public function index()
    {
        $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        $months = array();
        return view($this->viewName . 'index', compact('companies', 'months'));
    }
    public function fetchMonth(Request $request)
    {
        $value = $request->get('value');

        $months = BalanceMonth::where('company_id', $value)->WhereHas('company', function ($q)  {
            $q->with('comLast');
        })->orderBy("created_at", "Desc")->limit(12)
        ->get();

        return view($this->viewName . 'tableData', compact('months'))->render();
    }
    public function monthClose(Request $request)
    {
        $id = $request->get('id');
        $month = BalanceMonth::where('id', $id)->first();

        $month2 = BalanceMonth::where('id', '>', $id)->first();
        $month1 = BalanceMonth::where('id', '<', $id)->orderBy("id", "Desc")->first();
        if ($month) {
            $month->can_change = 0;

            $month->update();
        }
        if ($month1) {
            $month1->can_change = 2;
            $month1->month_type = 1;

            $month1->update();
        }
        if ($month2) {
            $month2->can_change = 1;
            $month2->update();
        }




        $months = $months = BalanceMonth::where('company_id', $month->company_id)->WhereHas('company', function ($q)  {
            $q->with('comLast');
        })->with('company')->orderBy("created_at", "Desc")->limit(12)
        ->get();

        return view($this->viewName . 'tableData', compact('months'))->render();
    }
    public function monthOpen(Request $request)
    {
        $id = $request->get('id');
        $month = BalanceMonth::where('id', $id)->first();

        $month2 = BalanceMonth::where('id', '>', $id)->first();
        $month1 = BalanceMonth::where('id', '<', $id)->orderBy("id", "Desc")->first();
        if ($month) {
            $month->can_change = 1;
            $month->update();
        }
        if ($month1) {
            $month1->can_change = 0;
            $month1->month_type = 1;

            $month1->update();
        }
        if ($month2) {
            $month2->can_change = 2;

            $month2->update();
        }




        $months = BalanceMonth::where('company_id', $month->company_id)->WhereHas('company', function ($q)  {
            $q->with('comLast');
        })->with('company')->orderBy("created_at", "Desc")->limit(12)
        ->get();
        // dd($months);
         return view($this->viewName .'tableData', compact('months'))->render();
    }
}
