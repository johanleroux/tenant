<?php

namespace App\Tenant\Database;

use App\Tenant\Models\TenantBase;
use Illuminate\Support\Facades\DB;

class DatabaseCreator
{
    public function create(TenantBase $tenant)
    {
        $prefix = config('tenant.database_prefix');

        return DB::statement("
            CREATE DATABASE {$prefix}_{$tenant->id}
        ");
    }
}
