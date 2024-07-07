<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class MyTalent extends Model
{
    use HasFactory;

    protected $table = 'mytalent';

    protected $fillable = [
        'app_id',
        'names',
        'email',
        'phone',
        'birthdate',
        'district',
        'talent_class',
        'talent_category',
        'other',
        'location',
        'group_app_sheet',
        'category_desc',
        'receipt',
        'promo_code',
        'agent_part',
        'status'
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
