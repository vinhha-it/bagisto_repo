<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.settings.roles.create.title')
    </x-slot:title>
    
    {!! view_render_event('bagisto.super.settings.roles.create.before') !!}

    {{-- Create Role for Agent --}}
    <v-create-agent-role></v-create-agent-role>

    {!! view_render_event('bagisto.super.settings.roles.create.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-create-agent-role-template">
            <div>
                <x-admin::form :action="route('super.settings.roles.create')">

                    {!! view_render_event('bagisto.super.settings.roles.create.create_form_controls.before') !!}

                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-gray-800 dark:text-white">
                            @lang('saas::app.super.settings.roles.create.title')
                        </p>

                        <div class="flex items-center gap-x-2.5">
                            <!-- Cancel Button -->
                            <a
                                href="{{ route('admin.settings.roles.index') }}"
                                class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                            >
                                @lang('saas::app.super.settings.roles.create.back-btn')
                            </a>

                            <!-- Save Button -->
                            <button 
                                type="submit" 
                                class="cursor-pointer rounded-md border border-blue-700 bg-blue-600 px-3 py-1.5 font-semibold text-gray-50"
                            >
                                @lang('saas::app.super.settings.roles.create.save-btn')
                            </button>
                        </div>
                    </div>

                    <!-- body content -->
                    <div class="mt-4 flex gap-2.5 max-xl:flex-wrap">
                        <!-- Left sub-component -->
                        <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">

                            {!! view_render_event('bagisto.super.settings.roles.create.access_control.before') !!}

                            <!-- Access Control Input Fields -->
                            <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                                <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                                    @lang('saas::app.super.settings.roles.create.access-control')
                                </p>

                                <div class="mb-2.5">
                                    <x-admin::form.control-group class="mb-2.5">
                                        <x-admin::form.control-group.label>
                                            @lang('saas::app.super.settings.roles.create.permissions')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="permission_type" 
                                            id="permission_type"
                                            :label="trans('saas::app.super.settings.roles.create.permissions')"
                                            :placeholder="trans('saas::app.super.settings.roles.create.permissions')"
                                            v-model="permission_type"
                                        >
                                            <option value="custom">@lang('saas::app.super.settings.roles.create.custom')</option>
                                            <option value="all">@lang('saas::app.super.settings.roles.create.all')</option>
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="permission_type"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>

                                <div 
                                    class="mb-2.5"
                                    v-if="permission_type == 'custom'"
                                >
                                    <x-admin::tree.view
                                        input-type="checkbox"
                                        value-field="key"
                                        id-field="key"
                                        :items="json_encode(super_acl()->getItems())"
                                        :fallback-locale="config('app.fallback_locale')"
                                    >
                                    </x-admin::tree.view>
                                </div>
                            </div>

                            {!! view_render_event('bagisto.admin.settings.roles.create.card.access_control.after') !!}

                        </div>
                        <!-- Right sub-component -->
                        <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">

                            {!! view_render_event('bagisto.admin.settings.roles.create.card.accordion.general.before') !!}

                            <x-admin::accordion>
                                <x-slot:header>
                                    <div class="flex items-center justify-between p-1.5">
                                        <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                                            @lang('saas::app.super.settings.roles.create.general')
                                        </p>
                                    </div>
                                </x-slot:header>
                        
                                <x-slot:content>
                                    <div class="mb-2.5">
                                        <x-admin::form.control-group class="mb-2.5">
                                            <x-admin::form.control-group.label class="required">
                                                @lang('saas::app.super.settings.roles.create.name')
                                            </x-admin::form.control-group.label>
    
                                            <x-admin::form.control-group.control
                                                type="text"
                                                name="name"
                                                value="{{ old('name') }}"
                                                id="name"
                                                rules="required"
                                                :label="trans('saas::app.super.settings.roles.create.name')"
                                                :placeholder="trans('saas::app.super.settings.roles.create.name')"
                                            >
                                            </x-admin::form.control-group.control>
    
                                            <x-admin::form.control-group.error
                                                control-name="name"
                                            >
                                            </x-admin::form.control-group.error>
                                        </x-admin::form.control-group>
                                    
                                        <x-admin::form.control-group class="mb-2.5">
                                            <x-admin::form.control-group.label class="required">
                                                @lang('saas::app.super.settings.roles.create.description')
                                            </x-admin::form.control-group.label>
    
                                            <x-admin::form.control-group.control
                                                type="textarea"
                                                name="description"
                                                :value="old('description')"
                                                id="description"
                                                rules="required"
                                                :label="trans('saas::app.super.settings.roles.create.description')"
                                                :placeholder="trans('saas::app.super.settings.roles.create.description')"
                                            >
                                            </x-admin::form.control-group.control>
    
                                            <x-admin::form.control-group.error
                                                control-name="description"
                                            >
                                            </x-admin::form.control-group.error>
                                        </x-admin::form.control-group>
                                    </div>
                                </x-slot:content>
                            </x-admin::accordion>

                            {!! view_render_event('bagisto.admin.settings.roles.create.card.accordion.general.after') !!}

                        </div>
                    </div>

                    {!! view_render_event('bagisto.super.settings.roles.create.create_form_controls.after') !!}

                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-create-agent-role', {
                template: '#v-create-agent-role-template',

                data() {
                    return {
                        permission_type: 'custom'
                    };
                }
            })
        </script>
    @endPushOnce
</x-saas::layouts>