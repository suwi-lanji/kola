<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory, Multitenantable;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'fields' => 'array',
    ];

    protected $fillable = [
        'tenant_id',
        'title',
        'fields',
        'settings',
        'redirect_url',
        'success_message',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = $model->id ?: (string) \Illuminate\Support\Str::orderedUuid();
        });
    }
}
