<?php

namespace Webkul\SAASCustomizer\Database\Seeders\Super;

use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LocalesTableSeeder extends Seeder
{
    /**
     * Base path for the images.
     */
    const BASE_PATH = 'packages/Webkul/Installer/src/Resources/assets/images/seeders/locales/';

    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        DB::table('super_channels')->delete();

        DB::table('super_locales')->delete();

        $defaultLocale = $parameters['default_locale'] ?? config('app.locale');

        $locales = $parameters['allowed_locales'] ?? [$defaultLocale];

        foreach ($locales as $key => $locale) {
            $logoPath = null;

            if (file_exists(base_path(self::BASE_PATH.$locale.'.png'))) {
                $logoPath = Storage::putFileAs('super-locales', new File(base_path(self::BASE_PATH.$locale.'.png')), $locale.'.png');
            }

            DB::table('super_locales')->insert([
                [
                    'id'        => $key + 1,
                    'code'      => $locale,
                    'name'      => trans('installer::app.seeders.core.locales.'.$locale, [], $defaultLocale),
                    'direction' => in_array($locale, ['ar', 'fa', 'he']) ? 'RTL' : 'LTR',
                    'logo_path' => $logoPath,
                ],
            ]);
        }
    }
}
