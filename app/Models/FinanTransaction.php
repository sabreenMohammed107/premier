<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinanTransaction extends Model
{
    //main settings
    protected $table = 'finan_transactions';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'transaction_type_id',
        'transaction_date',
        'permission_code',
        'invoice_no',
        'person_id',
        'person_name',
        'person_type_id',
        'safe_id',
        'bank_id',
        'cheque_id',
        'additive',
        'subtractive',
        'notes',
        'purch_sales_statement',
        'cash_id',
        'inv_id',
        'item_id',
        'inv_item_id',
    ];

    public function safe()
    {
        return $this->hasMany('App\Models\Safe', 'safe_id','id');
    }

    public function person()
    {
        return $this->hasMany('App\Models\Person', 'safe_id','id');
    }

    public function item()
    {
        return $this->hasMany('App\Models\Item', 'item_id','id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\FinanTransactionType', 'transaction_type_id');
    }
}
