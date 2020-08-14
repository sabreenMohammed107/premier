<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuidedItem;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class GuideItemController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(GuidedItem $object)
    {

        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'Admin.guid-item.';
        $this->routeName = 'guid-item.';

        $this->message = 'تم حفظ البيانات';
    }
    /**
     * Display a listing of the resource.
     *guid-item
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=GuidedItem::orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewName . 'add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'guided_item_name'=>$request->input('guided_item_name'),
            'guided_item_code'=>$request->input('guided_item_code'),
            'notes'=>$request->input('notes'),
           
                        ];

                        
        $this->object::create($data);
                    
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
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
        $row=GuidedItem::where('id','=',$id)->first();
      
        return view($this->viewName.'edit', compact('row'));
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
        $data=[
            'guided_item_name'=>$request->input('guided_item_name'),
            'guided_item_code'=>$request->input('guided_item_code'),
            'notes'=>$request->input('notes'),
           
                        ];

                        
                        $this->object::findOrFail($id)->update($data);
                    
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = GuidedItem::where('id', '=', $id)->first();
       
        try {
            $row->delete();
          
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'هذا الجدول مرتبط ببيانات أخرى');
        }
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحذف بنجاح !');
    }
}
