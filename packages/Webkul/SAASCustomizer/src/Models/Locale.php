<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Webkul\SAASCustomizer\Contracts\Locale as LocaleContract;

class Locale extends Model implements LocaleContract
{
    protected $table = 'super_locales';

    /**
     * LTR Direction
     */
    public const DIRECTION_LTR = 'ltr';

    /**
     * RTL Direction
     */
    public const DIRECTION_RTL = 'rtl';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'direction'
    ];

    /**
     * Get the logo full path of the locale.
     * 
     * @return string|null
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo_url();
    }

    /**
     * Get the logo full path of the locale.
     * 
     * @return string|void
     */
    public function logo_url()
    {
        if (empty($this->logo_path)) {
            return;
        }
        
        return Storage::url($this->logo_path);
    }
}
