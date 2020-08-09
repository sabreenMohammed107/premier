<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    //main settings
    protected $table = 'user_companies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'company_id',
    ];
}
