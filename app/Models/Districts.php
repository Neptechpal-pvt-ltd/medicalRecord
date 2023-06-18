<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;

    protected $table = 'districts';
    
    public $fillable = [
        'province_id',
        'district_name',
        'district_name_dev'
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'province_id');
    }
}
