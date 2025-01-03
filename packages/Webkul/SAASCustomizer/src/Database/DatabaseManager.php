<?php

namespace Webkul\SAASCustomizer\Database;

use Illuminate\Database\DatabaseManager as BaseDatabaseManager;
use Webkul\SAASCustomizer\Facades\Company;

/**
* @mixin \Illuminate\Database\Connection
*/
class DatabaseManager extends BaseDatabaseManager
{
    /**
    * Begin a fluent query against a database table.
    *
    * @param string $table
    * @return \Illuminate\Database\Query\Builder
    */
    public function table($table)
    {
        
        try {
            
            $company = Company::getCurrent();

            if (! auth()->guard('super-admin')->check()) {
                if (count(explode(' as ', $table)) == 1) {
                    if (
                        $table == 'companies'
                        || $table == 'country_states'
                        || $table == 'countries'
                    ) {
                        return $this->query()->from($table);
                    } else {
                        if (isset($company->id)) {
                            return $this->query()->from($table)->where($table.'.company_id', $company->id);
                        }

                        return $this->query()->from($table);
                    }
                } else if (count(explode(' as ', $table)) == 2) {
                    $name = explode(' as ', $table);
                    $tempName = trim($name[0]);

                    if (
                        $tempName == 'companies'
                        || $tempName == 'country_states'
                        || $tempName == 'countries'
                    ) {
                        return $this->query()->from($table);
                    }

                    return $this->query()->from($table)->where(trim($name[1]).'.company_id', $company->id);
                } else {
                    throw \Exception('Unusual Entities');
                }
            } else {
                return $this->query()->from($table);
            }
        } catch (\Throwable $th) {
            return $this->query()->from($table);
        }
    }
}
