<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchasingType extends Model
{
    //main settings
    protected $table = 'purchasing_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'purchasing_types_name',
        'system_lockup',
        'notes',
    ];
}
