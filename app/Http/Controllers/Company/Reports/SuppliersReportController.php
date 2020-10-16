<?php

namespace App\Http\Controllers\Company\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;

class SuppliersReportController extends Controller
{
    public function SuppliersReport()
    {
        $id = session('company_id');
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $Companies = DB::table('companies')->get();
        } else {
            $Companies = Company::where('id','=',$id)->get();
        }

        return view('Reports.Suppliers.create',[
            'Companies' => $Companies,
        ]);
    }

    public function FetchSuppliersReport(Request $request)
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
        ->select(DB::raw('ifnull(total_pay,0) as total_pay,ifnull(total_rec,0) as total_rec,persons.id,ifnull(persons.phone1,0) as phone1,sum(total_price_post_discounts) as total_purch,persons.person_name, persons.open_balance, sum(ifnull(total_price_post_discounts,0) + ifnull(persons.open_balance,0) + ifnull(total_rec,0) - ifnull(total_pay,0)) as current'))
        ->leftJoin('invoices','invoices.person_id','=','persons.id')
        ->leftJoinSub($TotalPay,'finan_transactions',function($join){
            $join->on('finan_transactions.person_id', '=', 'persons.id');
        })
        ->leftJoinSub($TotalRec,'finan_transactions_rec',function($join){
            $join->on('finan_transactions_rec.person_id', '=', 'persons.id');
        })
        ->where('person_type_id','=',101);
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
            'Title' => 'تقرير ارصدة موردين',
            'Today' => date('Y-m-d'),
            'Logo'  => $Company->company_logo,
            'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        $pdf = PDF::loadView('Reports.Suppliers.report', $data);
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('suppliers.pdf');

        // return $Cashes;
        // return view('Company.cashReports.Receipt.report', $data);
    }
}
