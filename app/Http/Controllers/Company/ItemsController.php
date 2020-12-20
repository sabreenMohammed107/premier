<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Company->Items
    public function Items()
    {
        $id = session('company_id');
        //Items data
        $Items = DB::table('items')
        ->select(DB::raw('sum(additive - subtractive) current_total,items.id,item_image,item_english_name,item_code,balance_start_date,total_open_balance_cost,item_arabic_name'))
        ->join('finan_transactions','finan_transactions.item_id','=','items.id')
        ->where('company_id','=',$id)
        ->groupBy(['items.id','items.item_image','item_english_name','item_code','balance_start_date','total_open_balance_cost','item_arabic_name'])->paginate(12);

        return view('Company.items.Items',[
            'Items'=>$Items,
            'id'=>$id,
        ]);
    }

    //Add Item
    public function AddItems()
    {
        $compid = session('company_id');

        //Company details
        $Company = Company::find($compid);

        return view('Company.items.Item-all',[
            'Company'=>$Company,
            'type'=>'Add',
            'CompanyId'=>$compid
        ]);
    }

    //(Edit - View) Item
    public function ItemsData(int $id, string $type)
    {
        $compid = session('company_id');

        //Company details
        $Company = Company::find($compid);
        //check for open balance availability
        $OpenBalance = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['item_id','=',$id]])->count();
        if($OpenBalance != 0){
            $open = 1;
        }else{
            $open=0;
        }
        //Current item
        $Item = DB::table('items')
        ->where([['id','=',$id],['company_id','=',$compid]])->first();

        //Current item balance value
        $TotalBalanceRec = DB::table('finan_transactions')
            ->select(DB::raw('sum(additive - subtractive) as total'))
            ->where([['item_id','=',$id]])
            ->first();
        $TotalBalance = $TotalBalanceRec->total;

        return view('Company.items.Item-all',[
            'type'=>$type,
            'id'=>$id,
            'CompanyId'=>$compid,
            'Item'=>$Item,
            'Company'=>$Company,
            'Open'=>$open,
            'TotalBalance'=>$TotalBalance,
        ]);
    }


    //Create Item
    public function CreateItems(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            //Configure file and storing it
            if($request->hasFile('logo')){
                $extension = $request->logo->extension();
                $filename = time() . '.' . $extension;
                $path = public_path('uploads/item');
                $request->file('logo')->move($path,$filename);
                $request->merge([
                    'item_image' => $filename,
                ]);
            }
            //configure data
            $TotalCost = ($request->total_open_balance_qty * $request->open_item_price);
            $request->merge([
                'total_open_balance_cost' => $TotalCost,
            ]);
            //create a record of person from received request
            $Item = Item::create($request->except(['logo','id']));
            //Create transaction (open balance)
                DB::table('finan_transactions')->insert(
                    ['transaction_type_id' => '110',
                    'transaction_date' => new \DateTime(),
                    'item_id' => $Item->id,
                    'additive' => $TotalCost,
                    'purch_sales_statement'=>'رصيد افتتاحي',
                    ]
                );


            //Commit data
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect("/Company/Items")->with('flash_success',  \Lang::get('titles.saving_msg'));


        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;
            return redirect("/Company/Items")->with('flash_danger', \Lang::get('titles.saving_msg_error'));
        }
    }

    //Update Item
    public function UpdateItems(Request $request)
    {
        //item to update
        $Item = Item::find($request->id);
        //Transactions check for open_balance
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['item_id','=',$Item->id]])->count();
        if ($Transactions == 0) {
            DB::beginTransaction();
            try {
                //Configure file and storing it
                if($request->hasFile('logo')){
                    $extension = $request->logo->extension();
                    $filename = time() . '.' . $extension;
                    $path = public_path('uploads/item');
                    $request->file('logo')->move($path,$filename);
                    $request->merge([
                        'item_image' => $filename,
                    ]);
                }
                //Configure data
                $TotalCost = ($request->total_open_balance_qty * $request->open_item_price);
                $request->merge([
                    'total_open_balance_cost' => $TotalCost,
                ]);

                //open balance transaction
                $OpenBalance = DB::table('finan_transactions')
                ->where([['transaction_type_id','=',110],['item_id','=',$Item->id]]);
                //update a record of item from received request
                $Item->update($request->except(['logo','id']));
                //update transaction data
                    $OpenBalance->update([
                        'transaction_date' => new \DateTime(),
                        'additive' => $TotalCost,
                        'subtractive' => 0,
                    ]);


                DB::commit();
                return redirect("/Company/Items")->with('flash_success', \Lang::get('titles.update_msg'));
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                return redirect("/Company/Items")->with('flash_danger', \Lang::get('titles.update_msg_error'));
            }
        }else{
            //update a record of person from received request
            $Item->update($request->except(['logo','id','balance_start_date','total_open_balance_qty','total_open_balance_cost','open_item_price']));
            return redirect("/Company/Items")->with('flash_info', \Lang::get('titles.balance_msg'));

        }

    }

    //Delete Item's Data
    public function DeleteItems(int $id)
    {
        //person to delete
        $Item = Item::find($id);
        //Transactions check for open_balance
        $Transactions = DB::table('finan_transactions')
        ->where([['transaction_type_id','<>',110],['item_id','=',$Item->id]])->count();
        //Actions
        if($Transactions == 0){
            DB::beginTransaction();
            try {
                $Item->delete();

                DB::commit();
                return redirect("/Company/Items")->with('flash_success',  \Lang::get('titles.delete_msg'));

            } catch (\Throwable $th) {
                DB::rollBack();
                // throw $th;
                return redirect("/Company/Items")->with('flash_danger', \Lang::get('titles.delete_msg_error'));
            }
        }else{
            return redirect("/Company/Items")->with('flash_danger', \Lang::get('titles.dont_delete_msg'));
        }
    }
}
