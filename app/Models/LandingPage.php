<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory, Multitenantable;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'content' => 'array',
        'seo_settings' => 'array',
        'published' => 'boolean',
    ];

    protected $fillable = [
        'tenant_id',
        'title',
        'slug',
        'custom_domain',
        'content',
        'seo_settings',
        'is_published',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = $model->id ?: (string) \Illuminate\Support\Str::orderedUuid();
        });
    }
}
