<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.tenants.edit.title')
    </x-slot:title>

    @php
        $companyDetail = $company->details;
    @endphp

    {!! view_render_event('bagisto.super.tenants.companies.edit.before') !!}

        <!-- Input Form -->
        <x-admin::form
            :action="route('super.tenants.companies.update', $company->id)"
            enctype="multipart/form-data"
            method="PUT"
        >
            <div class="flex items-center justify-between">
                <p class="text-xl font-bold text-gray-800 dark:text-white">
                    @lang('saas::app.super.tenants.edit.title')
                </p>

                <div class="flex items-center gap-x-2.5">
                    <!-- Cancel Button -->
                    <a
                        href="{{ route('super.tenants.companies.index') }}"
                        class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                    >
                        @lang('saas::app.super.tenants.edit.back-btn')
                    </a>

                    <!-- Save Button -->
                    <button
                        type="submit"
                        class="primary-button"
                    >
                        @lang('saas::app.super.tenants.edit.save-btn')
                    </button>
                </div>
            </div>

            <!-- body content -->
            <div class="mt-4 flex gap-2.5">
                
                <!-- Left Section -->
                <div class="flex flex-1 flex-col gap-2 overflow-auto">

                    <!-- General -->
                    <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                            @lang('saas::app.super.tenants.edit.general')
                        </p>

                        {!! view_render_event('bagisto.super.tenants.companies.create_form.general.controls.before', ['company' => $company]) !!}

                        <div class="flex gap-4 max-sm:flex-wrap">
                            {{--  First Name  --}}
                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.tenants.edit.first-name')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="first_name"
                                    id="first_name"
                                    :value="old('first_name') ?: $companyDetail->first_name"
                                    rules="required"
                                    :label="trans('saas::app.super.tenants.edit.first-name')"
                                    :placeholder="trans('saas::app.super.tenants.edit.first-name')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="first_name"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            {{--  Last Name  --}}
                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.tenants.edit.last-name')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="last_name"
                                    id="last_name"
                                    :value="old('last_name') ?: $companyDetail->last_name"
                                    rules="required"
                                    :label="trans('saas::app.super.tenants.edit.last-name')"
                                    :placeholder="trans('saas::app.super.tenants.edit.last-name')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="last_name"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </div>

                        {{--  Email  --}}
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.tenants.edit.email')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="email"
                                name="email"
                                id="email"
                                :value="old('email') ?: $companyDetail->email"
                                rules="required|email|max:191"
                                :label="trans('saas::app.super.tenants.edit.email')"
                                placeholder="email@example.com"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="email"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        {{-- Phone Number --}}
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.tenants.edit.phone')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="phone"
                                id="phone"
                                :value="old('phone') ?: $companyDetail->phone"
                                rules="required|integer|max:20"
                                :label="trans('saas::app.super.tenants.edit.phone')"
                                :placeholder="trans('saas::app.super.tenants.edit.phone')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="phone"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        {{--  Organization Name  --}}
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.tenants.edit.organization-name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="name"
                                id="organization_name"
                                :value="old('name') ?: $company->name"
                                rules="required"
                                :label="trans('saas::app.super.tenants.edit.organization-name')"
                                :placeholder="trans('saas::app.super.tenants.edit.organization-name')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="name"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        {!! view_render_event('bagisto.super.tenants.companies.create_form.general.controls.after', ['company' => $company]) !!}
                    </div>
                </div>

                 <!-- Right Section -->
                <div class="flex w-[360px] max-w-full flex-col gap-2">
                    
                    <!-- Settings -->

                    {!! view_render_event('bagisto.admin.catalog.categories.edit.card.accordion.settings.before', ['company' => $company]) !!}

                    <x-admin::accordion>
                        <x-slot:header>
                            <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                                @lang('saas::app.super.tenants.edit.settings')
                            </p>
                        </x-slot:header>

                        <x-slot:content>
                            <div class="mb-2.5">
                                
                                <!-- Status -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="font-medium text-gray-800 dark:text-white">
                                        @lang('saas::app.super.tenants.edit.status')
                                    </x-admin::form.control-group.label>

                                    @php
                                        $selectedValue = old('is_active') ?: $company->is_active;
                                    @endphp

                                    <x-admin::form.control-group.control
                                        type="switch"
                                        name="is_active"
                                        class="cursor-pointer"
                                        value="1"
                                        :label="trans('saas::app.super.settings.themes.edit.status')"
                                        :checked="(boolean) $selectedValue"
                                    >
                                    </x-admin::form.control-group.control>
                                </x-admin::form.control-group>
                            
                                <!-- User Name -->
                                <x-admin::form.control-group class="mb-2.5 w-full">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.tenants.edit.user-name')
                                    </x-admin::form.control-group.label>

                                    @php
                                        $selectedOption = old('username') ?: $company->username;
                                    @endphp
        
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="username"
                                        id="user_name"
                                        class="cursor-not-allowed"
                                        :value="$selectedOption"
                                        rules="required"
                                        :disabled="(boolean) $selectedOption"
                                        readonly
                                        :label="trans('saas::app.super.tenants.edit.user-name')"
                                        :placeholder="trans('saas::app.super.tenants.edit.user-name')"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="username"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
        
                                <!-- cName -->
                                <x-admin::form.control-group class="mb-2.5 w-full">
                                    <x-admin::form.control-group.label>
                                        @lang('saas::app.super.tenants.edit.cname')
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="cname"
                                        id="cname"
                                        :value="old('cname') ?: $company->cname"
                                        :label="trans('saas::app.super.tenants.edit.cname')"
                                        :placeholder="trans('saas::app.super.tenants.edit.cname')"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="cname"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                            </div>
                        </x-slot:content>
                    </x-admin::accordion>


                    {!! view_render_event('bagisto.admin.catalog.categories.edit.card.accordion.settings.after', ['company' => $company]) !!}
                </div>

            </div>
        </x-admin::form>

    {!! view_render_event('bagisto.super.tenants.companies.edit.after') !!}

</x-saas::layouts>