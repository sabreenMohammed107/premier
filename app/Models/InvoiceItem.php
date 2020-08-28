<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    //main settings
    protected $table = 'invoice_items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'store_item',
        'item_id',
        'item_text',
        'item_price',
        'item_quantity',
        'total_item_price',
        'item_discount',
        'total_after_discounts',
        'tax_exemption',
        'vat_tax_value',
        'comm_industr_tax',
        'net_value',
        'inv_id',
        'taxt_percentage',
        'notes',
    ];

    //relation with persons
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
