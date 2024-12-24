<?php

namespace Webkul\SAASCustomizer\Database\Seeders\Super;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        $defaultLocale = $parameters['default_locale'] ?? config('app.locale');
        $defaultCurrency = $parameters['default_currency'] ?? config('app.currency');

        $locales = $parameters['allowed_locales'] ?? [$defaultLocale];

        $defaultLocale = DB::table('super_locales')
                        ->where('code', $defaultLocale)
                        ->first();
        
        $defaultCurrency = DB::table('super_currencies')
            ->where('code', $defaultCurrency)
            ->first();

        DB::table('super_channels')->delete();

        DB::table('super_channels')->insert([
            [
                'id'                => 1,
                'code'              => 'default',
                'theme'             => 'default',
                'hostname'          => config('app.url'),
                'default_locale_id' => $defaultLocale->id ?? 1,
                'base_currency_id'  => $defaultCurrency->id ?? 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);

        foreach ($locales as $locale) {
            DB::table('super_channel_translations')->insert([
                [
                    'super_channel_id' => 1,
                    'locale'           => $locale,
                    'name'             => trans('installer::app.seeders.core.channels.name', [], $locale),
                    'home_seo'         => json_encode([
                        'meta_title'       => trans('installer::app.seeders.core.channels.meta-title', [], $locale),
                        'meta_description' => trans('installer::app.seeders.core.channels.meta-description', [], $locale),
                        'meta_keywords'    => trans('installer::app.seeders.core.channels.meta-keywords', [], $locale),
                    ]),
                ],
            ]);
        }

        $currencies = DB::table('super_currencies')->get();

        foreach ($currencies as $currency) {
            DB::table('super_channel_currencies')->insert([
                [
                    'super_channel_id'  => 1,
                    'super_currency_id' => $currency->id,
                ],
            ]);
        }

        $locales = DB::table('super_locales')->get();

        foreach ($locales as $locale) {
            DB::table('super_channel_locales')->insert([
                [
                    'super_channel_id' => 1,
                    'super_locale_id'  => $locale->id,
                ],
            ]);
        }
    }
}
