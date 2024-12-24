<?php

namespace Webkul\SAASCustomizer\Observers\Category;

use Illuminate\Support\Facades\Request;
use Webkul\SAASCustomizer\Models\Category\CategoryTranslation;
use Webkul\SAASCustomizer\Facades\Company;

class CategoryTranslationObserver
{
    public function creating(CategoryTranslation $model)
    {
        $company = Company::getCurrent();
        $route_name = Request::route()->getName();
        
        if ($route_name == 'graphql' && bagisto_graphql()->guard('admin-api')->check() && ! auth()->guard('super-admin')->check()) {
            $user = bagisto_graphql()->guard('admin-api')->user();
            
            if ( isset($user->company_id) && ! isset($model->company_id)) {
                $model->company_id = $user->company_id;
            }
        } elseif (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }
}