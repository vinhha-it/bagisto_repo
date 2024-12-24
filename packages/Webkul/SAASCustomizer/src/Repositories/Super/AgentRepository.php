<?php

namespace Webkul\SAASCustomizer\Repositories\Super;

use Webkul\Core\Eloquent\Repository;

class AgentRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\SAASCustomizer\Contracts\Agent';
    }

    /**
     * Count agents with all access.
     *
     * @return int
     */
    public function countAdminsWithAllAccess(): int
    {
        return $this->getModel()
            ->leftJoin('super_roles', 'super_admins.role_id', '=', 'super_roles.id')
            ->where('super_roles.permission_type', 'all')
            ->get()
            ->count();
    }

    /**
     * Count agents with all access and active status.
     *
     * @return int
     */
    public function countAdminsWithAllAccessAndActiveStatus(): int
    {
        return $this->getModel()
            ->leftJoin('super_roles', 'super_admins.role_id', '=', 'super_roles.id')
            ->where('super_admins.status', 1)
            ->where('super_roles.permission_type', 'all')
            ->get()
            ->count();
    }
}