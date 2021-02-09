<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Person;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class InvoiceSalePurchController extends Controller
{
      /**
     * Purch Invoice
     */
    public function indexPurch()
    {
        $user=Auth::user();
        $exception = $user->company->pluck('id')->toArray();
      
        $companies = Company::whereIn('id', $exception)->where('id', '!=', 100)->get();
        if(Auth::user()->role_id == 110){
            $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        }
        // $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        $compid = 0;
       
        $Invoices = Invoice::where('company_id', $compid)->orderBy('id', 'desc')->get();

        return view('Admin.invoice.purch', compact('companies', 'Invoices'));
    }
    public function purchSelect(Request $request)
    {

        $compid = $request->input('company_id');


        $Company = Company::find($compid);

        $Invoices = Invoice::where('company_id', $compid)->where('invoice_type', 0)->orderBy('id', 'desc')->get();
        $user=Auth::user();
        $exception = $user->company->pluck('id')->toArray();
      
        $companies = Company::whereIn('id', $exception)->where('id', '!=', 100)->get();
        if(Auth::user()->role_id == 110){
            $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        }
        // $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();

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
                $type =  \Lang::get('titles.suppliers');
            } else {
                $type =  \Lang::get('titles.employees');
            }
        } else {
            $type =  \Lang::get('titles.other');
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
        $user=Auth::user();
        $exception = $user->company->pluck('id')->toArray();
      
        $companies = Company::whereIn('id', $exception)->where('id', '!=', 100)->get();
        // $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        if(Auth::user()->role_id == 110){
            $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        }
        $compid = 0;

        $Invoices = Invoice::where('company_id', $compid)->orderBy('id', 'desc')->get();

        return view('Admin.invoice.sale', compact('companies', 'Invoices'));
    }

    public function saleSelect(Request $request)
    {

        $compid = $request->input('company_id');


        $Company = Company::find($compid);

        $Invoices = Invoice::where('company_id', $compid)->where('invoice_type', 1)->orderBy('id', 'desc')->get();
        $user=Auth::user();
        $exception = $user->company->pluck('id')->toArray();
      
        $companies = Company::whereIn('id', $exception)->where('id', '!=', 100)->get();
        if(Auth::user()->role_id == 110){
            $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        }
        // $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();

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
                $type =  \Lang::get('titles.suppliers');
            } else {
                $type =  \Lang::get('titles.employees');
            }
        } else {
            $type =  \Lang::get('titles.others');
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
