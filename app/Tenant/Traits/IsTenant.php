<?php

namespace App\Tenant\Traits;

use App\Tenant\Models\TenantBase;
use Webpatser\Uuid\Uuid;

trait IsTenant
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($tenant) {
            $tenant->uuid = Uuid::generate(4);
        });
        
        static::created(function ($tenant) {
            $prefix = config('tenant.database_prefix');

            $tenant->database = $prefix . '_' . $tenant->id;

            $tenant->save();
        });
    }
}