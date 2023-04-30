<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'status',
        'option1',
        'option2',
        'option3',
        'option4',
        'correct',
    ];
}
