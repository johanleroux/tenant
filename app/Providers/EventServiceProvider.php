<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        \App\Events\Tenant\TenantWasCreated::class => [
            \App\Listeners\Tenant\CreateTenantDatabase::class,
        ],
        \App\Events\Tenant\TenantIdentified::class => [
            \App\Listeners\Tenant\RegisterTenant::class,
            \App\Listeners\Tenant\UseTenantFilesystem::class,
        ],
        \App\Events\Tenant\TenantDatabaseCreated::class => [
            \App\Listeners\Tenant\SetUpTenantDatabase::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
