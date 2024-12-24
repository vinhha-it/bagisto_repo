<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Core\Models\ChannelProxy;
use Webkul\User\Models\AdminProxy;
use Webkul\SAASCustomizer\Contracts\Company as CompanyContract;

class Company extends Model implements CompanyContract
{
    use Notifiable;

    /**
     * Company Details fields.
     *
     * @var array
     */
    public $companyDetailFields = [
        'first_name',
        'last_name',
        'email',
        'skype',
        'phone',
        'more_info',
    ];

    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'username',
        'description',
        'email',
        'logo',
        'domain',
        'more_info',
        'is_active',
        'cname'
    ];

    /**
     * Get the details of the company.
     */
    public function details(): HasOne
    {
        return $this->hasOne(CompanyDetailsProxy::modelClass());
    }

    /**
     * Get the channels of the company.
     */
    public function channels(): HasMany
    {
        return $this->hasMany(ChannelProxy::modelClass());
    }

    /**
     * Get the address of the company.
     */
    public function user(): HasOne
    {
        return $this->hasOne(AdminProxy::modelClass());
    }

    /**
     * Get the addresses of the company.
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(CompanyAddressProxy::modelClass());
    }
}
