<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASCustomizer\Contracts\SuperChannelTranslation as SuperChannelTranslationContract;

class SuperChannelTranslation extends Model implements SuperChannelTranslationContract
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'home_seo',
        'locale_id',
    ];

    protected $casts = [
        'home_seo' => 'array',
    ];
}