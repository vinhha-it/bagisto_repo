<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('saas::app.admin.tenant-profile.edit-title')
    </x-slot:title>

    {!! view_render_event('bagisto.saas.company.profile.update.before') !!}

    <!-- Tenant's Profile Edit Form -->
    <x-admin::form
        :action="route('admin.company.profile.update', $company->id)"
        enctype="multipart/form-data"
        method="PUT"
    >

        {!! view_render_event('bagisto.saas.company.profile.edit.edit_form_controls.before', ['company' => $company]) !!}

            <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
                <p class="text-xl text-gray-800 dark:text-white font-bold">
                    @lang('saas::app.admin.tenant-profile.edit-title')
                </p>

                <div class="flex gap-x-2.5 items-center">
                    <!-- Back Button -->
                    <a
                        href="{{ route('admin.dashboard.index') }}"
                        class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white "
                    >
                        @lang('saas::app.admin.tenant-profile.back-btn')
                    </a>

                    <!-- Save Button -->
                    <button
                        type="submit"
                        class="primary-button"
                    >
                        @lang('saas::app.admin.tenant-profile.save-btn')
                    </button>
                </div>
            </div>

            <!-- Full Panel -->
            <div class="flex gap-2.5 mt-4 max-xl:flex-wrap">
                <!-- Left Section -->
                <div class=" flex flex-col gap-2 flex-1 max-xl:flex-auto">

                    {!! view_render_event('bagisto.saas.company.profile.edit.card.general.before', ['company' => $company]) !!}

                    <!-- General -->
                    <div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                        <p class="mb-4 text-base text-gray-800 dark:text-white font-semibold">
                            @lang('saas::app.admin.tenant-profile.general')
                        </p>
                        
                        <!-- First name -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-profile.first-name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="first_name"
                                :value="old('first_name') ?: $details->first_name"
                                rules="required"
                                :label="trans('saas::app.admin.tenant-profile.first-name')"
                                :placeholder="trans('saas::app.admin.tenant-profile.first-name')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="first_name"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                        
                        <!-- Last name -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-profile.last-name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="last_name"
                                :value="old('last_name') ?: $details->last_name"
                                rules="required"
                                :label="trans('saas::app.admin.tenant-profile.last-name')"
                                :placeholder="trans('saas::app.admin.tenant-profile.last-name')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="last_name"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                        
                        <!-- Email -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-profile.email')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="email"
                                name="email"
                                id="email"
                                :value="old('email') ?: $details->email"
                                rules="required|email|max:191"
                                :label="trans('saas::app.admin.tenant-profile.email')"
                                placeholder="email@example.com"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="email"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                        
                        <!-- Skype -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.admin.tenant-profile.skype')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="skype"
                                :value="old('skype') ?: $details->skype"
                                rules="min:6|max:32"
                                :label="trans('saas::app.admin.tenant-profile.skype')"
                                :placeholder="trans('saas::app.admin.tenant-profile.skype')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="skype"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                        
                        <!-- cname -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.admin.tenant-profile.cname')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="cname"
                                id="cname"
                                :value="old('cname') ?: $company->cname"
                                rules="min:6|max:32"
                                :label="trans('saas::app.admin.tenant-profile.cname')"
                                :placeholder="trans('saas::app.admin.tenant-profile.cname')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.label>
                                Check domain availability on <a onClick="redirectUser(event)" href=""><strong>GoDaddy</strong></a>
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.error
                                control-name="cname"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                        
                        <!-- Phone -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-profile.phone')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="phone"
                                id="phone"
                                :value="old('phone') ?: $details->phone"
                                rules="required|integer|max:20"
                                :label="trans('saas::app.admin.tenant-profile.phone')"
                                :placeholder="trans('saas::app.admin.tenant-profile.phone')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="phone"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </div>
            </div>

        {!! view_render_event('bagisto.saas.company.profile.edit.edit_form_controls.after', ['company' => $company]) !!}
    </x-admin::form>

    @pushOnce('scripts')
        <script>
            function redirectUser(event) {
                event.preventDefault();

                const domain = document.getElementById("cname").value;

                window.open(`https://godaddy.com/domainsearch/find?checkAvail=1&domainToCheck=${domain}`, '_blank');
            }
        </script>
    @endPushOnce
</x-admin::layouts>