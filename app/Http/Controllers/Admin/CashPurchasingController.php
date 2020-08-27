<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CashMaster;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CashPurchasingController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Company $object)
    {

        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'Admin.cash-purch.';
        $this->routeName = 'cash-purch.';

        $this->message = 'تم حفظ البيانات';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=Company::orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact('rows'));
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
        dd( $request->input('pk'));
    }
public function cc(Request $request){
    $id =$request->input('pk');
    $field = $request->input('name');
    $value =$request->input('value');

        try 
        {
          

            $test = Company::findOrFail($id);
            $test->{$field} = $value;
            $test->update();
        }
        catch (\Exception $e)
        {
            return response($e->intl_get_error_message(), 400);
        }
        return response('',200);
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
