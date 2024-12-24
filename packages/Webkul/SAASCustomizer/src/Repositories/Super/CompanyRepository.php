<?php

namespace Webkul\SAASCustomizer\Repositories\Super;

use Webkul\Core\Eloquent\Repository;
use Illuminate\Support\Facades\DB;
use Webkul\SAASCustomizer\Models\Company;

class CompanyRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Company::class;
    }

    /**
     * Update Comapny.
     *
     * @param  int  $id
     * @return \Webkul\SAASCustomizer\Contracts\Company
     */
    public function update(array $data, $id)
    {
        $company = parent::update($data, $id);

        $model = app()->make($this->model());

        $companyDetailData = [];
        foreach ($model->companyDetailFields as $field) {
            if (isset($data[$field])) {
                $companyDetailData[$field] = $data[$field];
            }
        }
        
        if (! empty($companyDetailData)) {
            $company->details->update($companyDetailData);
        }
        
        return $company;
    }

    /**
     * Get Tenant Stats.
     *
     * @param  int  $id
     * @return array
     */
    public function getAggregates($id)
    {
        $data = [];

        $data['products'] = DB::table('products')->where('company_id', '=', $id)->count();
        $data['attributes'] = DB::table('attributes')->where('company_id', '=', $id)->count();
        $data['attribute_families'] = DB::table('attribute_families')->where('company_id', '=', $id)->count();
        $data['customers'] = DB::table('customers')->where('company_id', '=', $id)->count();
        $data['customer_groups'] = DB::table('customer_groups')->where('company_id', '=', $id)->count();
        $data['categories'] = DB::table('categories')->where('company_id', '=', $id)->count();

        return $data;
    }
}