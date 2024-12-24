<?php

namespace Webkul\SAASCustomizer\Repositories\Company;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Webkul\Core\Eloquent\Repository;
use Webkul\SAASCustomizer\Contracts\SuperTheme;

class ThemeRepository extends Repository
{
    /**
     * Specify model class name.
     */
    public function model(): string
    {
        return SuperTheme::class;
    }

    /**
     * Upload images
     *
     * @param  array  $imageOptions
     * @param  \Webkul\Shop\Contracts\ThemeCustomization  $theme
     * @return void
     */
    public function uploadImage($imageOptions, $theme, $deletedSliderImages = [])
    {
        foreach ($deletedSliderImages as $slider) {
            Storage::delete(str_replace('storage/', '', $slider['image']));
        }

        if (isset($imageOptions['options'])) {
            $options = [];

            foreach ($imageOptions['options'] as $image) {

                if (isset($image['service_icon'])) {
                    $options['services'][] = [
                        'service_icon' => $image['service_icon'],
                        'description'  => $image['description'],
                        'title'        => $image['title'],
                    ];

                } elseif ($image['image'] instanceof UploadedFile) {
                    $manager = new ImageManager();

                    $path = 'company-theme/'.$theme->id.'/'.Str::random(40).'.webp';

                    Storage::put($path, $manager->make($image['image'])->encode('webp'));

                    if (
                        isset($imageOptions['type'])
                        && $imageOptions['type'] == 'static_content'
                    ) {
                        return Storage::url($path);
                    }

                    $options['images'][] = [
                        'image' => 'storage/'.$path,
                        'link'  => $image['link'],
                    ];
                } else {
                    $options['images'][] = $image;
                }
            }

            $translatedModel = $theme->translate(core()->getRequestedLocaleCode());

            $translatedModel->options = $options ?? [];

            $translatedModel->save();
        }
    }
}

