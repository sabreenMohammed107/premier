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

    //relation with company
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function finan_transaction()
    {
        return $this->belongsTo('App\Models\FinanTransaction');
    }
}
