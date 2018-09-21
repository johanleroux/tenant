<?php

namespace App\Tenant\Traits\Console;

use App\Models\TenantBase;

trait FetchesTenants
{
    public function tenants($ids = null)
    {
        $tenants = TenantBase::query();

        if ($ids) {
            $tenants = $tenants->whereIn('id', $ids);
        }

        return $tenants;
    }
}