<?php

namespace Webkul\Marketplace\Models;

use Illuminate\Support\Facades\Storage;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Marketplace\Contracts\MpProductDownloadableSample as ProductDownloadableSampleContract;

class MpProductDownloadableSample extends TranslatableModel implements ProductDownloadableSampleContract
{
    public $translatedAttributes = ['title'];

    protected $table = 'mp_product_downloadable_samples';

    protected $fillable = [
        'url',
        'file',
        'file_name',
        'type',
        'sort_order',
        'product_id',
    ];

    protected $with = ['translations'];

    /**
     * Get the product that owns the image.
     */
    public function product()
    {
        return $this->belongsTo(ProductProxy::modelClass());
    }

    /**
     * Get image url for the file.
     */
    public function file_url()
    {
        return Storage::url($this->path);
    }

    /**
     * Get image url for the file.
     */
    public function getFileUrlAttribute()
    {
        return $this->file_url();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();

        $translation = $this->translate(core()->getRequestedLocaleCode());

        $array['title'] = $translation ? $translation->title : '';

        $array['file_url'] = $this->file ? Storage::url($this->file) : null;

        return $array;
    }
}
