<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASCustomizer\Contracts\CompanyAddress as CompanyAddressContract;

class CompanyAddress extends Model implements CompanyAddressContract
{
    protected $table = 'company_addresses';

    protected $fillable = [
        'address1',
        'address2',
        'city',
        'state',
        'zip_code',
        'country',
        'phone',
        'misc'
    ];
}
