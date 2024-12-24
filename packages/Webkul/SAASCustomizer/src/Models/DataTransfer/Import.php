<?php

namespace Webkul\SAASCustomizer\Models\DataTransfer;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\DataTransfer\Models\Import as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class Import extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state',
        'process_in_queue',
        'type',
        'action',
        'validation_strategy',
        'validation_strategy',
        'allowed_errors',
        'processed_rows_count',
        'invalid_rows_count',
        'errors_count',
        'errors',
        'field_separator',
        'file_path',
        'images_directory_path',
        'error_file_path',
        'summary',
        'started_at',
        'completed_at',
        'company_id',
    ];

    /**
     * Get the company that owns the customer.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(CompanyProxy::modelClass(), 'company_id');
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        $company = Company::getCurrent();

        if (auth()->guard('super-admin')->check() || ! isset($company->id)) {
            return new \Illuminate\Database\Eloquent\Builder($query);
        } else {
            return new \Illuminate\Database\Eloquent\Builder($query->where('imports'.'.company_id', $company->id));
        }
    }
}
