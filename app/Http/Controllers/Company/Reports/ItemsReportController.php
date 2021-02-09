<?php

namespace App\Http\Controllers\Company\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ItemsReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ItemsReport()
    {
        $id = session('company_id');
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $Companies = DB::table('companies')->get();
        } else {
            $Companies = Company::where('id','=',$id)->get();
        }

        return view('Reports.Items.create',[
            'Companies' => $Companies,
        ]);
    }

    public function FetchItemsReport(Request $request)
    {
        $TotalAdd = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.additive) as total_add, finan_transactions.item_id'))
        ->where('finan_transactions.transaction_type_id','=',116)
        ->groupBy('item_id');

        $TotalSub = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.subtractive) as total_sub, finan_transactions.item_id'))
        ->where('finan_transactions.transaction_type_id','=',117)
        ->groupBy('item_id');

        $Item = DB::table('items')
        ->select(DB::raw('items.id as id, items.item_arabic_name as item_name,ifnull(items.open_item_price,0) as open_item_price,ifnull(total_open_balance_cost,0) as total_open_balance, (ifnull(total_open_balance_cost,0) + ifnull(total_add,0) - ifnull(total_sub,0)) as current'))
        ->leftJoinSub($TotalAdd,'finan_transactions',function($join){
            $join->on('finan_transactions.item_id', '=', 'items.id');
        })
        ->leftJoinSub($TotalSub,'finan_transactions_sub',function($join){
            $join->on('finan_transactions_sub.item_id', '=', 'items.id');
        });
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $id = $request->company_id;
            $Item->where('items.company_id','=',$request->company_id);
        }else{
            $id = session('company_id');
            $Item->where('items.company_id','=',$id);
        }
        $Items = $Item->get();
        // return $Items;
        // $id = session('company_id');
        $Company = Company::find($id);
        $data = [
            'Items' => $Items,
           
            'Title' =>  \Lang::get('titles.items_reports'),
            'Today' => date('Y-m-d'),
            'Logo'  => $Company->company_logo,
            'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        if(app()->getLocale() =='ar'){
            $pdf = PDF::loadView('Reports.Items.report', $data);
        }else{
            $pdf = PDF::loadView('Reports.Items.reportEn', $data);
        }
      
     
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('clients.pdf');

        // return $Cashes;
        // return view('Company.cashReports.Receipt.report', $data);
    }
}
