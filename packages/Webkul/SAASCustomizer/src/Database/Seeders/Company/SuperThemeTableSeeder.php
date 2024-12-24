<?php

namespace Webkul\SAASCustomizer\Database\Seeders\Company;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SuperThemeTableSeeder extends Seeder
{
    /**
     * Base path for the images.
     */
    const BASE_PATH = 'packages/Webkul/Installer/src/Resources/assets/images/seeders/theme/';

    /**
     * Seed the application's database.
     *
     * @param  array  $parameters
     * @return void
     */
    public function run($parameters = [])
    {
        DB::table('super_themes')->delete();

        DB::table('super_theme_translations')->delete();

        $now = Carbon::now();

        $defaultLocale = $parameters['default_locale'] ?? config('app.locale');

        DB::table('super_themes')
            ->insert([
                [
                    'id'         => 1,
                    'type'       => 'image_carousel',
                    'name'       => trans('Image Slider', [], $defaultLocale),
                    'sort_order' => 1,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 2,
                    'type'       => 'services_content',
                    'name'       => trans('Features', [], $defaultLocale),
                    'sort_order' => 12,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 3,
                    'type'       => 'static_content',
                    'name'       => trans('Easy Customization', [], $defaultLocale),
                    'sort_order' => 3,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 4,
                    'type'       => 'static_content',
                    'name'       => trans('Manage Store', [], $defaultLocale),
                    'sort_order' => 4,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 5,
                    'type'       => 'static_content',
                    'name'       => trans('Benefit Of Selling', [], $defaultLocale),
                    'sort_order' => 5,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 6,
                    'type'       => 'static_content',
                    'name'       => trans('Registration Steps', [], $defaultLocale),
                    'sort_order' => 6,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'id'         => 7,
                    'type'       => 'footer_links',
                    'name'       => trans('Footer Links', [], $defaultLocale),
                    'sort_order' => 7,
                    'status'     => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]);

        $locales = $parameters['allowed_locales'] ?? [$defaultLocale];

        foreach ($locales as $locale) {
            DB::table('super_theme_translations')
                ->insert([
                    /**
                     * Customizations for current locale
                     */
                    [
                        'super_theme_id' => 1,
                        'locale'         => $locale,
                        'options'        => json_encode([
                            'images' => [
                                [
                                    'link'  => '/company/register',
                                    'image' => 'storage/company-theme/1/1.webp',
                                ],
                            ],
                        ]),
                    ], [
                        'super_theme_id' => 2,
                        'locale'         => $locale,
                        'options'        => json_encode([
                            'services' => [
                                [
                                    'title'        => 'Multi-Tenant SaaS',
                                    'description'  => 'Serve multiple customers or tenants with isolated settings.',
                                    'service_icon' => 'icon-truck',
                                ],  [
                                    'title'        => 'Huge Buyers',
                                    'description'  => 'Your go-to marketplace for bulk purchasing.',
                                    'service_icon' => 'icon-support',
                                ],  [
                                    'title'        => 'Secure Payments',
                                    'description'  => 'Safeguarding from potential fraud or data breaches.',
                                    'service_icon' => 'icon-dollar-sign',
                                ],  [
                                    'title'        => 'Global Expansion',
                                    'description'  => 'Enter global markets to achieve business growth.',
                                    'service_icon' => 'icon-product',
                                ],
                            ],
                        ]),
                    ], [
                        'super_theme_id' => 3,
                        'locale'         => $locale,
                        'options'        => json_encode([
                            'html' => '<div class="container section-gap max-lg:px-8"><div class="inline-col-wrapper direction-rtl"><div class="inline-col-image-wrapper"><img src="" data-src="'. config('app.url').'/storage/company-theme/3/3.webp" class="lazy" width="632" height="510" alt="Easy Customization"></div><div class="inline-col-content-wrapper direction-ltr"><h2 class="inline-col-title"> Easy Customization </h2><p class="inline-col-description">It allows each tenant to tailor their experience to meet their unique needs and business requirements with ease, ensuring a tailored and efficient experience for all.</p></div></div></div>',
                            'css'  => '.section-gap {margin-top:80px}.direction-ltr {direction:ltr}.direction-rtl {direction:rtl}.inline-col-wrapper {display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center;}.inline-col-wrapper .inline-col-image-wrapper {overflow:hidden;}.inline-col-wrapper .inline-col-image-wrapper img {max-width:100%;height:auto;border-radius:16px;text-indent:-9999px;}.inline-col-wrapper .inline-col-content-wrapper {display:flex;flex-wrap:wrap;gap:20px;max-width:464px;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title {max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description {margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins;}@media (max-width:991px) {.inline-col-wrapper {grid-template-columns:1fr;grid-gap:16px;}.inline-col-wrapper .inline-col-content-wrapper {gap:10px;}}@media (max-width:525px) {.inline-col-wrapper .inline-col-content-wrapper .inline-col-title {font-size:30px;line-height:normal;}}'
                        ]),
                    ], [
                        'super_theme_id' => 4,
                        'locale'         => $locale,
                        'options'        => json_encode([
                            'html' => '<div class="container section-gap max-lg:px-8"><div class="inline-col-wrapper"><div class="inline-col-image-wrapper"><img src="" data-src="'. config('app.url').'/storage/company-theme/4/4.webp" class="lazy" width="632" height="510" alt="Get Ready for our new Bold Collections!"></div><div class="inline-col-content-wrapper"><h2 class="inline-col-title"> Manage Store with Ease </h2><p class="inline-col-description">The Merchant manage their own store using their own dedicated admin dashboard. Every merchant will also receive the mail whenever a customer will order from his store.</p></div></div></div>',
                            'css'  => '.section-gap {margin-top:80px;}.direction-ltr {direction:ltr;}.direction-rtl {direction:rtl;}.inline-col-wrapper {display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center;}.inline-col-wrapper .inline-col-image-wrapper {overflow:hidden;}.inline-col-wrapper .inline-col-image-wrapper img {max-width:100%;height:auto;border-radius:16px;text-indent:-9999px;}.inline-col-wrapper .inline-col-content-wrapper {display:flex;flex-wrap:wrap;gap:20px;max-width:464px;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title {max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description {margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins;}@media (max-width:991px) {.inline-col-wrapper {grid-template-columns:1fr;grid-gap:16px;}.inline-col-wrapper .inline-col-content-wrapper {gap:10px;}}@media (max-width:525px) {.inline-col-wrapper .inline-col-content-wrapper .inline-col-title {font-size:30px;line-height:normal;}}'
                        ]),
                    ], [
                        'super_theme_id' => 5,
                        'locale'         => $locale,
                        'options'        => json_encode([
                            'html' => '<div class="container section-gap max-lg:px-8"><div class="inline-col-wrapper direction-rtl"><div class="inline-col-image-wrapper"><img src="" data-src="'. config('app.url').'/storage/company-theme/5/5.webp" class="lazy" width="632" height="510" alt="Benefits of selling with us"></div><div class="flex flex-col justify-center direction-ltr"><div class="inline-col-content-wrapper direction-ltr"><h2 class="inline-col-title"> Benefits of selling with us </h2></div><div class="inline-col-content-wrapper inline-col-sub-content direction-ltr"><div class="icon">V</div><h2 class="inline-col-sub-title"> Support all Product Types </h2><p class="inline-col-description">Supported all product types of Bagisto Framework including Simple, Downloadable, Grouped, Bundle, Configurable, Virtual, and Booking.</p></div><div class="inline-col-content-wrapper inline-col-sub-content direction-ltr"><div class="icon">S</div><h2 class="inline-col-sub-title"> Flexibility and Scalability </h2><p class="inline-col-description">Manage multiple businesses with custom domains or self-provided domains. Multiple eCommerce merchants can access at a time</p></div></div></div></div>',
                            'css'  => '.section-gap {margin-top:80px;}.direction-ltr {direction:ltr;}.direction-rtl {direction:rtl;}.inline-col-wrapper {display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center;}.inline-col-wrapper .inline-col-image-wrapper {overflow:hidden;}.inline-col-wrapper .inline-col-image-wrapper img {max-width:100%;width:671px;height:666px;border-radius:16px;text-indent:-9999px;}.inline-col-wrapper .flex {gap: 24px;}.inline-col-wrapper .inline-col-content-wrapper {display:flex;flex-wrap:wrap;gap:20px;max-width:464px;text-align: left;}.inline-col-wrapper .inline-col-sub-content {padding: 20px;border: 1px solid #E9E9E9;justify-content: left;text-align: left;}.inline-col-wrapper .inline-col-sub-content .icon {width: 64px;height: 64px;font-size: 22px;background: #E8EDFE;border-radius: 100px;display: flex;align-items: center;flex-direction: row-reverse;justify-content: center;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-sub-title {max-width:442px;width:100%;font-size: 22px;font-weight:500;color:#000;line-height:33px;font-family:DM Serif Display;margin:0;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description {margin:0;font-size: 18px;font-weight: 400;line-height: 30px color:#7D7D7D;font-family:Poppins;}@media (max-width:991px) {.inline-col-wrapper {grid-template-columns:1fr;grid-gap:16px;}.inline-col-wrapper .inline-col-content-wrapper {gap:10px;}}@media (max-width:525px) {.inline-col-wrapper .inline-col-content-wrapper .inline-col-title {font-size:30px;line-height:normal;}}'
                        ]),
                    ], [
                        'super_theme_id' => 6,
                        'locale'         => $locale,
                        'options'        => json_encode([
                            'html' => '<div class="container section-gap max-lg:px-8"><div class="flex flex-col mb-5 justify-center"><div class="inline-col-content-wrapper"><h2 class="inline-col-title"> Steps to Register as a Tenant </h2><p class="inline-col-description">Become a tenant and create your own store hassle free.</p></div></div><div class="flex max-lg:flex-wrap max-sm:flex-col gap-5 py-10 justify-center"><div class="flex-1 flex-col items-left gap-5"><span class="icon-cart icon-cart flex items-center justify-center w-20 h-20 bg-lightOrange rounded-full p-5 text-4xl text-black"></span><div class=""><p class="text-base font-normal mt-2.5 text-[#7D7D7D] leading-[30px] max-w-[420px]">Step 1</p><p class="text-xl font-normal text-black leading-[26px] font-dmserif">Authentication Credentials</p><p class="text-base font-normal mt-2.5 text-[#7D7D7D] leading-[22px] max-w-[420px]">Enter Authentication credentials like email, password.</p></div></div><div class="flex-1 flex-col items-left gap-5"> <span class="icon-users flex items-center w-20 h-20 bg-lightOrange p-5 justify-center rounded-full text-4xl text-black"></span><div class=""><p class="text-base font-normal mt-2.5 text-[#7D7D7D] leading-[30px] max-w-[420px]">Step 2</p><p class="text-xl font-normal text-black leading-[26px] font-dmserif">Personal Details</p><p class="text-base font-normal mt-2.5 text-[#7D7D7D] leading-[22px] max-w-[420px]">Enter Personal Details like first name, last name and phone number.</p></div></div><div class="flex-1 flex-col items-left gap-5"> <span class="icon-orders flex items-center rounded-full w-20 h-20 p-5 justify-center bg-lightOrange text-4xl text-black"></span><div class=""><p class="text-base font-normal mt-2.5 text-[#7D7D7D] leading-[30px] max-w-[420px]">Step 3</p><p class="text-xl font-normal text-black leading-[26px] font-dmserif">Organization Details</p><p class="text-base font-normal mt-2.5 text-[#7D7D7D] leading-[22px] max-w-[420px]">Enter Organisation Details like user name and organisation name</p></div></div></div><div class="flex my-5 justify-center align-center"> <a href="/company/register" class="primary-button px-10 py-2.5">Register as Tenant</a></div></div>',
                            'css'  => '.section-gap {margin-top:80px;}.inline-col-content-wrapper {display:flex;flex-wrap:wrap;gap: 0;max-width:100%;text-align: center;justify-content: center;}.inline-col-content-wrapper .inline-col-title {width:100%;font-size:60px;font-weight:400;color: #060C3B;line-height:82.26px;font-family:DM Serif Display;margin:0;}.inline-col-content-wrapper .inline-col-description {margin:0;font-size:20px;line-height: 30px;color:#7D7D7D;font-family:Poppins;}@media not all and (min-width: 525px) {.inline-col-content-wrapper .inline-col-title {font-size: 30px;line-height: 41.13px;}}@media (max-width: 640px) {.inline-col-content-wrapper .inline-col-title {font-size: 30px;line-height: 41.13px;}}'
                        ]),
                    ], [
                        'super_theme_id' => 7,
                        'locale'         => $locale,
                        'options'        => json_encode([
                            "column_1" => [
                                [
                                    "url"        => config('app.url')."/company/page/about-us",
                                    "title"      => "About Us",
                                    "sort_order" => 1,
                                ], [
                                    "url"        => config('app.url')."/company/page/return-policy",
                                    "title"      => "Return Policy",
                                    "sort_order" => 2,
                                ], [
                                    "url"        => config('app.url')."/company/page/refund-policy",
                                    "title"      => "Refund Policy",
                                    "sort_order" => 3,
                                ], [
                                    "url"        => config('app.url')."/company/page/terms-conditions",
                                    "title"      => "Terms & Conditions",
                                    "sort_order" => 4,
                                ], [
                                    "url"        => config('app.url')."/company/page/terms-of-use",
                                    "title"      => "Terms of Use",
                                    "sort_order" => 5,
                                ], [
                                    "url"        => config('app.url')."/company/page/contact-us",
                                    "title"      => "Contact Us",
                                    "sort_order" => 6,
                                ],
                            ],
                            "column_2" => [
                                [
                                    "url"        => config('app.url')."/company/page/customer-service",
                                    "title"      => "Customer Service",
                                    "sort_order" => 1,
                                ], [
                                    "url"        => config('app.url')."/company/page/whats-new",
                                    "title"      => "What's New",
                                    "sort_order" => 2,
                                ], [
                                    "url"        => config('app.url')."/company/page/payment-policy",
                                    "title"      => "Payment Policy",
                                    "sort_order" => 3,
                                ], [
                                    "url"        => config('app.url')."/company/page/shipping-policy",
                                    "title"      => "Shipping Policy",
                                    "sort_order" => 4,
                                ], [
                                    "url"        => config('app.url')."/company/page/privacy-policy",
                                    "title"      => "Privacy Policy",
                                    "sort_order" => 5,
                                ],
                            ],
                        ]),
                    ],
                ]);
        }
    }

    /**
     * Store image in storage.
     *
     * @return void
     */
    public function storeFileIfExists($targetPath, $file, $default = null)
    {
        if (file_exists(base_path(self::BASE_PATH.$file))) {
            return 'storage/'.Storage::putFile($targetPath, new File(base_path(self::BASE_PATH.$file)));
        }

        if (! $default) {
            return;
        }

        if (file_exists(base_path(self::BASE_PATH.$default))) {
            return 'storage/'.Storage::putFile($targetPath, new File(base_path(self::BASE_PATH.$default)));
        }

    }
}
