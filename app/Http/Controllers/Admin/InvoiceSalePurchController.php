<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Person;
use Illuminate\Http\Request;
use DB;

class InvoiceSalePurchController extends Controller
{
      /**
     * Purch Invoice
     */
    public function indexPurch()
    {
        $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        $compid = 0;
       
        $Invoices = Invoice::where('company_id', $compid)->orderBy('id', 'desc')->get();

        return view('Admin.invoice.purch', compact('companies', 'Invoices'));
    }
    public function purchSelect(Request $request)
    {

        $compid = $request->input('company_id');


        $Company = Company::find($compid);
        // All Company purchasing invoices
        // $Invoices = DB::table('invoices')
        //     ->select('outgoing_types.id as outgoing_type_id', 'purchasing_types.id as purchasing_type_id', 'services_types.id as service_type_id', 'invoices.id as id', 'invoice_type', 'inv_date', 'approved', 'invoice_no', 'serial', 'person_id', 'person_name', 'company_id', 'outgoing_type_id', 'purchasing_type_id', 'service_type_id', 'total_items_price', 'total_items_discount', 'total_price_post_discounts', 'total_vat', 'total_comm_industr_tax', 'discount_notice_serial', 'net_invoice', 'invoices.notes', 'outgoing_type_name', 'purchasing_types_name', 'service_type')
        //     ->join('outgoing_types', 'invoices.outgoing_type_id', '=', 'outgoing_types.id')
        //     ->join('purchasing_types', 'invoices.purchasing_type_id', '=', 'purchasing_types.id')
        //     ->join('services_types', 'invoices.service_type_id', '=', 'services_types.id')
        //     ->where([['invoice_type', '=', 0], ['company_id', '=', $compid]])
        //     ->orderBy('id', 'desc')
        //     ->get();
        $Invoices = Invoice::where('company_id', $compid)->where('invoice_type', 0)->orderBy('id', 'desc')->get();
        $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();

        return view('Admin.invoice.indexTable', [
            'companies'   => $companies,
            'Invoices' => $Invoices,

        ])->render();
    }

    public function invoicePurchShow($id)
    {

        $Invoice = Invoice::find($id);
        $Company = Company::find($Invoice->company_id);
        //Invoice person
        if ($Invoice->person_id) {
            $Person = Person::find($Invoice->person_id);
            if ($Person->person_type_id == 101) {
                $type = 'مورد';
            } else {
                $type = 'موظف';
            }
        } else {
            $type = 'أخرى';
        }
        //Invoice items
        $InvoiceItems = DB::table('invoice_items')
            ->where('inv_id', '=', $id)->get();

        return view('Admin.invoice.viewPurch', [
            'Company'   => $Company,
            'Invoice' => $Invoice,
            'InvoiceItems' => $InvoiceItems,
            'type' => $type
        ]);
    }
    /**
     * Sale Invoice
     */
    public function indexSale()
    {
        $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        $compid = 0;

        $Invoices = Invoice::where('company_id', $compid)->orderBy('id', 'desc')->get();

        return view('Admin.invoice.sale', compact('companies', 'Invoices'));
    }

    public function saleSelect(Request $request)
    {

        $compid = $request->input('company_id');


        $Company = Company::find($compid);

        $Invoices = Invoice::where('company_id', $compid)->where('invoice_type', 1)->orderBy('id', 'desc')->get();
        $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();

        return view('Admin.invoice.indexTableSale', [
            'companies'   => $companies,
            'Invoices' => $Invoices,

        ])->render();
    }


    public function invoiceSaleShow($id)
    {

        $Invoice = Invoice::find($id);
        $Company = Company::find($Invoice->company_id);
        //Invoice person
        if ($Invoice->person_id) {
            $Person = Person::find($Invoice->person_id);
            if ($Person->person_type_id == 101) {
                $type = 'مورد';
            } else {
                $type = 'موظف';
            }
        } else {
            $type = 'أخرى';
        }
        //Invoice items
        $InvoiceItems = DB::table('invoice_items')
            ->where('inv_id', '=', $id)->get();

        return view('Admin.invoice.viewSale', [
            'Company'   => $Company,
            'Invoice' => $Invoice,
            'InvoiceItems' => $InvoiceItems,
            'type' => $type
        ]);
    }
}
