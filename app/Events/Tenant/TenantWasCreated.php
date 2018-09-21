<?php

namespace App\Events\Tenant;

use App\Tenant\Models\TenantBase;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TenantWasCreated
{
    use Dispatchable, SerializesModels;

    public $tenant;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TenantBase $tenant)
    {
        $this->tenant = $tenant;
    }
}
