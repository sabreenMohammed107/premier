<?php

namespace App\Http\Controllers\Company\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;

class PermissionReportsController extends Controller
{
    //
    public function ReceiptsReport()
    {
        $id = session('company_id');
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $Companies = DB::table('companies')->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101]])->get();
        } else {
            $Companies = Company::where('id','=',$id)->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101],['company_id','=',$id]])->get();
        }

        return view('Reports.Permissions.Receipt.create',[
            'Companies' => $Companies,
            'Persons' => $Persons,
        ]);
    }

    public function FetchReceiptReport(Request $request)
    {
        $Cash = DB::table('cash_master')
        ->select(DB::raw('cash_master.cash_amount,cash_master.company_id as id,cash_master.cash_date,cash_master.statement,cash_master.person_name,cash_master.person_id,cash_master.cash_receipt_note,cash_master.confirm,cash_master.approved,cash_master.notes,person_types.person_type_name,cash_master.fund_source,detailed_criterion,persons.company_id as p_comp_id'))
        ->where('cash_master_type','=',1);
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $id = $request->company_id;
            $Cash->where('cash_master.company_id','=',$request->company_id);
        }else{
            $id = session('company_id');
            $Cash->where('cash_master.company_id','=',$id);
        }
        if(!empty($request->cash_receipt_note)){
            $Cash->where('cash_receipt_note','=',$request->cash_receipt_note);
        }
        if(!empty($request->from_date) && !empty($request->to_date)){
            $from = $request->from_date;
            $to = $request->to_date;
            $Cash->whereBetween('cash_date', [$from, $to]);
        }
        if(!empty($request->person_type_id)){
            $Cash->where('person_type_id','=',$request->person_type_id);
        }
        if(!empty($request->person_id)){
            $Cash->where('person_id','=',$request->person_id);
        }
        $Cashes = $Cash
        ->leftjoin('persons','persons.id','=','cash_master.person_id')
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->get();
        // $id = session('company_id');
        $Company = Company::find($id);
        $data = [
            'Cashes' => $Cashes,
            'Title' => 'اذن استلام نقدية',
            'Today' => date('Y-m-d'),
            'Logo'  => $Company->company_logo,
            'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        $pdf = PDF::loadView('Reports.Permissions.Receipt.report', $data);
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('cash_receipt.pdf');

        // return $Cashes;
        // return view('Company.cashReports.Receipt.report', $data);
    }

    public function PaymentsReport()
    {
        $id = session('company_id');
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $Companies = DB::table('companies')->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101]])->get();
        } else {
            $Companies = Company::where('id','=',$id)->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101],['company_id','=',$id]])->get();
        }

        return view('Reports.Permissions.Payment.create',[
            'Companies' => $Companies,
            'Persons' => $Persons,
        ]);
    }

    public function FetchPaymentReport(Request $request)
    {
        $Cash = DB::table('cash_master')
        ->select(DB::raw('cash_master.cash_amount,cash_master.company_id as id,cash_master.cash_date,cash_master.statement,cash_master.person_name,cash_master.person_id,cash_master.exit_permission_code,cash_master.confirm,cash_master.approved,cash_master.notes,person_types.person_type_name,cash_master.fund_source,detailed_criterion,persons.company_id as p_comp_id'))
        ->where('cash_master_type','=',0);
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $id = $request->company_id;
            $Cash->where('cash_master.company_id','=',$request->company_id);
        }else{
            $id = session('company_id');
            $Cash->where('cash_master.company_id','=',$id);
        }
        if(!empty($request->exit_permission_code)){
            $Cash->where('exit_permission_code','=',$request->exit_permission_code);
        }
        if(!empty($request->from_date) && !empty($request->to_date)){
            $from = $request->from_date;
            $to = $request->to_date;
            $Cash->whereBetween('cash_date', [$from, $to]);
        }
        if(!empty($request->person_type_id)){
            $Cash->where('person_type_id','=',$request->person_type_id);
        }
        if(!empty($request->person_id)){
            $Cash->where('person_id','=',$request->person_id);
        }
        $Cashes = $Cash
        ->leftjoin('persons','persons.id','=','cash_master.person_id')
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->get();
        // $id = session('company_id');
        $Company = Company::find($id);
        $data = [
            'Cashes' => $Cashes,
            'Title' => 'اذن صرف نقدية',
            'Today' => date('Y-m-d'),
            'Logo'  => $Company->company_logo,
            'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        $pdf = PDF::loadView('Reports.Permissions.Payment.report', $data);
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('cash_receipt.pdf');

        // return $Cashes;
        // return view('Company.cashReports.Receipt.report', $data);
    }
}
