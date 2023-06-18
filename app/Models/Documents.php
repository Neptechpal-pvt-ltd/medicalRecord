<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    public $fillable = [
        'certificate_no',
        'ip_no',
        'child_name',
        'child_name_dev',
        'father_name',
        'father_name_dev',
        'father_nationality',
        'mother_name',
        'mother_name_dev',
        'mother_nationality',
        'province_id',
        'district_id',
        'municipal_id',
        'ward_no',
        'address',
        'birth_date',
        'birth_date_bs',
        'birth_time',
        'gender',
        'nationality',
        'weight',
        'registered_date',
        'registered_date_bs',
        'approved_by',
        'verified_by',
    ];

    public function fatherNationality(){
        return $this->belongsTo(Countries::class,'father_nationality');
    }

    public function motherNationality(){
        return $this->belongsTo(Countries::class,'mother_nationality');
    }

    public function province(){
        return $this->belongsTo(Provinces::class,'province_id');
    }
    public function district(){
        return $this->belongsTo(Districts::class,'district_id');
    }
    public function municipality(){
        return $this->belongsTo(Municipals::class,'municipal_id');
    }
}
