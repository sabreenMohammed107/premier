<?php

namespace App\Http\Controllers\Company\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ClientsReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ClientsReport()
    {
        $id = session('company_id');
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $Companies = DB::table('companies')->get();
        } else {
            $Companies = Company::where('id','=',$id)->get();
        }

        return view('Reports.Clients.create',[
            'Companies' => $Companies,
        ]);
    }

    public function FetchClientsReport(Request $request)
    {
        $TotalPay = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.subtractive) as total_pay, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [102, 107, 109])
        ->groupBy('person_id');

        $TotalRec = DB::table('finan_transactions')
        ->select(DB::raw('sum(finan_transactions.additive) as total_rec, finan_transactions.person_id'))
        ->whereIn('finan_transactions.transaction_type_id', [104, 106, 108])
        ->groupBy('person_id');

        $Supplier = DB::table('persons')
        ->select(DB::raw('ifnull(total_pay,0) as total_pay,ifnull(total_rec,0) as total_rec,persons.id,ifnull(persons.phone1,0) as phone1,sum(ifnull(total_price_post_discounts,0)) as total_sales,persons.person_name, ifnull(persons.open_balance,0) as open_balance, sum(ifnull(total_price_post_discounts,0) + ifnull(persons.open_balance,0) + ifnull(total_pay,0) - ifnull(total_rec,0)) as current'))
        ->leftJoin('invoices','invoices.person_id','=','persons.id')
        ->leftJoinSub($TotalPay,'finan_transactions',function($join){
            $join->on('finan_transactions.person_id', '=', 'persons.id');
        })
        ->leftJoinSub($TotalRec,'finan_transactions_rec',function($join){
            $join->on('finan_transactions_rec.person_id', '=', 'persons.id');
        })
        ->where('person_type_id','=',100);
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $id = $request->company_id;
            $Supplier->where('persons.company_id','=',$request->company_id);
        }else{
            $id = session('company_id');
            $Supplier->where('persons.company_id','=',$id);
        }
        $Suppliers = $Supplier
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->groupBy('persons.person_name','total_pay','total_rec','persons.id','phone1','persons.open_balance')
        ->get();
        // return $Suppliers;
        // $id = session('company_id');
        $Company = Company::find($id);
        $data = [
            'Suppliers' => $Suppliers,
          
            'Title' =>   \Lang::get('titles.customer_balances_reports'),
            'Today' => date('Y-m-d'),
            'Logo'  => $Company->company_logo,
            'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        if(app()->getLocale() =='ar'){
            $pdf = PDF::loadView('Reports.Clients.report', $data);
        }else{
            $pdf = PDF::loadView('Reports.Clients.reportEn', $data);
        }
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('clients.pdf');

        // return $Cashes;
        // return view('Company.cashReports.Receipt.report', $data);
    }
}
