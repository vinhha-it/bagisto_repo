<x-admin::layouts>
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('saas::app.admin.tenant-address.edit.title')
    </x-slot:title>

    {{-- Tenant's Profile Edit Form --}}
    <x-admin::form
        :action="route('admin.company.address.update', $address->id)"
        method="PUT"
    >

        {!! view_render_event('bagisto.saas.company.address.edit.edit_form_controls.before', ['address' => $address]) !!}

            <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
                <p class="text-xl text-gray-800 dark:text-white font-bold">
                    @lang('saas::app.admin.tenant-address.edit.title')
                </p>

                <div class="flex gap-x-2.5 items-center">
                    <!-- Back Button -->
                    <a
                        href="{{ route('admin.dashboard.index') }}"
                        class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white "
                    >
                        @lang('saas::app.admin.tenant-address.edit.back-btn')
                    </a>

                    <!-- Save Button -->
                    <button
                        type="submit"
                        class="primary-button"
                    >
                        @lang('saas::app.admin.tenant-address.edit.save-btn')
                    </button>
                </div>
            </div>

            {{-- Full Pannel --}}
            <div class="flex gap-2.5 mt-4 max-xl:flex-wrap">
                {{-- Left Section --}}
                <div class=" flex flex-col gap-2 flex-1 max-xl:flex-auto">

                    {!! view_render_event('bagisto.saas.company.profile.create.card.general.before') !!}

                    <!-- General -->
                    <div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                        <p class="mb-4 text-base text-gray-800 dark:text-white font-semibold">
                            @lang('saas::app.admin.tenant-address.edit.general')
                        </p>
                        
                        {{-- Address 1 --}}
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-address.edit.address1')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="address1"
                                :value="old('address1') ?: $address->address1"
                                rules="required"
                                :label="trans('saas::app.admin.tenant-address.edit.address1')"
                                :placeholder="trans('saas::app.admin.tenant-address.edit.address1')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="address1"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                        
                        {{-- Address 2 --}}
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.admin.tenant-address.edit.address2')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="address2"
                                :value="old('address2') ?: $address->address2"
                                :label="trans('saas::app.admin.tenant-address.edit.address2')"
                                :placeholder="trans('saas::app.admin.tenant-address.edit.address2')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="address2"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        {{--  Country --}}
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-address.edit.country')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"
                                name="country"
                                :value="old('country') ?: $address->country"
                                rules="required"
                                :label="trans('saas::app.admin.tenant-address.edit.country')"
                            >
                                <option value="">@lang('Select Country')</option>

                                @foreach (core()->countries() as $country)
                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                @endforeach
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="country"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        {{-- State --}}
                        <x-admin::form.control-group class="mb-4">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-address.edit.state')
                            </x-admin::form.control-group.label>
                
                            <x-admin::form.control-group.control
                                type="text"
                                name="state"
                                :value="old('state') ?: $address->state"
                                rules="required"
                                :label="trans('saas::app.admin.tenant-address.edit.state')"
                                :placeholder="trans('saas::app.admin.tenant-address.edit.state')"
                            >
                            </x-admin::form.control-group.control>
                
                            <x-admin::form.control-group.error
                                control-name="state"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <!-- City -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-address.edit.city')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="city"
                                :value="old('city') ?: $address->city"
                                rules="required"
                                :label="trans('saas::app.admin.tenant-address.edit.city')"
                                :placeholder="trans('saas::app.admin.tenant-address.edit.city')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="city"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                        
                        <!-- PostCode -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-address.edit.post-code')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="zip_code"
                                :value="old('zip_code') ?: $address->zip_code"
                                rules="required|integer"
                                :label="trans('saas::app.admin.tenant-address.edit.post-code')"
                                :placeholder="trans('saas::app.admin.tenant-address.edit.post-code')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="zip_code"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <!--Phone number -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.admin.tenant-address.edit.phone')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="phone"
                                :value="old('phone') ?: $address->phone"
                                rules="required|integer"
                                :label="trans('saas::app.admin.tenant-address.edit.phone')"
                                :placeholder="trans('saas::app.admin.tenant-address.edit.phone')"
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

        {!! view_render_event('bagisto.saas.company.address.create.create_form_controls.after', ['address' => $address]) !!}
    </x-admin::form>
</x-admin::layouts>