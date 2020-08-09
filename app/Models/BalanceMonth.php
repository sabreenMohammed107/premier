<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceMonth extends Model
{
    //main settings
    protected $table = 'balance_months';
    protected $primaryKey = 'id';
    protected $fillable = [
        'year',
        'month_no',
        'company_id',
        'period_from_date',
        'period_end_date',
        'month_type',
        'period_open_date',
        'period_closed_date',
        'notes',
        'can_change'
    ];
}
