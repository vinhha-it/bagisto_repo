<x-saas::layouts>

    {{-- Page Title --}}
    <x-slot:title>
        @lang('saas::app.super.settings.roles.edit.title')
    </x-slot:title>
    
    {!! view_render_event('bagisto.super.settings.roles.edit.before') !!}

    {{-- Edit Role for Agent --}}
    <v-edit-agent-role></v-edit-agent-role>

    {!! view_render_event('bagisto.super.settings.roles.edit.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-edit-agent-role-template">
            <div>
                <x-admin::form 
                    method="PUT" 
                    :action="route('super.settings.roles.update', $role->id)"
                >

                {!! view_render_event('bagisto.super.settings.roles.edit.edit_form_controls.before') !!}

                <div class="flex items-center justify-between">
                    <p class="text-xl font-bold text-gray-800 dark:text-white">
                        @lang('saas::app.super.settings.roles.edit.title')
                    </p>

                    <div class="flex items-center gap-x-2.5">
                        <!-- Cancel Button -->
                        <a
                            href="{{ route('super.settings.roles.index') }}"
                            class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                        >
                            @lang('saas::app.super.settings.roles.edit.back-btn')
                        </a>

                        <!-- Save Button -->
                        <button 
                            type="submit" 
                            class="cursor-pointer rounded-md border border-blue-700 bg-blue-600 px-3 py-1.5 font-semibold text-gray-50"
                        >
                            @lang('saas::app.super.settings.roles.edit.save-btn')
                        </button>
                    </div>
                </div>

                <!-- body content -->
                <div class="mt-4 flex gap-2.5 max-xl:flex-wrap">
                    <!-- Left sub-component -->
                    <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">

                        {!! view_render_event('bagisto.admin.settings.roles.edit.card.access-control.before') !!}
    
                        <!-- Access Control Input Fields -->
                        <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                            <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                                @lang('saas::app.super.settings.roles.edit.access-control')
                            </p>

                            <div class="mb-2.5">
                                <x-admin::form.control-group class="mb-2.5">
                                    <x-admin::form.control-group.label>
                                        @lang('saas::app.super.settings.roles.edit.permissions')
                                    </x-admin::form.control-group.label>
                                    <x-admin::form.control-group.control
                                        type="select"
                                        name="permission_type" 
                                        id="permission_type"
                                        :label="trans('saas::app.super.settings.roles.edit.permissions')"
                                        :placeholder="trans('saas::app.super.settings.roles.edit.permissions')"
                                        v-model="permission_type"
                                    >
                                        <option value="custom">@lang('saas::app.super.settings.roles.edit.custom')</option>
                                        <option value="all">@lang('saas::app.super.settings.roles.edit.all')</option>
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="permission_type"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>
                            
                            <!-- Tree structure -->
                            <div 
                                class="mb-2.5"
                                v-if="permission_type == 'custom'"
                            >
                                <x-admin::tree.view
                                    value-field="key"
                                    id-field="key"
                                    :items="json_encode(super_acl()->getItems())"
                                    :value="json_encode($role->permissions)" 
                                    :fallback-locale="config('app.fallback_locale')"
                                >
                                </x-admin::tree.view>
                            </div>
                        </div>

                        {!! view_render_event('bagisto.admin.settings.roles.edit.card.access-control.after') !!}

                    </div>

                    <!-- Right sub-component -->
                    <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">

                        {!! view_render_event('bagisto.admin.settings.roles.edit.card.accordion.general.before') !!}

                        <x-admin::accordion>
                            <x-slot:header>
                                <div class="flex items-center justify-between p-1.5">
                                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                                        @lang('saas::app.super.settings.roles.edit.general')
                                    </p>
                                </div>
                            </x-slot:header>
                    
                            <x-slot:content>
                                <div class="mb-2.5">
                                    <x-admin::form.control-group class="mb-2.5">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('saas::app.super.settings.roles.edit.name')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="name"
                                            value="{{ old('name') ?: $role->name }}"
                                            id="name"
                                            rules="required"
                                            :label="trans('saas::app.super.settings.roles.edit.name')"
                                            :placeholder="trans('saas::app.super.settings.roles.edit.name')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="name"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                
                                    <x-admin::form.control-group class="mb-2.5">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('saas::app.super.settings.roles.edit.description')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="textarea"
                                            name="description"
                                            value="{{ old('description') ?: $role->description }}"
                                            id="description"
                                            rules="required"
                                            :label="trans('saas::app.super.settings.roles.edit.description')"
                                            :placeholder="trans('saas::app.super.settings.roles.edit.description')"
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

                        {!! view_render_event('bagisto.admin.settings.roles.edit.card.accordion.general.after') !!}

                    </div>
                </div>

                {!! view_render_event('bagisto.super.settings.roles.edit.edit_form_controls.after') !!}

                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-edit-agent-role', {
                template: '#v-edit-agent-role-template',

                data() {
                    return {
                        permission_type: "{{ $role->permission_type }}"
                    };
                }
            })
        </script>
    @endPushOnce
</x-saas::layouts>