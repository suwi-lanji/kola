<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Multitenantable
{
    public static function bootMultitenantable(): void
    {
        static::creating(function ($model) {
            $model->tenant_id = auth()->user()->tenant_id;
        });

        static::addGlobalScope('tenant_scoping', function (Builder $builder) {
            $builder->where('tenant_id', auth()->user()->id());
        });
    }
}
