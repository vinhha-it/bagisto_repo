<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.settings.email.create.title')
    </x-slot:title>

    {{-- Create Email Template --}}
    <v-super-email></v-super-email>

    {!! view_render_event('bagisto.super.settings.email.create.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-super-email-template">
            <div>
                <x-admin::form :action="route('super.settings.email.send')">
                    {!! view_render_event('bagisto.super.settings.email.create.create_form_controls.before') !!}

                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-gray-800 dark:text-white">
                            @lang('saas::app.super.settings.email.create.title')
                        </p>

                        <div class="flex items-center gap-x-2.5">
                            <!-- Cancel Button -->
                            <a
                                href="{{ route('super.tenants.companies.index') }}"
                                class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                            >
                                @lang('saas::app.super.settings.email.create.back-btn')
                            </a>

                            <!-- Save Button -->
                            <button 
                                type="submit" 
                                class="cursor-pointer rounded-md border border-blue-700 bg-blue-600 px-3 py-1.5 font-semibold text-gray-50"
                            >
                                @lang('saas::app.super.settings.email.create.send-btn')
                            </button>
                        </div>
                    </div>

                    <!-- body content -->
                    <div class="mt-4 w-full">

                        {!! view_render_event('bagisto.admin.settings.roles.create.general.before') !!}

                        <x-admin::accordion>
                            <x-slot:header>
                                <div class="flex items-center justify-between p-1.5">
                                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                                        @lang('saas::app.super.settings.email.create.general')
                                    </p>
                                </div>
                            </x-slot:header>
                    
                            <x-slot:content>
                                <div class="mb-2.5">
                                    <x-admin::form.control-group class="mb-2.5">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('saas::app.super.settings.email.create.subject')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="subject"
                                            value="{{ old('subject') }}"
                                            id="subject"
                                            rules="required"
                                            :label="trans('saas::app.super.settings.email.create.subject')"
                                            :placeholder="trans('saas::app.super.settings.email.create.subject')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="subject"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                
                                    <x-admin::form.control-group class="mb-2.5">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('saas::app.super.settings.email.create.body')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="textarea"
                                            name="body"
                                            :value="old('body')"
                                            id="body"
                                            rules="required"
                                            :label="trans('saas::app.super.settings.email.create.body')"
                                            :placeholder="trans('saas::app.super.settings.email.create.body')"
                                            :tinymce="true"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="body"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>
                            </x-slot:content>
                        </x-admin::accordion>

                        {!! view_render_event('bagisto.admin.settings.roles.create.card.accordion.general.after') !!}

                    </div>

                    {!! view_render_event('bagisto.super.settings.email.create.create_form_controls.after') !!}
                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-super-email', {
                template: '#v-super-email-template',

                data() {
                    return {
                        permission_type: 'custom'
                    };
                }
            })
        </script>
    @endPushOnce
</x-saas::layouts>