<x-marketplace::admin.layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('marketplace::app.admin.seller-categories.create.title')
    </x-slot:title>

    <!-- Category Create Form -->
    <x-admin::form
        :action="route('admin.marketplace.seller_categories.store')"
        enctype="multipart/form-data"
    >
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('marketplace::app.admin.seller-categories.create.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <!-- Cancel Button -->
                <a
                    href="{{ route('admin.marketplace.seller_categories.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('marketplace::app.admin.seller-categories.create.back-btn')
                </a>

                <!-- Save Button -->
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('marketplace::app.admin.seller-categories.create.save-btn')
                </button>
            </div>
        </div>

        <!-- Full Pannel -->
        <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
            <div class="box-shadow w-full rounded bg-white p-4 dark:bg-gray-900">
                <!-- Seller -->
                <x-admin::form.control-group class="mb-2.5 w-full">
                    <x-admin::form.control-group.label>
                        @lang('marketplace::app.admin.seller-categories.create.seller')
                    </x-admin::form.control-group.label>

                    <x-admin::form.control-group.control
                        type="select"
                        name="seller_id"
                        id="seller_id"
                        :value="old('seller_id')"
                        rules="required"
                        :label="trans('marketplace::app.admin.seller-categories.create.seller')"
                    >
                        <option value="">
                            @lang('marketplace::app.admin.seller-categories.create.select-seller')
                        </option>
                        @foreach ($sellers as $seller)
                            <option value="{{ $seller->id }}">
                                {{ $seller->name }}
                            </option>
                        @endforeach
                    </x-admin::form.control-group.control>

                    <x-admin::form.control-group.error
                        class="mt-3"
                        control-name="seller_id"
                    />
                </x-admin::form.control-group>

                <div class="mb-2.5">
                    <!-- Parent category -->
                    <div class="flex flex-col gap-3">
                        <x-admin::tree.view
                            input-type="checkbox"
                            name-field="categories"
                            selection-type="individual"
                            value-field="id"
                            :items="json_encode($categories)"
                            :fallback-locale="config('app.fallback_locale')"
                        />

                        <x-admin::form.control-group.error
                            class="mt-3"
                            control-name="categories"
                        />
                    </div>
                </div>
            </div>
        </div>
    </x-admin::form>
</x-marketplace::admin.layouts>
