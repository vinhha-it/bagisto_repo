<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\SAASCustomizer\Mail\Super\ResetPasswordNotification;
use Webkul\SAASCustomizer\Contracts\Agent as AgentContract;

class Agent extends Authenticatable implements AgentContract
{
    use HasFactory, Notifiable;

    protected $table = 'super_admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'image',
        'password',
        'api_token',
        'token',
        'status',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'api_token',
        'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * Status Active.
     */
    public const STATUS_ACTIVE = 1;

    /**
     * Status Inactive.
     */
    public const STATUS_INACTIVE = 0;

    /**
     * Get the agent full name.
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    /**
     * Get the role that owns the super admin.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(SuperRolesProxy::modelClass());
    }

    /**
     * Get image url for the super-admin image.
     */
    public function getImageUrlAttribute()
    {
        return $this->image_url();
    }

    /**
     * Get image url for the super-admin image.
     */
    public function image_url()
    {
        if (! $this->image) {
            return;
        }

        return Storage::url($this->image);
    }

    /**
     * Checks if admin has permission to perform certain action.
     *
     * @param  String  $permission
     * @return Boolean
     */
    public function hasPermission($permission, $roles = null)
    {
        if (
            $roles
            && $permission == "tenants.companies.create"
        ) {
            $route = $this->findFirstRoute($this->role->permissions, $roles);

            if ($route) {
                return redirect()->to($route)->send();
            }
        }

        if ($this->role->permission_type == 'custom' && ! $this->role->permissions)
            return false;

        return in_array($permission, $this->role->permissions);
    }

    /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
