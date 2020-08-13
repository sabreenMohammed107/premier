<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //main settings
    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_official_name',
        'company_nick_name',
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
        'company_logo',
        'equity_capital',
        'bank_id',
        'safe_id',
        'taxable',
        'active',
        'notes',
    ];


    public function safe()
    {
        return $this->belongsTo('App\Models\Safe', 'safe_id');
    }
    public function bank()
    {
        return $this->belongsTo('App\Models\Bank', 'bank_id');
    }
}
