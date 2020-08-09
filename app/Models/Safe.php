<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Safe extends Model
{
    //main settings
    protected $table = 'safes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'safe_name',
        'safe_location',
        'open_balance',
        'balance_start_date',
        'notes',
    ];
}
