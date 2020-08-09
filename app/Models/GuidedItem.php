<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuidedItem extends Model
{
    //main settings
    protected $table = 'guided_items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'guided_item_name',
        'guided_item_code',
        'notes',
    ];
}
