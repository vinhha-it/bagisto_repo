<?php

namespace Webkul\SAASCustomizer\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Webkul\Customer\Models\Customer as BaseModel;
use Webkul\SAASCustomizer\Models\CompanyProxy;
use Webkul\SAASCustomizer\Facades\Company;

class Customer extends BaseModel
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'email',
        'phone',
        'password',
        'api_token',
        'token',
        'customer_group_id',
        'subscribed_to_news_letter',
        'status',
        'is_verified',
        'is_suspended',
        'notes',
        'company_id',
    ];

    /**
     * Status Active.
     */
    public const STATUS_ACTIVE = 1;

    /**
     * Status Inactive.
     */
    public const STATUS_INACTIVE = 0;

    /**
     * Suspended Yes.
     */
    public const SUSPENDED_YES = 1;

    /**
     * Suspended No.
     */
    public const SUSPENDED_NO = 0;

    protected $hidden = ['password', 'api_token', 'remember_token'];

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
            return new \Illuminate\Database\Eloquent\Builder($query->where('customers'.'.company_id', $company->id));
        }
    }
}
