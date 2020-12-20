<?php

namespace App\Exports;

use App\Models\FinanTransaction;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Carbon\Carbon;
class UsersExport implements FromQuery, WithHeadings
{

    use Exportable;
    public function __construct($range)
    {
        $this->start = $range['start'];
        $this->end = $range['end'];
        $this->cashIds = $range['cashIds'];
    }
    public function query()
    {
        $trans = FinanTransaction::query()
        ->select(DB::raw('transaction_date,permission_code,invoice_no,additive ,subtractive,purch_sales_statement'))
        ->whereIn('safe_id',  $this->cashIds);

        if (!empty($this->start)) {
            $trans->where('transaction_date', '>=', Carbon::parse($this->start));
        }
        if (!empty($this->end)) {
            $trans->where('transaction_date', '<=', Carbon::parse($this->end));
        }


        $trans = $trans->orderBy("transaction_date", "asc");
        return $trans;
    }

    public function headings() :array
    {

        return [
          
        "transaction_date",
        "permission_code",
        "invoice_no",
      
        "depit",
        "cedit",
        "notes",
        
   ];
    }
}
