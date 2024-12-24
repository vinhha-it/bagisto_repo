<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASCustomizer\Contracts\SuperRoles as SuperRolesContract;

class SuperRoles extends Model implements SuperRolesContract
{
    /**
     * All Permission
     */
    public const PERMISSION_ALL = 'all';

    /**
     * Custom Permission
     */
    public const PERMISSION_CUSTOM = 'custom';

    protected $fillable = [
        'name',
        'description',
        'permission_type',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * Get the agents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents()
    {
        return $this->hasMany(AgentProxy::modelClass(), 'role_id');
    }
}
