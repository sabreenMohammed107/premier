<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonType extends Model
{
    //main settings
    protected $table = 'person_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'person_type_name',
        'notes',
    ];

    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }
}
