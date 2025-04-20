<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory, Multitenantable;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'data' => 'array',
        'anaytics_data' => 'array',
    ];

    protected $fillable = [
        'form_id',
        'data',
        'anaytics_data',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = $model->id ?: (string) \Illuminate\Support\Str::orderedUuid();
        });
    }
}
