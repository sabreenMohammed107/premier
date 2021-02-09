<?php

namespace App\Http\Controllers\Company\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ChequesReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ChequesReport()
    {
        $id = session('company_id');
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $Companies = DB::table('companies')->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101]])->get();
        } else {
            $Companies = Company::where('id','=',$id)->get();
            $Persons = DB::table('persons')->where([['person_type_id','=',101],['company_id','=',$id]])->get();
        }

        return view('Reports.Cheques.create',[
            'Companies' => $Companies,
            'Persons' => $Persons,
        ]);
    }

    public function FetchChequesReport(Request $request)
    {
        $Cheque = DB::table('cheques')
        ->select(DB::raw('bank_name,transaction_date,cheque_no,cheques.trans_type,cheques.amount,cheques.company_id as id,cheques.person_name,cheques.person_id,cheques.notes,person_types.person_type_name,persons.company_id as p_comp_id'));
        if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110) {
            $id = $request->company_id;
            $Cheque->where('cheques.company_id','=',$request->company_id);
        }else{
            $id = session('company_id');
            $Cheque->where('cheques.company_id','=',$id);
        }
        if(!empty($request->cheque_no)){
            $Cheque->where('cheque_no','=',$request->cheque_no);
        }
        if(!empty($request->from_date) && !empty($request->to_date)){
            $from = $request->from_date;
            $to = $request->to_date;
            $Cheque->whereBetween('cash_date', [$from, $to]);
        }
        if(!empty($request->trans_type)){
            $Cheque->where('trans_type','=',$request->trans_type);
        }
        if(!empty($request->person_type_id)){
            $Cheque->where('person_type_id','=',$request->person_type_id);
        }
        if(!empty($request->person_id)){
            $Cheque->where('person_id','=',$request->person_id);
        }
        $Cheques = $Cheque
        ->leftjoin('persons','persons.id','=','cheques.person_id')
        ->leftjoin('person_types','person_types.id','=','persons.person_type_id')
        ->get();
        // $id = session('company_id');
        $Company = Company::find($id);
        $data = [
            'Cheques' => $Cheques,
           
            'Title' =>  \Lang::get('titles.Permission_receive_cash'),
            'Today' => date('Y-m-d'),
            'Logo'  => $Company->company_logo,
            'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        if(app()->getLocale() =='ar'){
            $pdf = PDF::loadView('Reports.Cheques.report', $data);
        }else{
            $pdf = PDF::loadView('Reports.Cheques.reportEn', $data);
        }
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('cash_receipt.pdf');

        // return $Cashes;
        // return view('Company.cashReports.Receipt.report', $data);
    }
}
