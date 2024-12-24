<?php

namespace Webkul\SAASCustomizer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\SAASCustomizer\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Webkul\SAASCustomizer\Contracts\SuperTheme as SuperThemeContract;


class SuperTheme extends TranslatableModel implements SuperThemeContract
{
    use HasFactory;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = [
        'options',
    ];

    /**
     * With the translations given attributes
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * Image carousel precision.
     *
     * @var string
     */
    public const IMAGE_CAROUSEL = 'image_carousel';

    /**
     * Product carousel precision.
     *
     * @var string
     */
    public const PRODUCT_CAROUSEL = 'product_carousel';

    /**
     * Category carousel precision.
     *
     * @var string
     */
    public const CATEGORY_CAROUSEL = 'category_carousel';

    /**
     * Footer links precision.
     *
     * @var string
     */
    public const FOOTER_LINKS = 'footer_links';

    /**
     * Static precision.
     *
     * @var string
     */
    public const STATIC_CONTENT = 'static_content';

    /**
     * Status Active.
     */
    public const STATUS_ACTIVE = 1;

    /**
     * Status Inactive.
     */
    public const STATUS_INACTIVE = 0;

    /**
     * Castable.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Add fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'options',
        'sort_order',
        'status',
    ];
}

