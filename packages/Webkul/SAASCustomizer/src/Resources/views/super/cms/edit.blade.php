@php
    $currentLocale = company()->getRequestedSuperAdminLocale();

    $selectedOptionIds = $page->channels->pluck('id')->toArray();
@endphp

<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.cms.edit.title')
    </x-slot:title>

    <x-admin::form
        :action="route('super.cms.update', $page->id)"
        method="PUT"
        enctype="multipart/form-data"
    >

        {!! view_render_event('bagisto.super.cms.pages.edit.create_form_controls.before') !!}

        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('saas::app.super.cms.edit.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <!-- Cancel Button -->
                <a
                    href="{{ route('super.cms.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('saas::app.super.cms.edit.back-btn')
                </a>

                {{-- Preview Button --}}
                @if ($page->translate($currentLocale->code))
                    <a
                        href="{{ route('company.cms.page', $page->translate($currentLocale->code)['url_key']) }}"
                        class="secondary-button"
                        target="_blank"
                    >
                        @lang('saas::app.super.cms.edit.preview-btn')
                    </a>
                @endif

                {{--Save Button --}}
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('saas::app.super.cms.edit.save-btn')
                </button>
            </div>
        </div>

        <div class="items-centermt-7 flex justify-between gap-4 max-md:flex-wrap">
            <div class="flex items-center gap-x-1">
                <!-- Locale Switcher -->
                <x-admin::dropdown :position="company()->getRequestedLocale()->direction == 'rtl' ? 'bottom-right' : 'bottom-left'">
                    <!-- Dropdown Toggler -->
                    <x-slot:toggle>
                        <button
                            type="button"
                            class="transparent-button px-1 py-1.5 hover:bg-gray-200 focus:bg-gray-200 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                        >
                            <span class="icon-language text-2xl"></span>

                            {{ $currentLocale->name }}
                            
                            <input type="hidden" name="locale" value="{{ $currentLocale->code }}"/>

                            <span class="icon-sort-down text-2xl"></span>
                        </button>
                    </x-slot:toggle>

                    <!-- Dropdown Content -->
                    <x-slot:content class="!p-0">
                        @foreach (company()->getAllLocales() as $locale)
                            <a
                                href="?{{ Arr::query(['locale' => $locale->code]) }}"
                                class="flex gap-2.5 px-5 py-2 text-base cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-950 dark:text-white {{ $locale->code == $currentLocale->code ? 'bg-gray-100 dark:bg-gray-950' : ''}}"
                            >
                                {{ $locale->name }}
                            </a>
                        @endforeach
                    </x-slot:content>
                </x-admin::dropdown>
            </div>
        </div>

          {{-- body content --}}
          <div class="mt-4 flex gap-2.5 max-xl:flex-wrap">
            {{-- Left sub-component --}}
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">

                {!! view_render_event('bagisto.super.cms.pages.edit.card.content.before') !!}

                {{--Content --}}
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('saas::app.super.cms.edit.description')
                    </p>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('saas::app.super.cms.edit.content')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="{{ $currentLocale->code }}[html_content]"
                            :value="old($currentLocale->code)['html_content'] ?? ($page->translate($currentLocale->code)['html_content'] ?? '')"
                            id="content"
                            rules="required"
                            :label="trans('saas::app.super.cms.edit.content')"
                            :placeholder="trans('saas::app.super.cms.edit.content')"
                            :tinymce="true"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="{{ $currentLocale->code }}[html_content]"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>
                </div>

                {!! view_render_event('bagisto.super.cms.pages.edit.card.content.after') !!}

                {!! view_render_event('bagisto.super.cms.pages.edit.card.seo.before') !!}

                {{-- SEO Input Fields --}}
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('saas::app.super.cms.edit.seo')
                    </p>

                    {{-- SEO Title & Description Blade Componnet --}}
                    <x-admin::seo/>

                    <div class="mt-8">
                        <x-admin::form.control-group class="mb-8">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.cms.edit.meta-title')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="{{$currentLocale->code}}[meta_title]"
                                :value="old($currentLocale->code)['meta_title'] ?? ($page->translate($currentLocale->code)['meta_title'] ?? '') "
                                id="meta_title"
                                :label="trans('saas::app.super.cms.edit.meta-title')"
                                :placeholder="trans('saas::app.super.cms.edit.meta-title')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="{{$currentLocale->code}}[meta_title]"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.cms.edit.url-key')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="{{$currentLocale->code}}[url_key]"
                                :value="old($currentLocale->code)['url_key'] ?? ($page->translate($currentLocale->code)['url_key'] ?? '')"
                                id="url_key"
                                rules="required"
                                :label="trans('saas::app.super.cms.edit.url-key')"
                                :placeholder="trans('saas::app.super.cms.edit.url-key')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="{{$currentLocale->code}}[url_key]"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.cms.edit.meta-keywords')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="{{$currentLocale->code}}[meta_keywords]"
                                :value="old($currentLocale->code)['meta_keywords'] ?? ($page->translate($currentLocale->code)['meta_keywords'] ?? '')"
                                id="meta_keywords"
                                class="text-gray-600 dark:text-gray-300"
                                :label="trans('saas::app.super.cms.edit.meta-keywords')"
                                :placeholder="trans('saas::app.super.cms.edit.meta-keywords')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="{{$currentLocale->code}}[meta_keywords]"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.cms.edit.meta-description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="{{$currentLocale->code}}[meta_description]"
                                :value="old($currentLocale->code)['meta_description'] ?? ($page->translate($currentLocale->code)['meta_description'] ?? '')"
                                id="meta_description"
                                class="text-gray-600 dark:text-gray-300"
                                :label="trans('saas::app.super.cms.edit.meta-description')"
                                :placeholder="trans('saas::app.super.cms.edit.meta-description')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="{{$currentLocale->code}}[meta_description]"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </div>

                {!! view_render_event('bagisto.super.cms.pages.edit.card.seo.after') !!}

            </div>

            {{-- Right sub-component --}}
            <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
                {{-- General --}}

                {!! view_render_event('bagisto.super.cms.pages.edit.card.accordion.seo.before') !!}

                <x-admin::accordion>
                    <x-slot:header>
                        <div class="flex items-center justify-between">
                            <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                                @lang('admin::app.cms.create.general')
                            </p>
                        </div>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="mb-2.5">
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.cms.edit.page-title')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="{{ $currentLocale->code }}[page_title]"
                                    value="{{ old($currentLocale->code)['page_title'] ?? ($page->translate($currentLocale->code)['page_title'] ?? '') }}"
                                    id="{{ $currentLocale->code }}[page_title]"
                                    rules="required"
                                    :label="trans('saas::app.super.cms.edit.page-title')"
                                    :placeholder="trans('saas::app.super.cms.edit.page-title')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="{{ $currentLocale->code }}[page_title]"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            {{-- Select Channels --}}
                            <p class="required block font-medium leading-6 text-gray-800 dark:text-white">
                                @lang('admin::app.cms.create.channels')
                            </p>

                            @foreach(company()->getAllChannels() as $channel)
                                <x-admin::form.control-group class="!mb-0 flex gap-2.5 p-1.5">
                                    <x-admin::form.control-group.control
                                        type="checkbox"
                                        name="channels[]"
                                        :value="$channel->id"
                                        :id="'channels_'.$channel->id"
                                        :for="'channels_'.$channel->id"
                                        rules="required"
                                        :label="trans('admin::app.cms.create.channels')"
                                        :checked="in_array($channel->id, $selectedOptionIds)"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.label
                                        :for="'channels_'.$channel->id"
                                        class="cursor-pointer !text-sm font-semibold !text-gray-600 dark:!text-gray-300"
                                    >
                                        {{ company()->getChannelName($channel) }}
                                    </x-admin::form.control-group.label>
                                </x-admin::form.control-group>
                            @endforeach
                            
                            <x-admin::form.control-group.error
                                control-name="channels[]"
                            >
                            </x-admin::form.control-group.error>
                        </div>
                    </x-slot:content>
                </x-admin::accordion>

                {!! view_render_event('bagisto.super.cms.pages.edit.card.accordion.seo.after') !!}

            </div>
          </div>

        {!! view_render_event('bagisto.super.cms.pages.edit.create_form_controls.after') !!}

    </x-admin::form>
</x-saas::layouts>
