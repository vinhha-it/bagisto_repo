<x-saas::layouts>
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('saas::app.super.settings.agents.index.edit.title')
    </x-slot:title>

    <x-admin::form 
        :action="route('super.agents.account.update')"
        enctype="multipart/form-data"
        method="PUT"
    >
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('saas::app.super.settings.agents.index.edit.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                 <!-- Cancel Button -->
                <a
                    href="{{ route('super.settings.agents.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('saas::app.super.settings.channels.edit.back-btn')
                </a>

                <!-- Save Button -->
                <div class="flex items-center gap-x-2.5">
                    <button 
                        type="submit"
                        class="primary-button"
                    >
                        @lang('saas::app.super.settings.channels.edit.save-btn')
                    </button>
                </div>
            </div>
        </div>

        <!-- Full Pannel -->
        <div class="mt-4 flex gap-2.5 max-xl:flex-wrap">
             <!-- Left sub Component -->
             <div class="flex flex-1 flex-col gap-2">
                 <!-- General -->
                 <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('admin::app.account.edit.general')
                    </p>

                    <!-- Image -->
                    <x-admin::form.control-group>
                        <x-admin::media.images
                            name="image"
                            :uploaded-images="$superAdmin->image ? [['id' => 'image', 'url' => $superAdmin->image_url]] : []"
                        />
                    </x-admin::form.control-group>

                    <p class="mb-4 text-xs text-gray-600 dark:text-gray-300">
                        @lang('saas::app.super.settings.agents.index.create.upload-image-info')
                    </p>

                    <!-- First Name -->
                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('saas::app.super.settings.agents.index.create.first-name')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="text"
                            name="first_name"
                            :value="old('first_name') ?: $superAdmin->first_name"
                            rules="required"
                            :label="trans('saas::app.super.settings.agents.index.create.first-name')"
                            :placeholder="trans('saas::app.super.settings.agents.index.create.first-name')"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="first_name"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <!-- Last Name -->
                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('saas::app.super.settings.agents.index.create.last-name')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="text"
                            name="last_name"
                            :value="old('last_name') ?: $superAdmin->last_name"
                            rules="required"
                            :label="trans('saas::app.super.settings.agents.index.create.last-name')"
                            :placeholder="trans('saas::app.super.settings.agents.index.create.last-name')"
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
                            @lang('saas::app.super.settings.agents.index.create.email')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="email"
                            name="email"
                            :value="old('email') ?: $superAdmin->email"
                            rules="required|email"
                            id="email"
                            placeholder="email@example.com"
                            :label="trans('saas::app.super.settings.agents.index.create.email')"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error 
                            control-name="email"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>
                </div>
             </div>

             <!-- Right sub-component -->
             <div class="flex w-[360px] max-w-full flex-col gap-2 max-md:w-full">
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                            @lang('admin::app.account.edit.change-password')
                        </p>
                    </x-slot:header>

                     <!-- Change Account Password -->
                    <x-slot:content>
                        <!-- Current Password -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas::app.super.settings.agents.index.create.current-password')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="password"
                                name="current_password"
                                rules="required|min:6"
                                :label="trans('saas::app.super.settings.agents.index.create.current-password')"
                                :placeholder="trans('saas::app.super.settings.agents.index.create.current-password')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="current_password"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <!-- Password -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.settings.agents.index.create.password')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="password"
                                name="password"
                                rules="min:6"
                                ref="password"
                                :placeholder="trans('saas::app.super.settings.agents.index.create.password')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="password"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <!-- Confirm Password -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('saas::app.super.settings.agents.index.create.confirm-password')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="password"
                                name="password_confirmation"
                                rules="confirmed:@password"
                                :label="trans('saas::app.super.settings.agents.index.create.confirm-password')"
                                :placeholder="trans('saas::app.super.settings.agents.index.create.confirm-password')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error 
                                control-name="password_confirmation"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </x-slot:content>
                </x-admin::accordion>
             </div>
        </div>
    </x-admin::form>
</x-saas::layouts>