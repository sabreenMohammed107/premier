<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    //main settings
    protected $table = 'services_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'service_type',
        'system_lockup',
        'notes',
    ];
}
