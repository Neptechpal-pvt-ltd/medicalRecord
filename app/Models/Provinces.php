<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;

    protected $table = 'provinces'; 

    public $fillable = [
        'province_name',
        'province_name_dev',
        'capital_city',
        'governer_name',
        'chief_minister'
    ];
}
