<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
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
        'promo_code',
        'agent_part',
        'status',
        'unavailable',
        'note'
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->app_id)) {
                $model->app_id = Uuid::uuid4()->toString();
            }
        });
    }
}
