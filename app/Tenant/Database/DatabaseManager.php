<?php

namespace App\Tenant\Database;

use App\Tenant\Models\TenantBase;
use Illuminate\Database\DatabaseManager as BaseDatabaseManager;

class DatabaseManager
{
    protected $db;

    public function __construct(BaseDatabaseManager $db)
    {
        $this->db = $db;
    }

    public function createConnection(TenantBase $tenant)
    {
        config()->set('database.connections.tenant', $this->getTenantConnection($tenant));
    }

    public function connectToTenant()
    {
        $this->db->reconnect('tenant');
    }

    public function purge()
    {
        $this->db->purge('tenant');
    }

    public function getDefaultConnectionName()
    {
        return config('database.default');
    }

    protected function getTenantConnection(TenantBase $tenant)
    {
        return array_merge(
            config()->get($this->getConfigConnectionPath()), $tenant->database
        );
    }

    protected function getConfigConnectionPath()
    {
        return sprintf('database.connections.%s', $this->getDefaultConnectionName());
    }
}