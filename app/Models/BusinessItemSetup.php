<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessItemsSetup extends Model
{
    //main settings
    protected $table = 'business_items_setup';
    protected $primaryKey = 'id';
    protected $fillable = [
        'item_name',
        'item_case_id',
        'guided_item_id',
        'item_value',
        'active',
        'notes',
    ];
}
