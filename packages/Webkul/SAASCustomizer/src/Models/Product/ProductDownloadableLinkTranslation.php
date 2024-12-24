<?php

namespace Webkul\SAASCustomizer\Models\Product;

use Webkul\Product\Models\ProductDownloadableLinkTranslation as BaseModel;

class ProductDownloadableLinkTranslation extends BaseModel
{
    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new \Illuminate\Database\Eloquent\Builder($query);
    }
}
