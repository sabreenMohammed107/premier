<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //main settings
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'role_name',
        'role_description',
    ];
}
