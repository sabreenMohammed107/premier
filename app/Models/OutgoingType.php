<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutgoingType extends Model
{
    //main settings
    protected $table = 'outgoing_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'outgoing_type_name',
        'system_lockup',
        'notes',
    ];
}
