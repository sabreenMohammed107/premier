<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bank;
use App\Models\FinanTransaction;
use App\Models\Safe;
use App\Models\Person;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Current Company data
        $Company = Company::find($id);

        //Suppliers Data belongs to the same company
        $Suppliers = DB::table('persons')
        ->where([
            ['person_type_id','=',2],
            ['company_id','=',1]
        ])->get();

        //Employees Data belongs to the same company
        $Employees = DB::table('persons')
        ->where([
            ['person_type_id','=',1],
            ['company_id','=',1]
        ])->get();

        //Clients Data belongs to the same company
        $Clients = DB::table('persons')
        ->where([
            ['person_type_id','=',3],
            ['company_id','=',1]
        ])->get();

        //Company bank
        $Bank = $Company->bank()->first();

        //Company safe
        $Safe = $Company->safe()->first();

        return view('Company.companies.company-profile',[
            'Suppliers' => $Suppliers,
            'Employees'=>$Employees,
            'Clients'=>$Clients,
            'Company'=>$Company,
            'Bank'=>$Bank,
            'Safe'=>$Safe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Company data
        $Company = Company::find($id);

        //Company safe and bank
        $Safe = $Company->safe()->first();
        $Bank = $Company->bank()->first();


        return view('Company.companies.company-edit',[
            'Company'=>$Company,
            'Safe'=>$Safe,
            'Bank'=>$Bank
        ]);
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
        //Company data
        $Company = Company::find($id);
        //Store Company image 
        if($request->hasFile('company_logo')){
            $extension = $request->company_logo->extension();
            $filename = time() . '.' . $extension;
            $request->file('company_logo')->move('companies',$filename);
            // return $filename;
            $Company->company_logo = $filename;
            $Company->save();
        }
        
        //Edit request data
        if ($request->taxable == "on") {
            $request->merge([
                'taxable' => 1,
            ]);
        }else{
            $request->merge([
                'taxable' => 0,
            ]);
        }
        if ($request->active == "on") {
            $request->merge([
                'active' => 1,
            ]);
        }else{
            $request->merge([
                'active' => 0,
            ]);
        }
        $Company->update($request->except('company_logo'));

        return redirect("/Company/$id")->with('status', "بيانات الشركه : $Company->company_official_name تم تعديلها بنجاح");
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

    //same route different functions
    // Add safe
    public function AddSafe(int $id,Request $request)
    {
        
        $Safe = Safe::create($request->all());
        
        $Company = Company::find($id);
        $Company->safe_id = $Safe->id;
        $Company->save();

        return redirect("/Company/$id")->with('status', "تم اضافة خزينه لشركة : $Company->company_official_name بنجاح");
    }

    //Edit safe
    public function EditSafe(int $id,Request $request)
    {
        $Company = Company::find($id);
        $Safe = Safe::find($Company->safe_id);
        $Safe->update($request->all());
        
        return redirect("/Company/$id")->with('status', "تم تعديل بيانات الخزينه لشركة : $Company->company_official_name بنجاح");

    }

}
