<?php

namespace Webkul\SAASCustomizer\Validation;

use Illuminate\Validation\DatabasePresenceVerifier as BaseVerifier;
use Webkul\SAASCustomizer\Facades\Company;

class DatabasePresenceVerifier extends BaseVerifier
{
    /**
     * Get a query builder for the given table.
     *
     * @param  string  $table
     * @return \Illuminate\Database\Query\Builder
     */
    public function table($table)
    {
        $company = Company::getCurrent();

        if (count(explode(' as ', $table)) == 2) {
            $table = explode(' as ', $table);
            $table = trim($table[0]);
        }

        /**
         * Apply the company_id check dynamically here to eliminate unique validation.
         */
        if (isset($company->id) && $table != 'channels') {
            return $this->db->connection($this->connection)->table($table)->useWritePdo()->where ('company_id', '=', $company->id);
        }

        return $this->db->connection($this->connection)->table($table)->useWritePdo();
    }
}