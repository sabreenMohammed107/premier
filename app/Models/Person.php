<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //main settings
    protected $table = 'persons';
    protected $primaryKey = 'id';
    protected $fillable = [
        'person_name',
        'person_nick_name',
        'person_type_id',
        'legal_entity',
        'address',
        'phone1',
        'phone2',
        'fax',
        'contact_person_name',
        'contact_person_mobile',
        'chairman_person_name',
        'email',
        'website',
        'tax_authority',
        'registeration_no',
        'commercial_register',
        'tax_card',
        'open_balance',
        'balance_start_date',
        'company_id',
        'person_logo',
        'taxable',
        'active',
        'notes',
    ];

    //(Company - Person)  Relation
    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id','company_id');
    }

    public function invoices()
    {
        return $this->belongsTo('App\Models\Invoice');
    }

    public function finan_transaction()
    {
        return $this->belongsTo('App\Models\FinanTransaction');
    }
}
