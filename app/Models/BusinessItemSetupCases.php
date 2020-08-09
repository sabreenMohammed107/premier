<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessItemSetupSases extends Model
{
    //main settings
    protected $table = 'business_items_setup_cases';
    protected $primaryKey = 'id';
    protected $fillable = [
        'item_case_name',
        'notes',
    ];
}
