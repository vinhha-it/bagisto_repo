<x-saas::layouts>
    {{--Page title --}}
    <x-slot:title>
        @lang('saas::app.super.cms.create.title')
    </x-slot:title>

    {{--Create Page Form --}}
    <x-admin::form
        :action="route('super.cms.store')"
        enctype="multipart/form-data"
    >

        {!! view_render_event('bagisto.super.cms.pages.create.create_form_controls.before') !!}

        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('saas::app.super.cms.create.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                {{-- Back Button --}}
                <a
                    href="{{ route('super.cms.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('admin::app.account.edit.back-btn')
                </a>

                {{--Save Button --}}
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('saas::app.super.cms.create.save-btn')
                </button>
            </div>
        </div>

        {{-- body content --}}
        <div class="mt-4 flex gap-2.5 max-xl:flex-wrap">
            {{-- Left sub-component --}}
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">

                {!! view_render_event('bagisto.super.cms.pages.create.card.description.before') !!}

                {{--Content --}}
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('saas::app.super.cms.create.description')
                    </p>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('saas::app.super.cms.create.content')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="html_content"
                            :value="old('html_content')"
                            id="content"
                            rules="required"
                            :label="trans('saas::app.super.cms.create.content')"
                            :placeholder="trans('saas::app.super.cms.create.content')"
                            :tinymce="true"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="html_content"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>
                </div>

                {!! view_render_event('bagisto.super.cms.pages.create.card.description.after') !!}

                {!! view_render_event('bagisto.super.cms.pages.create.card.seo.before') !!}

                {{-- SEO Input Fields --}}
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('saas::app.super.cms.create.seo')
                    </p>

                    {{-- SEO Title & Description Blade Componnet --}}
                    <x-admin::seo/>

                    <div class="mb-8">
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.cms.create.meta-title')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="meta_title"
                                :value="old('meta_title')"
                                id="meta_title"
                                :label="trans('saas::app.super.cms.create.meta-title')"
                                :placeholder="trans('saas::app.super.cms.create.meta-title')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="meta_title"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.cms.create.url-key')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="url_key"
                                :value="old('url_key')"
                                id="url_key"
                                rules="required"
                                :label="trans('saas::app.super.cms.create.url-key')"
                                :placeholder="trans('saas::app.super.cms.create.url-key')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="url_key"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.cms.create.meta-keywords')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="meta_keywords"
                                :value="old('meta_keywords')"
                                id="meta_keywords"
                                :label="trans('saas::app.super.cms.create.meta-keywords')"
                                :placeholder="trans('saas::app.super.cms.create.meta-keywords')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="meta_keywords"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.cms.create.meta-description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="meta_description"
                                :value="old('meta_description')"
                                id="meta_description"
                                :label="trans('saas::app.super.cms.create.meta-description')"
                                :placeholder="trans('saas::app.super.cms.create.meta-description')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="meta_description"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </div>

                {!! view_render_event('bagisto.super.cms.pages.create.card.seo.after') !!}
            </div>

            {{-- Right sub-component --}}
            <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
                {{-- General --}}

                {!! view_render_event('bagisto.super.cms.pages.create.card.accordion.general.before') !!}

                <x-admin::accordion>
                    <x-slot:header>
                        <div class="flex items-center justify-between">
                            <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                                @lang('saas::app.super.cms.create.general')
                            </p>
                        </div>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="mb-2.5">
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.cms.create.page-title')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="page_title"
                                    :value="old('page_title')"
                                    id="page_title"
                                    rules="required"
                                    :label="trans('saas::app.super.cms.create.page-title')"
                                    :placeholder="trans('saas::app.super.cms.create.page-title')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="page_title"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            {{-- Select Channels --}}
                            <p class="required block font-medium leading-6 text-gray-800 dark:text-white">
                                @lang('saas::app.super.cms.create.channels')
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
                                        :label="trans('saas::app.super.cms.create.channels')"
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

                {!! view_render_event('bagisto.super.cms.pages.create.card.accordion.general.after') !!}

            </div>
        </div>

        {!! view_render_event('bagisto.super.cms.pages.create.create_form_controls.after') !!}

    </x-admin::form>
</x-saas::layouts>
