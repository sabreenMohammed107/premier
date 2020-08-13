<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //main settings
    protected $table = 'banks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bank_name',
        'bank_branch_name',
        'bank_account_no',
        'open_balance',
        'balance_start_date',
        'notes',
    ];
}
