<?php

namespace App\Http\Controllers\Company\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;

class InvoiceReportsController extends Controller
{
    public function PurchasingReport()
    {
        $id = session('company_id');
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $Companies = DB::table('companies')->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101]])->get();
        } else {
            $Companies = Company::where('id','=',$id)->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101],['company_id','=',$id]])->get();
        }

        return view('Reports.InvoiceReports.Purchasing.create',[
            'Companies' => $Companies,
            'Persons' => $Persons,
        ]);
    }

    public function FetchPurchasingReport(Request $request)
    {
        $Invoice = Invoice::select(DB::raw('serial,return_back_invoice ,return_back_date,invoices.id,invoices.invoice_type,invoices.inv_date,invoices.approved,invoices.invoice_no,invoices.person_id,invoices.person_name,person_types.person_type_name,invoices.company_id,outgoing_type_name,service_type,purchasing_types_name,invoices.total_items_price,invoices.total_items_discount,invoices.total_price_post_discounts,invoices.total_vat,invoices.total_comm_industr_tax,invoices.net_invoice,invoices.notes'))
        ->where('invoice_type','=',0);
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $id = $request->company_id;
            $Invoice->where('invoices.company_id','=',$request->company_id);
        }else{
            $id = session('company_id');
            $Invoice->where('invoices.company_id','=',$id);
        }
        if(!empty($request->invoice_no)){
            $Invoice->where('invoice_no','=',$request->invoice_no);
        }
        if(!empty($request->from_date) && !empty($request->to_date)){
            $from = $request->from_date;
            $to = $request->to_date;
            $Invoice->whereBetween('inv_date', [$from, $to]);
        }
        if(!empty($request->approved)){
            $Invoice->where('approved','=',$request->approved);
        }
        if(!empty($request->return_back_invoice)){
            if($request->return_back_invoice == 0){
                $Invoice->where('return_back_invoice','=',null);
            }else{
                $Invoice->where('return_back_invoice','=',1);
            }
        }
        if(!empty($request->person_id)){
            $Invoice->where('person_id','=',$request->person_id);
        }
        if(!empty($request->outgoing_type_id)){
            $Invoice->where('outgoing_type_id','=',$request->outgoing_type_id);
        }
        if(!empty($request->service_type_id)){
            $Invoice->where('service_type_id','=',$request->service_type_id);
        }
        if(!empty($request->purchasing_type_id)){
            $Invoice->where('purchasing_type_id','=',$request->purchasing_type_id);
        }
        $Invoices = $Invoice
        ->leftjoin('persons','persons.id','=','invoices.person_id')
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->leftjoin('purchasing_types','purchasing_types.id','=','invoices.purchasing_type_id')
        ->leftjoin('services_types','services_types.id','=','invoices.service_type_id')
        ->leftjoin('outgoing_types','outgoing_types.id','=','invoices.outgoing_type_id')
        ->get();
        // $id = session('company_id');
        $Company = Company::find($id);
        $data = [
            'Invoices' => $Invoices,
            'Title' => 'تقرير المشتريات',
            'Today' => date('Y-m-d'),
            'Logo'  => $Company->company_logo,
            'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        $pdf = PDF::loadView('Reports.InvoiceReports.Purchasing.report', $data);
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('inv_purchasing.pdf');

        // return $Cashes;
        // return view('Company.cashReports.Receipt.report', $data);
    }

    public function SalesReport()
    {
        $id = session('company_id');
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $Companies = DB::table('companies')->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101]])->get();
        } else {
            $Companies = Company::where('id','=',$id)->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101],['company_id','=',$id]])->get();
        }

        return view('Reports.InvoiceReports.Sales.create',[
            'Companies' => $Companies,
            'Persons' => $Persons,
        ]);
    }

    public function FetchSalesReport(Request $request)
    {
        $Invoice = Invoice::select(DB::raw('serial,return_back_invoice ,return_back_date,invoices.id,invoices.invoice_type,invoices.inv_date,invoices.approved,invoices.invoice_no,invoices.person_id,invoices.person_name,person_types.person_type_name,invoices.company_id,outgoing_type_name,service_type,purchasing_types_name,invoices.total_items_price,invoices.total_items_discount,invoices.total_price_post_discounts,invoices.total_vat,invoices.total_comm_industr_tax,invoices.net_invoice,invoices.notes'))
        ->where('invoice_type','=',1);
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $id = $request->company_id;
            $Invoice->where('invoices.company_id','=',$request->company_id);
        }else{
            $id = session('company_id');
            $Invoice->where('invoices.company_id','=',$id);
        }
        if(!empty($request->invoice_no)){
            $Invoice->where('invoice_no','=',$request->invoice_no);
        }
        if(!empty($request->from_date) && !empty($request->to_date)){
            $from = $request->from_date;
            $to = $request->to_date;
            $Invoice->whereBetween('inv_date', [$from, $to]);
        }
        if(!empty($request->approved)){
            $Invoice->where('approved','=',$request->approved);
        }
        if(!empty($request->return_back_invoice)){
            if($request->return_back_invoice == 0){
                $Invoice->where('return_back_invoice','=',null);
            }else{
                $Invoice->where('return_back_invoice','=',1);
            }
        }
        if(!empty($request->person_id)){
            $Invoice->where('person_id','=',$request->person_id);
        }
        if(!empty($request->outgoing_type_id)){
            $Invoice->where('outgoing_type_id','=',$request->outgoing_type_id);
        }
        if(!empty($request->service_type_id)){
            $Invoice->where('service_type_id','=',$request->service_type_id);
        }
        if(!empty($request->purchasing_type_id)){
            $Invoice->where('purchasing_type_id','=',$request->purchasing_type_id);
        }
        $Invoices = $Invoice
        ->leftjoin('persons','persons.id','=','invoices.person_id')
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->leftjoin('purchasing_types','purchasing_types.id','=','invoices.purchasing_type_id')
        ->leftjoin('services_types','services_types.id','=','invoices.service_type_id')
        ->leftjoin('outgoing_types','outgoing_types.id','=','invoices.outgoing_type_id')
        ->get();
        // $id = session('company_id');
        $Company = Company::find($id);
        $data = [
            'Invoices' => $Invoices,
            'Title' => 'فاتورة مبيعات',
            'Today' => date('Y-m-d'),
            'Logo'  => $Company->company_logo,
            'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        $pdf = PDF::loadView('Reports.InvoiceReports.Sales.report', $data);
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('inv_sales.pdf');

        // return $Cashes;
        // return view('Company.cashReports.Receipt.report', $data);
    }
}
