<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'name_dev',
        'nationality',
        'nationality_dev',
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'province_id');
    }
}
