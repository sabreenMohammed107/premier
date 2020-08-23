<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //main settings
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $fillable = [
        'invoice_type',
        'inv_date',
        'approved',
        'invoice_no',
        'serial',
        'person_id',
        'person_name',
        'company_id',
        'outgoing_type_id',
        'purchasing_type_id',
        'service_type_id',
        'total_items_price',
        'total_items_discount',
        'total_price_post_discounts',
        'total_vat',
        'total_comm_industr_tax',
        'discount_notice_serial',
        'net_invoice',
        'return_back_invoice',
        'return_back_date',
        'return_back_notes',
        'notes',

    ];
}
