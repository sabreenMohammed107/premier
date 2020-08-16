<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //main settings
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'item_code',
        'item_arabic_name',
        'item_english_name',
        'company_id',
        'balance_start_date',
        'total_open_balance_qty',
        'total_open_balance_cost',
        'open_item_price',
        'notes',
        'item_image',
    ];

    public function finan_transaction()
    {
        return $this->belongsTo('App\Models\FinanTransaction');
    }
}
