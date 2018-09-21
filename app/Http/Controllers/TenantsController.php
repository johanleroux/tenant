<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Events\Tenant\TenantWasCreated;
use Illuminate\Http\Request;

class TenantsController extends Controller
{
    public function create()
    {
        return view('tenants.create');
    }

    public function store()
    {
        $tenant = Tenant::make([
            'name' => request()->name
        ]);

        $tenant = request()->user()->tenants()->save($tenant);
        
        event(new TenantWasCreated($tenant));

        return redirect('/home');
    }

    public function switch(Tenant $tenant)
    {
        // @todo

        return redirect('/');
    }
}
