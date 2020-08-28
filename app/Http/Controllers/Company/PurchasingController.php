<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\BusinessItemsSetup;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Item;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class PurchasingController extends Controller
{
    public function Invoices()
    {
        //Define user's company id
        $id = session('company_id');
        //Company to which the user belongs
        $Company = Company::find($id);
        //All Company purchasing invoices
        $Invoices = DB::table('invoices')
        ->select('outgoing_types.id as outgoing_type_id','purchasing_types.id as purchasing_type_id','services_types.id as service_type_id','invoices.id as id','invoice_type','inv_date','approved','invoice_no','serial','person_id','person_name','company_id','outgoing_type_id','purchasing_type_id','service_type_id','total_items_price','total_items_discount','total_price_post_discounts','total_vat','total_comm_industr_tax','discount_notice_serial','net_invoice','invoices.notes','outgoing_type_name','purchasing_types_name','service_type')
        ->join('outgoing_types','invoices.outgoing_type_id','=','outgoing_types.id')
        ->join('purchasing_types','invoices.purchasing_type_id','=','purchasing_types.id')
        ->join('services_types','invoices.service_type_id','=','services_types.id')
        ->where([['invoice_type','=',0],['company_id','=',$id]])
        ->orderBy('id', 'desc')
        ->get();

        return view('Company.invoices.purchasing.index',[
            'Invoices' => $Invoices,
            'Company' => $Company,
        ]);
    }

    public function AddInvoice()
    {
        $id = session('company_id');

        $Company = Company::find($id);

        $Suplliers = DB::table('persons')
        ->where([['company_id','=',$id],['person_type_id','=',101]])->get();

        $VAT = BusinessItemsSetup::find(100);
        $CIT_Items = BusinessItemsSetup::find(101);
        $CIT_Services = BusinessItemsSetup::find(102);

        return view('Company.invoices.purchasing.create',[
            'Company'   => $Company,
            'Suppliers' => $Suplliers,
            'VAT'=>$VAT,
            'CIT_Items'=>$CIT_Items,
            'CIT_Services'=>$CIT_Services,

        ]);
    }

    public function AddRow(Request $req)
    {
        if($req->ajax()){
            $rowCount = $req->rowCount;

            $Items = DB::table('items')
            ->where('company_id','=',$req->compid)->get();

            $ajaxComponent = view('Company.components.ajax.PurchasingRow',[
                'rowCount'=>$rowCount,
                'Items'=>$Items,
            ]);


            return $ajaxComponent->render();
        }
    }

    public function FetchPerson(Request $request, string $type)
    {
        if ($request->ajax()) {
            if ($type == 'Employees') {
                $Persons = DB::table('persons')
                ->where([['company_id','=',$request->compid],['person_type_id','=',102]])->get();
                $type = 'موظف';
            }elseif ($type == 'Suppliers') {
                $Persons = DB::table('persons')
                ->where([['company_id','=',$request->compid],['person_type_id','=',101]])->get();
                $type = 'مورد';

            }else{
                $Persons = [];
                $type = 'أخرى';
            }
            $ajaxComponent = view('Company.components.ajax.InvoicePersonType',['Persons'=>$Persons,'type'=>$type]);

            return $ajaxComponent->render();
        }
    }

    public function CreateInvoice(Request $request)
    {
        if($request->ajax()){
            DB::beginTransaction();
            try {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                $Inv = $request->invoice;
                $Inv_items = $request->invoice_items;
                $Invoice = Invoice::create($Inv);
                foreach ($Inv_items as $key => $Item) {
                    if($Item['is_stored'] == 'no'){
                        $Item['store_item'] = 0;
                    }else{
                        $Item['store_item'] = 1;
                    }
                    $Item['inv_id'] = $Invoice->id;
                    $Invoice_Item = InvoiceItem::create($Item);
                }
                $request->session()->flash('flash_success', "تم اضافة الفاتورة رقم : $Invoice->invoice_no");
                DB::commit();
                return url('/Invoices/Purchasing');
            } catch (\Throwable $th) {
                // throw $th;
                DB::rollBack();
                $request->session()->flash('flash_danger', "حدث خطأ ما يرجي اعادة المحاولة");
                return url('/Invoices/Purchasing');
            }
        }
    }

    public function EditInvoice(int $inv_id)
    {
        $id = session('company_id');

        $Company = Company::find($id);
        $Invoice = Invoice::find($inv_id);
        if($Invoice->person){
            $Person = $Invoice->person;
        }else{
            $Person = new stdClass;
            $Person->person_type_id = 'other';
            $Person->person_name = $Invoice->person_name;
        }

        // return $Invoice->invoice_items;
        if($Person->person_type_id == 101){
            $Persons = DB::table('persons')
            ->where([['company_id','=',$id],['person_type_id','=',101]])->get();
        }elseif($Person->person_type_id == 102){
            $Persons = DB::table('persons')
            ->where([['company_id','=',$id],['person_type_id','=',102]])->get();
        }else{
            $Persons = [];
        }


        $VAT = BusinessItemsSetup::find(100);
        $CIT_Items = BusinessItemsSetup::find(101);
        $CIT_Services = BusinessItemsSetup::find(102);

        $Items = Item::where('company_id','=',$id)->get();

        return view('Company.invoices.purchasing.edit',[
            'Company'   => $Company,
            'Persons' => $Persons,
            'VAT'=>$VAT,
            'CIT_Items'=>$CIT_Items,
            'CIT_Services'=>$CIT_Services,
            'Invoice'=>$Invoice,
            'Items'=>$Items,
            'Person'=>$Person,
        ]);
    }

    public function FetchItems(Request $req)
    {
        if($req->ajax()){
            $rowCount = $req->rowCount;
            $inv_id = $req->inv_id;

            $Invoice_Items = DB::table('invoice_items')
            ->where('inv_id','=',$inv_id)->get();

            $Items = DB::table('items')
            ->where('company_id','=',$req->compid)->orderBy('id', 'desc')->get();

            $ajaxComponent = view('Company.components.ajax.PurchasingRowUpdate',[
                'rowCount'=>$rowCount,
                'Items'=>$Items,
                'Invoice_Items'=>$Invoice_Items,
            ]);


            return $ajaxComponent->render();
        }
    }

    public function DeleteInvoiceItem(int $inv_id, int $id)
    {
        $Item = InvoiceItem::find($id);
        $Item->delete();

        return redirect("/Invoices/Purchasing/$inv_id/Edit")->with('flash_success', "تم مسح المنتج $Item->item_text بنجاح");
    }

    public function UpdateInvoice(Request $request)
    {
        if($request->ajax()){
            DB::beginTransaction();
            try {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                $Inv = $request->invoice;
                $Inv_items_new = $request->new_invoice_items;
                $Inv_items_old = $request->old_invoice_items;
                $inv_id = $Inv['inv_id'];
                $Invoice = Invoice::find($inv_id);
                $Invoice->update($Inv);
                if ($Inv_items_new) {
                    foreach ($Inv_items_new as $key => $Item) {
                        if($Item['is_stored'] == 'no'){
                            $Item['store_item'] = 0;
                        }else{
                            $Item['store_item'] = 1;
                        }
                        $Invoice_Item = InvoiceItem::create($Item);
                    }
                }
                if ($Inv_items_old) {
                    foreach ($Inv_items_old as $key => $oldItem) {
                        $InvoiceItem = InvoiceItem::find($oldItem['id']);
                        if($oldItem['is_stored'] == 'no'){
                            $oldItem['store_item'] = 0;
                        }else{
                            $oldItem['store_item'] = 1;
                        }
                        $InvoiceItem->update($oldItem);
                    }
                }
                $request->session()->flash('flash_success', "تم تعديل الفاتورة رقم : $Invoice->invoice_no");
                DB::commit();
                return url("/Invoices/Purchasing/$inv_id/Edit");
            } catch (\Throwable $th) {
                throw $th;
                DB::rollBack();
                $request->session()->flash('flash_danger', "حدث خطأ ما يرجي اعادة المحاولة");
                return url("/Invoices/Purchasing/$inv_id/Edit");
            }
        }
    }

    public function ViewInvoice(int $id)
    {
        //Define user's company id
        $compid = session('company_id');
        //Company to which the user belongs
        $Company = Company::find($compid);
        //All Company purchasing invoices
        $Invoice = Invoice::find($id);
        //Invoice person
        if($Invoice->person_id){
            $Person = Person::find($Invoice->person_id);
            if($Person->person_type_id == 101){
                $type = 'مورد';
            }else{
                $type = 'موظف';
            }
        }else{
            $type = 'أخرى';
        }
        //Invoice items
        $InvoiceItems = DB::table('invoice_items')
        ->where('inv_id','=',$id)->get();

        return view('Company.invoices.purchasing.view',[
            'Company'   => $Company,
            'Invoice' => $Invoice,
            'InvoiceItems'=>$InvoiceItems,
            'type'=>$type
        ]);
    }

    public function DeleteInvoice(string $type, int $id)
    {
        DB::beginTransaction();
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $Invoice = Invoice::find($id);
            $InvoiceItems = InvoiceItem::where('inv_id','=',$id)->get();

            foreach ($InvoiceItems as $key => $Item) {
                $Item->delete();
            }
            $Invoice->delete();

            if($type == 'Sales'){
                $no = $Invoice->serial;
            }else{
                $no = $Invoice->invoice_no;
            }

            DB::commit();
            return redirect("/Invoices/$type")->with('flash_success', "نجحت عملية حذف الفاتورة رقم : $no");

        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return redirect("/Invoices/$type")->with('flash_danger', "فشلت عملية حذف الفاتورة رقم : $no");

        }

    }
}
