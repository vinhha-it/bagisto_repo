<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.settings.themes.index.title')
    </x-slot:title>
   
    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas::app.super.settings.themes.index.title')
        </p>
        
        <div class="flex items-center gap-x-2.5">
            <div class="flex items-center gap-x-2.5">
                {!! view_render_event('bagisto.super.settings.themes.create.before') !!}

                <!-- Create Button -->
                <v-super-create-theme-form>
                    <button
                        type="button"
                        class="primary-button"
                    >
                        @lang('saas::app.super.settings.themes.index.create-btn')
                    </button>  
                </v-super-create-theme-form>

                {!! view_render_event('bagisto.super.settings.themes.create.after') !!}
            </div>
        </div>
    </div>
    
    {!! view_render_event('bagisto.super.settings.themes.list.before') !!}

    <x-saas::datagrid :src="route('super.settings.themes.index')" />

    {!! view_render_event('bagisto.super.settings.themes.list.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-super-create-theme-form-template">
            <div>
                <!-- Theme Create Button -->
                @if (companyBouncer()->hasPermission('settings.themes.create'))
                    <button
                        type="button"
                        class="primary-button"
                        @click="$refs.themeCreateModal.toggle()"
                    >
                        @lang('saas::app.super.settings.themes.index.create-btn')
                    </button>
                @endif

                <!-- Modal Form -->
                <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <form @submit="handleSubmit($event, create)">
                        <!-- Customer Create Modal -->
                        <x-admin::modal ref="themeCreateModal">
                            <!-- Modal Header -->
                            <x-slot:header>
                                <p class="text-lg font-bold text-gray-800 dark:text-white">
                                    @lang('saas::app.super.settings.themes.create.title')
                                </p>
                            </x-slot:header>

                            <!-- Modal Content -->
                            <x-slot:content>
                                <!-- Name -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.settings.themes.create.name')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="name"
                                        rules="required"
                                        :label="trans('saas::app.super.settings.themes.create.name')"
                                        :placeholder="trans('saas::app.super.settings.themes.create.name')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Sort Order -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.settings.themes.create.sort-order')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="sort_order"
                                        rules="required|numeric"
                                        :label="trans('saas::app.super.settings.themes.create.sort-order')"
                                        :placeholder="trans('saas::app.super.settings.themes.create.sort-order')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="sort_order"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Type -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.settings.themes.create.type.title')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="select"
                                        name="type"
                                        rules="required"
                                        value="image_carousel"
                                    >
                                        <option 
                                            v-for="(type, key) in themeTypes"
                                            :value="key"
                                            :text="type"
                                        >
                                        </option>
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="type"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Channels -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.settings.themes.edit.channels')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="select"
                                        name="channel_id"
                                        rules="required"
                                        :value="1"
                                    >
                                        @foreach (company()->getAllChannels() as $channel)
                                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                        @endforeach 
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="type"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </x-slot:content>

                            <!-- Modal Footer -->
                            <x-slot:footer>
                                <div class="flex items-center gap-x-2.5">
                                    <button
                                        type="submit"
                                        class="primary-button"
                                    >
                                        @lang('saas::app.super.settings.themes.create.save-btn')
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-admin::modal>
                    </form>
                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-super-create-theme-form', {
                template: '#v-super-create-theme-form-template',

                data() {
                    return {
                        themeTypes: {
                            image_carousel: "@lang('saas::app.super.settings.themes.create.type.image-carousel')",
                            static_content: "@lang('saas::app.super.settings.themes.create.type.static-content')",
                            footer_links: "@lang('saas::app.super.settings.themes.create.type.footer-links')",
                            services_content: "@lang('saas::app.super.settings.themes.create.type.services-content')",
                        }
                    };
                },

                methods: {
                    create(params, { setErrors }) {
                        this.$axios.post('{{ route('super.settings.themes.store') }}', params)
                            .then((response) => {
                                if (response.data.redirect_url) {
                                    window.location.href = response.data.redirect_url;
                                } 
                            })
                            .catch((error) => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },
                },
            });
        </script>
    @endPushOnce
    
</x-saas::layouts>