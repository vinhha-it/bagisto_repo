<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\SAASCustomizer\Contracts\SuperCmsPage as SuperCmsPageContract;

class SuperCmsPage extends TranslatableModel implements SuperCmsPageContract
{
    protected $fillable = ['layout'];

    public $translatedAttributes = [
        'content',
        'meta_description',
        'meta_title',
        'page_title',
        'meta_keywords',
        'html_content',
        'url_key',
    ];

    protected $with = ['translations'];

    /**
     * Get the channels.
     */
    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(SuperChannelProxy::modelClass(),  'super_cms_page_channels', 'super_cms_page_id', 'super_channel_id');
    }
}
