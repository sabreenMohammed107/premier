<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashMaster extends Model
{
    //main settings
    protected $table = 'cash_master';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cash_master_type',
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
    
    public function guided()
    {
        return $this->belongsTo('App\Models\GuidedItem','guided_item_id');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\ServiceType','service_type_id');
    }
    
}
