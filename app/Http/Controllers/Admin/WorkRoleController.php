<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessItemSetupCases;
use Illuminate\Http\Request;
use App\Models\BusinessItemsSetup;
use App\Models\GuidedItem;
use Illuminate\Support\Facades\Auth;

class WorkRoleController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(BusinessItemsSetup $object)
    {

        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'Admin.work-role.';
        $this->routeName = 'work-role.';

        $this->message =  \Lang::get('titles.saving_msg');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = BusinessItemSetupCases::all();
        $items = GuidedItem::all();
        $rows = BusinessItemsSetup::orderBy("created_at", "Desc")->get();
        $key = 0;
        return view($this->viewName . 'index', compact('rows', 'cases', 'items', 'key'));
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
        //
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


    public function saveCase1(Request $request)
    {
        $data1 = [
            'item_value' => $request->input('value_1'),
            'notes' => $request->input('note_1'),

        ];
        $data2 = [
            'item_value' => $request->input('vlaue_2'),
            'notes' => $request->input('note_2'),

        ];
        $data3 = [
            'item_value' => $request->input('vlaue_3'),
            'notes' => $request->input('note_3'),

        ];

        $this->object::where('id', 100)->first()->update($data2);
        $this->object::where('id', 101)->first()->update($data1);
        $this->object::where('id', 102)->first()->update($data3);

        return redirect()->route($this->routeName . 'index')->with(['flash_success' => $this->message, 'xx' =>'ok']);
    }

    public function saveCase2(Request $request)
    {
        $data4 = [
            'guided_item_id' => $request->input('case4_item'),
            'notes' => $request->input('case4_note'),

        ];
        $data5 = [
            'guided_item_id' => $request->input('case5_item'),
            'notes' => $request->input('case5_note'),

        ];
        $data6 = [
            'guided_item_id' => $request->input('case6_item'),
            'notes' => $request->input('case6_note'),

        ];
        $data7 = [
            'guided_item_id' => $request->input('case7_item'),
            'notes' => $request->input('case7_note'),

        ];

        $this->object::where('id', 103)->first()->update($data4);
        $this->object::where('id', 104)->first()->update($data5);
        $this->object::where('id', 105)->first()->update($data6);
        $this->object::where('id', 106)->first()->update($data7);
        $key = 1;
        return redirect()->back()->with('key' , $key);
    }

    public function saveCase3(Request $request)
    {
        $data7 = [
            'guided_item_id' => $request->input('case8_item'),
            'notes' => $request->input('case8_note'),

        ];
        $data8 = [
            'guided_item_id' => $request->input('case9_item'),
            'notes' => $request->input('case9_note'),

        ];
        $data9 = [
            'guided_item_id' => $request->input('case10_item'),
            'notes' => $request->input('case10_note'),

        ];
        $data10 = [
            'guided_item_id' => $request->input('case11_item'),
            'notes' => $request->input('case11_note'),

        ];

        $this->object::where('id', 107)->first()->update($data7);
        $this->object::where('id', 108)->first()->update($data8);
        $this->object::where('id', 109)->first()->update($data9);
        $this->object::where('id', 110)->first()->update($data10);

        $key = 1;
        return redirect()->back()->with('key' , $key);
    }
    public function saveCase4(Request $request)
    {
        $data7 = [
            'guided_item_id' => $request->input('case12_item'),
            'notes' => $request->input('case12_note'),

        ];
        $data8 = [
            'guided_item_id' => $request->input('case13_item'),
            'notes' => $request->input('case13_note'),

        ];
        $data9 = [
            'guided_item_id' => $request->input('case14_item'),
            'notes' => $request->input('case14_note'),

        ];

        $this->object::where('id', 111)->first()->update($data7);
        $this->object::where('id', 112)->first()->update($data8);
        $this->object::where('id', 113)->first()->update($data9);

        $key = 1;
        return redirect()->back()->with('key' , $key);
    }
}
