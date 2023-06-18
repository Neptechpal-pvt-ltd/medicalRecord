<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipals extends Model
{
    use HasFactory;

    protected $table = 'municipals';

    public $fillable = [
        'district_id',
        'municipal_name',
        'municipal_name_dev'
    ];

    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_id');
    }
}
