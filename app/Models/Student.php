<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'matric',
        'date_of_birth',
        'gender',
        'phone',
        'address',
        'department',
        'level',
        'year_of_study',
    ];
}
