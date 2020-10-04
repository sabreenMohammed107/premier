<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CompanyUser;
use App\Models\Company;
use Carbon\Carbon;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;


class CashReportsController extends Controller
{
    public function ReceiptsReport()
    {
        $id = session('company_id');
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101) {
            $Companies = DB::table('companies')->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101]])->get();
        } else {
            $Companies = Company::where('id','=',$id)->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101],['company_id','=',$id]])->get();
        }

        return view('Company.cashReports.Receipt.create',[
            'Companies' => $Companies,
            'Persons' => $Persons,
        ]);
    }

    public function FetchReceiptReport(Request $request)
    {
        $Cash = DB::table('cash_master')
        ->select(DB::raw('cash_master.cash_amount,cash_master.company_id as id,cash_master.cash_date,cash_master.statement,cash_master.person_name,cash_master.person_id,cash_master.cash_receipt_note,guided_items.guided_item_name,cash_master.confirm,cash_master.approved,cash_master.notes,person_types.person_type_name,cash_master.fund_source,detailed_criterion,persons.company_id as p_comp_id'))
        ->where('cash_master_type','=',1);
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101) {
            $Cash->where('cash_master.company_id','=',$request->company_id);
        }else{
            $id = session('company_id');
            $Cash->where('cash_master.company_id','=',$id);
        }
        if(!empty($request->cash_receipt_note)){
            $Cash->where('cash_receipt_note','=',$request->cash_receipt_note);
        }
        if(!empty($request->cash_receipt_note)){
            $Cash->where('cash_receipt_note','=',$request->cash_receipt_note);
        }
        if(!empty($request->from_date) && !empty($request->to_date)){
            $from = $request->from_date;
            $to = $request->to_date;
            $Cash->whereBetween('cash_date', [$from, $to]);
        }
        if(!empty($request->approved)){
            $Cash->where('approved','=',$request->approved);
        }
        if(!empty($request->fund_source)){
            $Cash->where('fund_source','=',$request->fund_source);
        }
        if(!empty($request->confirm)){
            $Cash->where('confirm','=',$request->confirm);
        }
        if(!empty($request->guided_item_id)){
            if($request->guided_item_id == 0){
                $Cash->where('guided_item_id','=',null);
            }else{
                $Cash->where('guided_item_id','!=',null);
            }
        }
        if(!empty($request->person_id)){
            $Cash->where('person_id','=',$request->person_id);
        }
        $Cashes = $Cash
        ->leftjoin('guided_items','guided_items.id','=','cash_master.guided_item_id')
        ->leftjoin('persons','persons.id','=','cash_master.person_id')
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->get();
        $id = session('company_id');
        $Company = Company::find($id);
        $data = [
            'Cashes' => $Cashes,
            'Title' => 'تقرير المقبوضات النقدية',
            'Today' => date('Y-m-d'),
            'Logo'  => $Company->company_logo,
            'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        $pdf = PDF::loadView('Company.cashReports.Receipt.report', $data);
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('cash_receipt.pdf');

        // return $Cashes;
        // return view('Company.cashReports.Receipt.report', $data);
    }
}
