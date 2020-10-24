<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    static public function CheckSafeAndBank()
    {
        $id = session('company_id');
        $Company = Company::find($id);
        if(empty($Company->safe_id) || empty($Company->bank_id)){
            return false;
        }else{
            return true;
        }
    }
}
