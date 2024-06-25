<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'email',
        'phone',
        'course',
        'edu_level',
        'app_letter',
        'certificate',
        'first_time',
        'place',
        'receipt',
    ];
}
