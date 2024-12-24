<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASCustomizer\Contracts\CompanyDetails as CompanyDetailsContract;

class CompanyDetails extends Model implements CompanyDetailsContract
{
    protected $table = 'company_personal_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'skype',
        'extra_info',
        'company_id',
        'phone',
        'channel_id'
    ];

    /**
     * Get the Tenant full name.
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }
}
