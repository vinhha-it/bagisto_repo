@php
    $localeCode = company()->getRequestedSuperAdminLocale()->code;

    $channelTranslation = $channel->translations->where('locale', $localeCode)->first();
    
    $seo = $channelTranslation['home_seo'] ?? $channel->home_seo;

    $company_themes = config('themes.company') ?: [
        'default' => [
            'name'        => 'Default',
            'assets_path' => 'public/vendor/webkul/company',
            'views_path'  => 'resources/company-themes/default/views',

            'vite'        => [
                'hot_file'                 => 'comapny-default-vite.hot',
                'build_directory'          => 'vendor/webkul/saas/build',
                'package_assets_directory' => 'src/Resources/assets',
            ],
        ]
    ];
@endphp

<x-saas::layouts>
    {{-- Page Title --}}
    <x-slot:title>
        @lang('saas::app.super.settings.channels.edit.title')
    </x-slot:title>

    {!! view_render_event('bagisto.super.settings.channels.edit.before') !!}

    {{-- Channeld Edit Form --}}
    <x-admin::form  
        :action="route('super.settings.channels.update', ['id' => $channel->id, 'locale' => $localeCode])"
        enctype="multipart/form-data"
    >
        @method('PUT')

        {!! view_render_event('bagisto.super.settings.channels.edit.edit_form_controls.before') !!}

        <div class="flex items-center justify-between">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('saas::app.super.settings.channels.edit.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <a
                    href="{{ route('super.settings.channels.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('saas::app.super.settings.channels.edit.back-btn')
                </a>

                <button 
                    type="submit" 
                    class="primary-button"
                >
                    @lang('saas::app.super.settings.channels.edit.save-btn')
                </button>
            </div>
        </div>

        {{-- Content --}}
        <div class="mt-4 flex gap-2.5 max-xl:flex-wrap">
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">

                {!! view_render_event('bagisto.super.settings.channels.edit.card.general.before') !!}

                {{-- General Information --}}
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('saas::app.super.settings.channels.edit.general')
                    </p>
                    
                    <div class="mb-2.5">
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.settings.channels.edit.code')
                            </x-admin::form.control-group.label>

                            @php
                                $selectedOption = old('code') ?: $channel->code;
                            @endphp

                            <x-admin::form.control-group.control
                                type="text"
                                name="code"
                                class="cursor-not-allowed"
                                :value="$selectedOption"
                                id="code"
                                rules="required"
                                :disabled="(boolean) $selectedOption"
                                :label="trans('saas::app.super.settings.channels.edit.code')"
                                :placeholder="trans('saas::app.super.settings.channels.edit.code')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.control
                                type="hidden"
                                name="code"
                                :value="$selectedOption"
                                id="code"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="code"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.settings.channels.edit.name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                :name="$localeCode.'[name]'"
                                :value="old('name') ?? $channel->name"
                                :id="$localeCode.'[name]'"
                                rules="required"
                                :label="trans('saas::app.super.settings.channels.edit.name')"
                                :placeholder="trans('saas::app.super.settings.channels.edit.name')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                :control-name="$localeCode.'[name]'"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.settings.channels.edit.description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                :name="$localeCode.'[description]'"
                                :value="old('description') ?? $channel->description"
                                :id="$localeCode.'[description]'"
                                :label="trans('saas::app.super.settings.channels.edit.description')"
                                :placeholder="trans('saas::app.super.settings.channels.edit.description')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                            :control-name="$localeCode.'[description]'"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.settings.channels.edit.hostname')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="hostname"
                                :value="old('hostname') ?? $channel->hostname"
                                id="hostname"
                                :label="trans('saas::app.super.settings.channels.edit.hostname')"
                                :placeholder="trans('saas::app.super.settings.channels.edit.hostname-placeholder')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="hostname"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </div>

                {!! view_render_event('bagisto.super.settings.channels.edit.card.general.after') !!}

                {!! view_render_event('bagisto.super.settings.channels.edit.card.design.before') !!}

                {{-- Logo and Design --}}
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('saas::app.super.settings.channels.edit.design')
                    </p>

                    <div class="mb-2.5">
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.settings.channels.edit.theme')
                            </x-admin::form.control-group.label>

                            @php
                                $selectedOption = old('theme') ?: $channel->theme;
                            @endphp

                            <x-admin::form.control-group.control
                                type="select"
                                name="theme"
                                :value="$selectedOption"
                                id="theme"
                                :label="trans('saas::app.super.settings.channels.edit.theme')"
                            >
                                <!-- Default Option -->
                                <option value="">
                                    @lang('admin::app.settings.channels.create.select-theme')
                                </option>

                                @foreach ($company_themes as $themeCode => $theme)
                                    <option value="{{ $themeCode }}" {{ $selectedOption == $themeCode ? 'selected' : '' }}>
                                        {{ $theme['name'] }}
                                    </option>
                                @endforeach
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="theme"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <div class="flex justify-between">
                            <div class="flex w-[40%] flex-col">
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label>
                                        @lang('saas::app.super.settings.channels.edit.logo')
                                    </x-admin::form.control-group.label>

                                    <x-admin::media.images
                                        name="logo"
                                        :uploaded-images="$channel->logo ? [['id' => 'logo_path', 'url' => $channel->logo_url]] : []"
                                    >
                                    </x-admin::media.images>
                                </x-admin::form.control-group>

                                <p class="text-xs text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.settings.channels.edit.logo-size')
                                </p>
                            </div>

                            <div class="flex w-[40%] flex-col">
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label>
                                        @lang('saas::app.super.settings.channels.edit.favicon')
                                    </x-admin::form.control-group.label>

                                    @php
                                        $faviconImages = $channel->favicon ? [['id' => 'logo_path', 'url' => $channel->favicon_url]] : [];
                                    @endphp

                                    <x-saas::media.images
                                        name="favicon"
                                        :uploaded-images="$channel->favicon ? [['id' => 'logo_path', 'url' => $channel->favicon_url]] : []"
                                    >
                                    </x-saas::media.images>
                                </x-admin::form.control-group>

                                <p class="text-xs text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.settings.channels.edit.favicon-size')
                                </p>
                            </div>
                        </div>
                    </div>    
                </div>

                {!! view_render_event('bagisto.super.settings.channels.edit.card.design.after') !!}

                {!! view_render_event('bagisto.super.settings.channels.edit.card.seo.before') !!}

                {{-- Home Page SEO --}} 
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('saas::app.super.settings.channels.edit.seo')
                    </p>

                    {{-- SEO Title & Description Blade Component --}}
                    <x-admin::seo/>

                    <div class="mb-2.5">
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.settings.channels.edit.seo-title')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                :name="$localeCode.'[seo_title]'"
                                {{--  :value="old([$localeCode]['seo_title']) ?? $seo['meta_title']"  --}}
                                :value="$seo['meta_title']"
                                id="meta_title"
                                rules="required"
                                :label="trans('saas::app.super.settings.channels.edit.seo-title')"
                                :placeholder="trans('saas::app.super.settings.channels.edit.seo-title')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="seo_title"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.settings.channels.edit.seo-keywords')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                :name="$localeCode.'[seo_keywords]'"
                                :value="old($localeCode)['seo_keywords'] ?? $seo['meta_keywords']"
                                id="seo_keywords"
                                :label="trans('saas::app.super.settings.channels.edit.seo-keywords')"
                                :placeholder="trans('saas::app.super.settings.channels.edit.seo-keywords')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="seo_keywords"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.settings.channels.edit.seo-description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                :name="$localeCode.'[seo_description]'"
                                :value="old($localeCode)['seo_description'] ?? $seo['meta_description']"
                                id="meta_description"
                                rules="required"
                                :label="trans('saas::app.super.settings.channels.edit.seo-description')"
                                :placeholder="trans('saas::app.super.settings.channels.edit.seo-description')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="seo_description"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </div>

                {!! view_render_event('bagisto.super.settings.channels.edit.card.seo.after') !!}

            </div>

            {{-- Currencies and Locale --}}
            <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">

                {!! view_render_event('bagisto.super.settings.channels.edit.card.accordion.currencies_and_locales.before') !!}

                <x-admin::accordion>
                    <x-slot:header>
                        <div class="flex items-center justify-between">
                            <p class="p-2.5 text-base font-semibold text-gray-800 dark:text-white">
                                @lang('saas::app.super.settings.channels.edit.currencies-and-locales')
                            </p>
                        </div>
                    </x-slot:header>
            
                    <x-slot:content>
                        <div class="mb-2.5">
                            <p class="required block font-medium leading-6 text-gray-800 dark:text-white">
                                @lang('saas::app.super.settings.channels.edit.locales') 
                            </p>

                            @php $selectedLocalesId = old('locales') ?? $channel->locales->pluck('id')->toArray() @endphp
                            
                            @foreach (company()->getAllLocales() as $locale)
                                <x-admin::form.control-group class="mb-2.5 flex gap-2.5">
                                    <x-admin::form.control-group.control
                                        type="checkbox"
                                        name="locales[]"
                                        :value="$locale->id"
                                        :id="'locales_'.$locale->id" 
                                        :for="'locales_'.$locale->id" 
                                        :checked="in_array($locale->id, $selectedLocalesId)"
                                        rules="required"
                                        :label="trans('saas::app.super.settings.channels.edit.locales')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.label
                                        :for="'locales_'.$locale->id"
                                        class="cursor-pointer !text-sm font-semibold !text-gray-600"
                                    >
                                        <span class="cursor-pointer font-semibold text-gray-600 dark:text-gray-300">
                                            {{ $locale->name }} 
                                        </span>
                                    </x-admin::form.control-group.label>
                                </x-admin::form.control-group>
                            @endforeach

                            <x-admin::form.control-group.error
                                control-name="locales[]" 
                            >
                            </x-admin::form.control-group.error>
                        </div>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.settings.channels.edit.default-locale')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"
                                name="default_locale_id"
                                :value="old('default_locale_id') ?? $channel->default_locale_id"
                                id="default_locale_id"
                                rules="required"
                                :label="trans('saas::app.super.settings.channels.edit.default-locale')"
                            >
                                @foreach (company()->getAllLocales() as $locale)
                                    <option value="{{ $locale->id }}">
                                        {{ $locale->name }}
                                    </option>
                                @endforeach
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="default_locale_id"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <div class="mb-2.5">
                            <p class="required block font-medium leading-6 text-gray-800 dark:text-white">
                                @lang('saas::app.super.settings.channels.edit.currencies')
                            </p>
                        
                            @php $selectedCurrenciesId = old('currencies') ?: $channel->currencies->pluck('id')->toArray() @endphp

                            @foreach (company()->getAllCurrencies() as $currency)
                                <x-admin::form.control-group class="mb-2.5 flex gap-2.5">
                                    <x-admin::form.control-group.control
                                        type="checkbox"
                                        name="currencies[]"
                                        :value="$currency->id" 
                                        :id="'currencies_'.$currency->id"
                                        :for="'currencies_'.$currency->id"
                                        rules="required"
                                        :label="trans('saas::app.super.settings.channels.edit.currencies')"
                                        :checked="in_array($currency->id, $selectedCurrenciesId)"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.label
                                        :for="'currencies_'.$currency->id"
                                        class="cursor-pointer !text-sm font-semibold !text-gray-600"
                                    >
                                        <span class="cursor-pointer font-semibold text-gray-600 dark:text-gray-300">
                                            {{ $currency->name }} 
                                        </span>
                                    </x-admin::form.control-group.label>
                                </x-admin::form.control-group>
                            @endforeach

                            <x-admin::form.control-group.error
                                control-name="currencies[]"
                            >
                            </x-admin::form.control-group.error>
                        </div>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required"> 
                                @lang('saas::app.super.settings.channels.edit.default-currency')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"
                                name="base_currency_id"
                                :value="old('base_currency_id') ?? $channel->base_currency_id"
                                id="base_currency_id"
                                rules="required"
                                :label="trans('saas::app.super.settings.channels.edit.default-currency')"
                            >
                                @foreach (company()->getAllCurrencies() as $currency)
                                    <option value="{{ $currency->id }}">
                                        {{ $currency->name }}
                                    </option>
                                @endforeach
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="base_currency_id"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </x-slot:content>
                </x-admin::accordion>

                {!! view_render_event('bagisto.super.settings.channels.edit.card.accordion.currencies_and_locales.after') !!}

            </div>
        </div>

        {!! view_render_event('bagisto.super.settings.channels.edit.edit_form_controls.after') !!}

    </x-admin::form> 

    {!! view_render_event('bagisto.super.settings.channels.edit.after') !!}

</x-saas::layouts>
