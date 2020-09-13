<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    //main settings
    protected $table = 'cheques';
    protected $primaryKey = 'id';
    protected $fillable = [
        'transaction_date',
        'cheque_no',
        'due_date',
        'release_date',
        'person_id',
        'person_name',
        'bank_id',
        'bank_name',
        'trans_type',
        'amount',
        'cheque_image',
        'notes',
        'return_back_cheque',
        'return_back_date',
        'return_back_notes',
        'cheque_serial',
        'company_id',
    ];

    public function person()
    {
        return $this->hasOne('App\Models\Person', 'id','person_id');
    }
}
