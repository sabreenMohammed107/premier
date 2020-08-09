<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinanTransactionType extends Model
{
    //main settings
    protected $table = 'finan_transactions_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'transaction_type',
        'system_lockup',
        'notes',
    ];
}
