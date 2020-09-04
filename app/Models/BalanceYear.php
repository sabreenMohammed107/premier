<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceYear extends Model
{
    //main settings
    protected $table = 'balance_years';
    protected $primaryKey = 'id';
    protected $fillable = [
        'year',
        'period_from_date',
        'company_id',
        'period_to_date',
        'year_type',
        'period_open_date',
        'period_closed_date',
        'notes',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

}
