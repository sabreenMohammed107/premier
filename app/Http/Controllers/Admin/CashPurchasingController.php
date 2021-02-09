<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CashMaster;
use App\Models\Company;
use App\Models\GuidedItem;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class CashPurchasingController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(CashMaster $object)
    {

        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'Admin.cash-purch.';
        $this->routeName = 'cash-purch.';

        $this->message = \Lang::get('titles.saving_msg');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $exception = $user->company->pluck('id')->toArray();
      
        $companies = Company::whereIn('id', $exception)->where('id', '!=', 100)->get();
        if(Auth::user()->role_id == 110){
            $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        }
        // $companies = Company::where('id', '!=', 100)->orderBy("created_at", "Desc")->get();
        $company_id=0;
        $rows=CashMaster::where('cash_master_type',0)->where('company_id',$company_id)->orderBy("created_at", "Desc")->get();
        $guided_items=GuidedItem::all();
        return view($this->viewName . 'index', compact('rows', 'companies','guided_items'));
    }
    /**
     * Show the form for get all with company.
     *
     * @return \Illuminate\Http\Response
     */
    public function companyFetch(Request $request)
    {
      
        $company_id=$request->input('company_id');
        $guided_items=GuidedItem::all();
        $rows=CashMaster::where('cash_master_type',0)->where('company_id',$company_id)->orderBy("created_at", "Desc")->get();
        // return response()->json([
        //     'count' => count($rows),
        //     'data' => $rows // or whatever
        // ]);
          return view($this->viewName .'indexTable', compact('rows','guided_items'))->render();

    }
    /**
     * Show the form for updateCriterion.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCriterion(Request $request)
    {
        $id=$request->input('id');
        $criterion=$request->input('criterion');
        $company_id=$request->input('company_id');
        $guided_items=GuidedItem::all();
        $row=CashMaster::where('id',$id)->first();
        $row->update(['detailed_criterion' => $criterion]);
        $rows=CashMaster::where('cash_master_type',0)->where('company_id',$company_id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'indexTable', compact('rows','guided_items'));
    }
     /**
     * Show the form for updateGuided.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateGuided(Request $request)
    {
        $id=$request->input('id');
        $guided_item_id=$request->input('guided_item_id');
        $company_id=$request->input('company_id');
        $guided_items=GuidedItem::all();
        $row=CashMaster::where('id',$id)->first();
        $row->update(['guided_item_id' => $guided_item_id]);
        $rows=CashMaster::where('cash_master_type',0)->where('company_id',$company_id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'indexTable', compact('rows','guided_items'));
    }
    /**
     * Show the form for updateConfirmed.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateConfirmed(Request $request)
    {
        $id=$request->input('id');
        $confirmed=$request->input('confirmed');
        $company_id=$request->input('company_id');
        $guided_items=GuidedItem::all();
        $row=CashMaster::where('id',$id)->first();
        $row->update(['confirm' => $confirmed]);
        $rows=CashMaster::where('cash_master_type',0)->where('company_id',$company_id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'indexTable', compact('rows','guided_items'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }
    public function cc(Request $request)
    {
        $id = $request->input('pk');
        $field = $request->input('name');
        $value = $request->input('value');

        try {


            $test = Company::findOrFail($id);
            $test->{$field} = $value;
            $test->update();
        } catch (\Exception $e) {
            // return response($e->intl_get_error_message(), 400);
        }
        return response('', 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        // $input['tax_authority'] =  $request->input('Application_ids');
        // $row=Company::find($id);

        //     $row->update($input);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
