<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Models\TenantBase;
use App\Tenant\Traits\IsTenant;

class Tenant extends Model implements TenantBase
{
    use IsTenant;
    
    protected $fillable = [
        'name',
        'uuid'
    ];
}
