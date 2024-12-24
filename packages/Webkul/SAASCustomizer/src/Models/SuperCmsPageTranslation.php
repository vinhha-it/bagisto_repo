<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\SAASCustomizer\Contracts\SuperCmsPageTranslation as SuperCmsPageTranslationContract;

class SuperCmsPageTranslation extends Model implements SuperCmsPageTranslationContract
{
    public $timestamps = false;

    protected $fillable = [
        'page_title',
        'url_key',
        'html_content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'locale'
    ];
}
