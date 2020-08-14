<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\UserCompany;
use DB;
use Illuminate\Database\QueryException;

class RegisterUsersController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(User $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'Admin.users.';
        $this->routeName = 'users.';

        $this->message = 'تم حفظ البيانات';
      
        
       
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=User::with('company')->orderBy("created_at", "Desc")->get();
        return view($this->viewName.'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        $companies=Company::all();
        return view($this->viewName.'add', compact('roles','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$company_id=0;
        $data = [
            
            'user_name' => $request->input('user_name'),
            'password' => $request->input('password'),
            'notes' => $request->input('notes'),
            'user_full_name' =>$request->input('user_full_name'),
            'active'=>$request->input('active')


        ];
        if ($request->input('role_id')) {

            $data['role_id'] = $request->input('role_id');
        }
        if ($request->input('company_id')) {

            $company_id = $request->input('company_id');
        }
        DB::transaction(function () use ($data,  $company_id, $request) {

           $user= $this->object::create($data);
            if ($user && $company_id>0) {
              
                    UserCompany::create([
                        'user_id' => $user->id,
                        'company_id' => $company_id,
                    ]);
               
            }
            
            
        });

       
        return redirect()->route($this->routeName .'index')->with('flash_success', $this->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row=User::where('id','=',$id)->first();
        $roles=Role::all();
        $companies=Company::all();
        return view($this->viewName.'view', compact('row','roles','companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row=User::where('id','=',$id)->first();
        $roles=Role::all();
        $companies=Company::all();
        return view($this->viewName.'edit', compact('row','roles','companies'));
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
        $company_id=0;
        $data = [
            
            'user_name' => $request->input('user_name'),
            'password' => $request->input('password'),
            'notes' => $request->input('notes'),
            'user_full_name' =>$request->input('user_full_name'),
            'active'=>$request->input('active')


        ];
        if ($request->input('role_id')) {

            $data['role_id'] = $request->input('role_id');
        }
        if ($request->input('company_id')) {

            $company_id = $request->input('company_id');
        }
        DB::transaction(function () use ($data,$id,  $company_id, $request) {
           
            $this->object::findOrFail($id)->update($data);

        //    $user= $this->object::create($data);
          
           if ($id && $company_id>0) {
            $this->object::findOrFail($id)->company()->sync($company_id);
                    
                  
               
            }
            
            
        });

       
        return redirect()->route($this->routeName .'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $Request,$id)
    {
        
        $company_id= $Request->input('deleteCompany');
        $user=User::find($id);
        try {
            $user->company()->detach($company_id);

            $user->delete();
          
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'لايسمح بحذف هذا المستخدم');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'نم حذف المستخدم بنجاح!');


    }

   
    function fetchCat(Request $request)
    {

        $value = $request->get('value');

        $data = Role::whereNotIn('id',[100,101,1])->get();

        if($value==100){
            $data = Role::whereIn('id',[100,101,1])->get();

        }
    
            $output = '<option value="" selected="" disabled="">الصلاحيات</option>';
            foreach ($data as $row) {

                $output .= '<option value="' . $row->id . '">' . $row->role_name . '</option>';
            }
        
        echo $output;
    }
}
