<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashMaster extends Model
{
    //main settings
    protected $table = 'cash_master';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cash_date',
        'approved',
        'exit_permission_code',
        'statement',
        'person_name',
        'fund_source',
        'person_id',
        'company_id',
        'outgoing_type_id',
        'purchasing_type_id',
        'service_type_id',
        'guided_item_id',
        'cash_amount',
        'cash_receipt_note',
        'comm_industr_prof_tax',
        'vat_value',
        'net_value',
        'detailed_criterion',
        'confirm',
        'notes',
    ];
}
