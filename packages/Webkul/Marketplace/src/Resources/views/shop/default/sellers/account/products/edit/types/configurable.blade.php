<v-product-variations :errors="errors"></v-product-variations>

@pushOnce('scripts')
    <!-- Variations Template -->
    <script type="text/x-template" id="v-product-variations-template">
        <div class="box-shadow relative rounded-xl border bg-white p-5">
            <!-- Panel Header -->
            <div class="mb-4 grid grid-cols-3 justify-items-end gap-2.5">
                <div class="col-span-2 grid gap-2">
                    <p class="text-base font-semibold text-gray-800">
                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.title')
                    </p>

                    <p class="text-xs font-medium text-gray-500">
                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.info')
                    </p>
                </div>

                @if (request()->route()->getName() == 'marketplace.account.products.edit')
                    <!-- Add Button -->
                    <div
                        class="secondary-button"
                        @click="$refs.variantCreateModal.open()"
                    >
                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.add-btn')
                    </div>
                @endif
            </div>

            <template v-if="variants.length">
                <!-- Mass Action Vue Component -->
                <v-product-variations-mass-action
                    :super-attributes="superAttributes"
                    :variants="variants"
                >
                </v-product-variations-mass-action>

                <!-- Panel Content -->
                <div class="grid">
                    <v-product-variation-item
                        v-for='(variant, index) in variants'
                        :key="index"
                        :index="index"
                        :variant="variant"
                        :attributes="superAttributes"
                        @onRemoved="removeVariant"
                        :errors="errors"
                    ></v-product-variation-item>
                </div>
            </template>

            <!-- For Empty Variations -->
            <template v-else>
                <div class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10">
                    <!-- Placeholder Image -->
                    <img
                        src="{{ bagisto_asset('images/icon-add-product.svg', 'marketplace') }}"
                        class="h-20 w-20"
                    />

                    <!-- Add Variants Information -->
                    <div class="flex flex-col items-center">
                        <p class="text-base font-semibold text-gray-400">
                            @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.empty-title')
                        </p>

                        <p class="text-gray-400">
                            @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.empty-info')
                        </p>
                    </div>
                    
                    <!-- Add Row Button -->
                    <div
                        class="secondary-button text-sm"
                        @click="$refs.variantCreateModal.open()"
                    >
                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.add-btn')
                    </div>
                </div>
            </template>

            <!-- Add Variant Form Modal -->
            <x-marketplace::shop.form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form @submit="handleSubmit($event, addVariant)">
                    <!-- Customer Create Modal -->
                    <x-marketplace::shop.modal ref="variantCreateModal">
                        <x-slot:header>
                            <!-- Modal Header -->
                            <p class="text-2xl font-medium leading-10 text-[#151515]">
                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.create.title')
                            </p>
                        </x-slot:header>
        
                        <x-slot:content>
                            <!-- Modal Content -->
                            <x-marketplace::shop.form.control-group
                                v-for='(attribute, index) in superAttributes'
                            >
                                <x-marketplace::shop.form.control-group.label class="required flex">
                                    @{{ attribute.admin_name }}
                                </x-marketplace::shop.form.control-group.label>

                                <v-field
                                    as="select"
                                    :name="attribute.code"
                                    class="custom-select flex min-h-10 w-full rounded-md border bg-white px-3 py-1.5 text-sm font-normal text-gray-600 transition-all hover:border-gray-400"
                                    :class="[errors[attribute.code] ? 'border border-red-500' : '']"
                                    rules="required"
                                    :label="attribute.admin_name"
                                >
                                    <option
                                        v-for="option in attribute.options"
                                        :value="option.id"
                                    >
                                        @{{ option.admin_name }}
                                    </option>
                                </v-field>

                                <v-error-message
                                    :name="attribute.code"
                                    v-slot="{ message }"
                                >
                                    <p
                                        class="mt-1 flex text-xs italic text-red-600"
                                        v-text="message"
                                    >
                                    </p>
                                </v-error-message>
                            </x-marketplace::shop.form.control-group>
                        </x-slot:content>

                        <x-slot:footer>
                            <div class="flex justify-end">
                                <button
                                    type="submit"
                                    class="w-1/2 rounded-2xl bg-navyBlue px-7 py-4 text-center text-base text-white"
                                >
                                    @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.create.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-marketplace::shop.modal>
                </form>
            </x-marketplace::shop.form>
        </div>
    </script>

    <!-- Variations Mass Action Template -->
    <script type="text/x-template" id="v-product-variations-mass-action-template">
        <!-- Mass Actions -->
        <div class="flex items-center gap-1">
            <span
                class="flex cursor-pointer select-none text-2xl"
                :class="{
                    'mp-uncheckbox-icon': ! selectedVariants.length,
                    'mp-checked-icon text-navyBlue': variants.length == selectedVariants.length,
                    'mp-uncheckbox-icon text-navyBlue': selectedVariants.length && variants.length != selectedVariants.length
                }"
                for="select-all-variants"
                @click="selectAll"
            >
            </span>

            <!-- Attribute Options Selector -->
            <x-shop::dropdown v-bind:close-on-click="false">
                <!-- Dropdown Toggler -->
                <x-slot:toggle>
                    <button
                        type="button"
                        class="flex cursor-pointer items-center rounded-md p-1.5 text-xs font-semibold text-navyBlue transition-all hover:bg-gray-100 focus:bg-gray-100"
                    >
                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.select-variants')

                        <i class="mp-sort-by-icon text-2xl text-navyBlue"></i>
                    </button>
                </x-slot:toggle>

                <!-- Dropdown Content -->
                <x-slot:content class="px-0 py-4">
                    <template v-for="attribute in superAttributes">
                        <label
                            class="flex cursor-pointer select-none items-center gap-2.5 px-5 py-2 text-sm text-gray-600 hover:bg-gray-100"
                            :for="'attribute_' + attribute.id + '_option_' + option.id"
                            v-for="option in usedAttributeOptions(attribute)"
                        >
                            <div class="flex select-none">
                                <input
                                    type="checkbox"
                                    :id="'attribute_' + attribute.id + '_option_' + option.id"
                                    class="peer hidden"
                                    :checked="isAttributeOptionChecked(attribute, option)"
                                    @change="selectVariantsByAttributeOption(attribute, option)"
                                >

                                <label
                                    class="mp-uncheckbox-icon peer-checked:mp-checked-icon cursor-pointer text-2xl peer-checked:text-navyBlue"
                                    :for="'attribute_' + attribute.id + '_option_' + option.id"
                                >
                                </label>
                            </div>

                            <div class="flex items-center gap-1">
                                <span class="text-gray-800">
                                    @{{ attribute.admin_name }}
                                </span>

                                <i class="mp-sort-right-icon text-lg"></i>

                                @{{ option.admin_name }}
                            </div>
                        </label>
                    </template>
                </x-slot:content>
            </x-shop::dropdown>

            <!-- Actions Selector -->
            <x-shop::dropdown v-if="selectedVariants.length">
                <!-- Dropdown Toggler -->
                <x-slot:toggle>
                    <button
                        type="button"
                        class="flex cursor-pointer items-center rounded-md p-1.5 text-xs font-semibold text-navyBlue transition-all hover:bg-gray-100 focus:bg-gray-100"
                    >
                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.select-action')

                        <i class="mp-sort-by-icon text-2xl text-navyBlue"></i>
                    </button>
                </x-slot:toggle>

                <!-- Dropdown Content -->
                <x-slot:menu>
                    <x-shop::dropdown.menu.item
                        v-for="type in updateTypes"
                        @click="edit(type.key)"
                    >
                        @{{ type.title }}
                    </x-shop::dropdown.menu.item>
                </x-slot:menu>
            </x-shop::dropdown>

            <!-- Edit Drawer -->
            <x-marketplace::shop.form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form @submit="handleSubmit($event, update)">
                    <!-- Edit Drawer -->
                    <x-marketplace::shop.drawer
                        ref="updateVariantsDrawer"
                        class="text-left"
                    >
                        <!-- Drawer Header -->
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <p class="text-xl font-medium">
                                    @{{ updateTypes[selectedType]?.title }}
                                </p>

                                <button class="primary-button mr-11">
                                    @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.save-btn')
                                </button>
                            </div>
                        </x-slot:header>

                        <!-- Drawer Content -->
                        <x-slot:content class="p-4">
                            <!-- Mass Update -->
                            <x-marketplace::shop.form
                                v-slot="{ meta, errors, handleSubmit }"
                                as="div"
                            >
                                <form @submit="handleSubmit($event, update)">
                                    <template v-if="selectedType == 'editPrices'">
                                        <div class="border-b pb-2.5">
                                            <div class="flex items-center gap-2.5">
                                                <x-marketplace::shop.form.control-group class="mb-0 flex-1">
                                                    <x-marketplace::shop.form.control-group.label>
                                                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.apply-to-all-sku')
                                                    </x-marketplace::shop.form.control-group.label>

                                                    <div class="relative">
                                                        <span class="absolute top-[50%] -translate-y-[50%] text-gray-500 ltr:left-4 rtl:right-4">
                                                            {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}
                                                        </span>

                                                        <x-marketplace::shop.form.control-group.control
                                                            type="text"
                                                            name="price"
                                                            class="ltr:pl-7 rtl:pr-7"
                                                            ::rules="{required: true, decimal: true, min_value: 0}"
                                                            :label="trans('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.price')"
                                                        />
                                                    </div>
                                                </x-marketplace::shop.form.control-group>

                                                <button class="secondary-button mt-4">
                                                    @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.apply-to-all-btn')
                                                </button>
                                            </div>
                    
                                            <x-marketplace::shop.form.control-group.error control-name="price"></x-marketplace::shop.form.control-group.error>
                                        </div>
                                    </template>

                                    <template v-if="selectedType == 'editInventories'">
                                        <div class="border-b pb-2.5">
                                            <div class="mb-2.5 grid grid-cols-3 gap-4">
                                                <x-marketplace::shop.form.control-group
                                                    class="mb-0"
                                                    v-for='inventorySource in inventorySources'
                                                >
                                                    <x-marketplace::shop.form.control-group.label>
                                                        @{{ inventorySource.name }}
                                                    </x-marketplace::shop.form.control-group.label>

                                                    <v-field
                                                        type="text"
                                                        :name="'inventories[' + inventorySource.id + ']'"
                                                        class="flex min-h-10 w-full rounded-md border bg-white px-3 py-1.5 text-sm font-normal text-gray-600 transition-all hover:border-gray-400"
                                                        :class="[errors['inventories[' + inventorySource.id + ']'] ? 'border border-red-500' : '']"
                                                        rules="required|numeric|min:0"
                                                        :label="inventorySource.name"
                                                    >
                                                    </v-field>

                                                    <v-error-message
                                                        :name="'inventories[' + inventorySource.id + ']'"
                                                        v-slot="{ message }"
                                                    >
                                                        <p
                                                            class="mt-1 text-xs italic text-red-600"
                                                            v-text="message"
                                                        >
                                                        </p>
                                                    </v-error-message>
                                                </x-marketplace::shop.form.control-group>
                                            </div>

                                            <button class="secondary-button">
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.apply-to-all-btn')
                                            </button>
                                        </div>
                                    </template>

                                    <template v-if="selectedType == 'addImages'">
                                        <div class="border-b pb-2.5">
                                            <v-media-images
                                                name="images"
                                                class="mb-2.5"
                                                v-bind:allow-multiple="true"
                                                :uploaded-images="updateTypes[selectedType].images"
                                            ></v-media-images>

                                            <button class="secondary-button">
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.apply-to-all-btn')
                                            </button>
                                        </div>
                                    </template>
                                </form>
                            </x-marketplace::shop.form>

                            <div
                                class="border-b py-4 last:border-b-0"
                                :class="{'flex gap-2.5 justify-between items-center': selectedType == 'editPrices'}"
                                v-for="variant in selectedVariants"
                            >
                                <div class="text-sm text-gray-800">
                                    <span
                                        class="after:content-['_/_'] last:after:content-['']"
                                        v-for='(attribute, index) in superAttributes'
                                    >
                                        @{{ optionName(attribute, variant[attribute.code]) }}
                                    </span>
                                </div>

                                <template v-if="selectedType == 'editPrices'">
                                    <x-marketplace::shop.form.control-group class="mb-0 max-w-[115px] flex-1">
                                        <div class="relative">
                                            <span class="absolute top-[50%] -translate-y-[50%] text-gray-500 ltr:left-4 rtl:right-4">
                                                {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}
                                            </span>

                                            <v-field
                                                type="text"
                                                :name="'variants[' + variant.id + ']'"
                                                :value="variant.price"
                                                class="flex min-h-10 w-full rounded-md border bg-white py-1.5 text-sm font-normal text-gray-600 transition-all hover:border-gray-400 ltr:pl-7 rtl:pr-7"
                                                :class="[errors['variants[' + variant.id + ']'] ? 'border border-red-500' : '']"
                                                :rules="{required: true, decimal: true, min_value: 0}"
                                                label="@lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.price')"
                                            >
                                            </v-field>
                                        </div>

                                        <v-error-message
                                            :name="'variants[' + variant.id + ']'"
                                            v-slot="{ message }"
                                        >
                                            <p
                                                class="mt-1 text-xs italic text-red-600"
                                                v-text="message"
                                            >
                                            </p>
                                        </v-error-message>
                                    </x-marketplace::shop.form.control-group>
                                </template>

                                <template v-if="selectedType == 'editInventories'">
                                    <x-marketplace::shop.form.control-group class="mb-0 mt-2.5">
                                        <div class="mb-2.5 grid grid-cols-3 gap-4">
                                            <x-marketplace::shop.form.control-group
                                                class="mb-0"
                                                v-for='inventorySource in inventorySources'
                                            >
                                                <x-marketplace::shop.form.control-group.label>
                                                    @{{ inventorySource.name }}
                                                </x-marketplace::shop.form.control-group.label>

                                                <v-field
                                                    type="text"
                                                    :name="'variants[' + variant.id + '][' + inventorySource.id + ']'"
                                                    :value="variant.inventories[inventorySource.id]"
                                                    class="flex min-h-10 w-full rounded-md border bg-white px-3 py-1.5 text-sm font-normal text-gray-600 transition-all hover:border-gray-400"
                                                    :class="[errors['variants[' + variant.id + '][' + inventorySource.id + ']'] ? 'border border-red-500' : '']"
                                                    rules="required|numeric|min:0"
                                                    :label="inventorySource.name"
                                                >
                                                </v-field>

                                                <v-error-message
                                                    :name="'variants[' + variant.id + '][' + inventorySource.id + ']'"
                                                    v-slot="{ message }"
                                                >
                                                    <p
                                                        class="mt-1 text-xs italic text-red-600"
                                                        v-text="message"
                                                    >
                                                    </p>
                                                </v-error-message>
                                            </x-marketplace::shop.form.control-group>
                                        </div>
                                    </x-marketplace::shop.form.control-group>
                                </template>
                                
                                <template v-if="selectedType == 'addImages'">
                                    <v-media-images
                                        name="images"
                                        class="mt-2.5"
                                        v-bind:allow-multiple="true"
                                        :uploaded-images="variant.temp_images"
                                    ></v-media-images>
                                </template>
                            </div>
                        </x-slot:content>
                    </x-marketplace::shop.drawer>
                </form>
            </x-marketplace::shop.form>
        </div>
    </script>

    <!-- Variation Item Template -->
    <script type="text/x-template" id="v-product-variation-item-template"> 
        <div class="flex justify-between gap-2.5 border-b border-slate-300 py-6">

            <!-- Information -->
            <div class="flex gap-2.5">
                <!-- Form Hidden Fields -->
                <input type="hidden" :name="'variants[' + variant.id + '][sku]'" :value="variant.sku"/>

                <input type="hidden" :name="'variants[' + variant.id + '][name]'" :value="variant.name"/>

                <input type="hidden" :name="'variants[' + variant.id + '][price]'" :value="variant.price"/>

                <input type="hidden" :name="'variants[' + variant.id + '][weight]'" :value="variant.weight"/>

                <template v-for="attribute in attributes">
                    <input type="hidden" :name="'variants[' + variant.id + '][' + attribute.code + ']'" :value="variant[attribute.code]"/>

                    @if (request()->route()->getName() == 'marketplace.account.products.edit')
                        <input type="hidden" :name="'variants[' + variant.id + '][vendor_id]'" value="{{$sellerProduct->marketplace_seller_id}}"/>
                    @endif
                </template>

                <template v-for="inventorySource in inventorySources">
                    <input type="hidden" :name="'variants[' + variant.id + '][inventories][' + inventorySource.id + ']'" :value="variant.inventories[inventorySource.id]"/>
                </template>

                <template v-for="(image, index) in variant.images">
                    <input type="hidden" :name="'variants[' + variant.id + '][images][files][' + image.id + ']'" v-if="! image.is_new"/>

                    <input
                        type="file"
                        :name="'variants[' + variant.id + '][images][files][]'"
                        :id="$.uid + '_imageInput_' + index"
                        class="hidden"
                        accept="image/*"
                        :ref="$.uid + '_imageInput_' + index"
                    />
                </template>
                <!-- //Ends Form Hidden Fields -->

                <!-- Selection Checkbox -->
                <div class="select-none">
                    <input
                        type="checkbox"
                        :id="'variant_' + variant.id"
                        class="peer hidden"
                        v-model="variant.selected"
                    >

                    <label
                        class="mp-uncheckbox-icon peer-checked:mp-checked-icon cursor-pointer text-2xl peer-checked:text-navyBlue"
                        :for="'variant_' + variant.id"
                    ></label>
                </div>

                <!-- Image -->
                <div
                    class="relative h-15 max-h-15 w-full max-w-15 overflow-hidden rounded"
                    :class="{'border border-dashed border-gray-300': ! variant.images.length}"
                >
                    <template v-if="! variant.images.length">
                        <img src="{{ bagisto_asset('images/product-placeholders/front.svg', 'marketplace') }}">
                    
                        <p class="absolute bottom-1 w-full text-center text-[6px] font-semibold text-gray-400">
                            @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.image-placeholder')
                        </p>
                    </template>

                    <template v-else>
                        <img :src="variant.images[0].url">

                        <span
                            class="bg-darkPink absolute bottom-px rounded-full px-[6px] text-xs font-bold text-white ltr:left-px rtl:right-px"
                            v-text="variant.images.length"
                        >
                        </span>
                    </template>
                </div>

                <!-- Details -->
                <div class="grid gap-1.5">
                    <p
                        class="font-semibold text-[16x] text-gray-800"
                        v-text="variant.name ?? 'N/A'"
                    >
                    </p>

                    <p class="text-gray-600">
                        @{{ "@lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.sku')".replace(':sku', variant.sku) }}
                    </p>

                    <v-error-message
                        :name="'variants[' + variant.id + '].sku'"
                        v-slot="{ message }"
                    >
                        <p
                            class="mt-1 text-xs italic text-red-600"
                            v-text="message"
                        >
                        </p>
                    </v-error-message>

                    <div class="flex place-items-start gap-1.5">
                        <span
                            class="label-active"
                            v-if="isDefault"
                        >
                            Default
                        </span>

                        <p class="text-gray-600">
                            <span
                                class="after:content-[',_'] last:after:content-['']"
                                v-for='(attribute, index) in attributes'
                            >
                                @{{ attribute.admin_name + ': ' + optionName(attribute, variant[attribute.code]) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="grid gap-1 text-right">
                <p class="font-semibold text-gray-800">
                    @{{ $shop.formatPrice(variant.price) }}  
                </p>

                <p class="font-semibold text-gray-800">
                    @{{ "@lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.qty')".replace(':qty', totalQty) }}
                </p>

                <div class="flex gap-2.5">
                    <!-- Remove -->
                    <p
                        class="cursor-pointer text-red-600 transition-all hover:underline"
                        @click="remove"
                    >
                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.delete-btn')
                    </p>
                    
                    <!-- Edit -->
                    <div>
                        <p
                            class="cursor-pointer text-emerald-600 transition-all hover:underline"
                            @click="$refs.editVariantDrawer.open()"
                        >
                            @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit-btn')
                        </p>

                        <!-- Edit Drawer -->
                        <x-marketplace::shop.form
                            v-slot="{ meta, errors, handleSubmit }"
                            as="div"
                        >
                            <form @submit="handleSubmit($event, update)">
                                <!-- Edit Drawer -->
                                <x-marketplace::shop.drawer
                                    ref="editVariantDrawer"
                                    class="text-left"
                                >
                                    <!-- Drawer Header -->
                                    <x-slot:header>
                                        <div class="flex items-center justify-between">
                                            <p class="text-xl font-medium">
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.title')
                                            </p>

                                            <button class="primary-button mr-11">
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.save-btn')
                                            </button>
                                        </div>
                                    </x-slot:header>

                                    <!-- Drawer Content -->

                                    <x-slot:content>
                                        <x-marketplace::shop.form.control-group.control
                                            type="hidden"
                                            name="id"
                                            ::value="variant.id"
                                        />

                                        <x-marketplace::shop.form.control-group>
                                            <x-marketplace::shop.form.control-group.label class="required">
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.name')
                                            </x-marketplace::shop.form.control-group.label>
                
                                            <x-marketplace::shop.form.control-group.control
                                                type="text"
                                                name="name"
                                                ::value="variant.name"
                                                rules="required"
                                                :label="trans('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.name')"
                                            />
                
                                            <x-marketplace::shop.form.control-group.error control-name="name" />
                                        </x-marketplace::shop.form.control-group>

                                        <x-marketplace::shop.form.control-group>
                                            <x-marketplace::shop.form.control-group.label class="required">
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.sku')
                                            </x-marketplace::shop.form.control-group.label>
                
                                            <x-marketplace::shop.form.control-group.control
                                                type="text"
                                                name="sku"
                                                ::value="variant.sku"
                                                rules="required"
                                                :label="trans('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.sku')"
                                            />
                
                                            <x-marketplace::shop.form.control-group.error control-name="sku" />
                                        </x-marketplace::shop.form.control-group>

                                        <div class="mb-2.5 flex gap-4">
                                            <x-marketplace::shop.form.control-group class="flex-1">
                                                <x-marketplace::shop.form.control-group.label class="required">
                                                    @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.price')
                                                </x-marketplace::shop.form.control-group.label>
                    
                                                <x-marketplace::shop.form.control-group.control
                                                    type="text"
                                                    name="price"
                                                    ::value="variant.price"
                                                    ::rules="{required: true, decimal: true, min_value: 0}"
                                                    :label="trans('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.price')"
                                                />
                    
                                                <x-marketplace::shop.form.control-group.error control-name="price" />
                                            </x-marketplace::shop.form.control-group>

                                            <x-marketplace::shop.form.control-group class="flex-1">
                                                <x-marketplace::shop.form.control-group.label>
                                                    @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.status')
                                                </x-marketplace::shop.form.control-group.label>
                    
                                                <x-marketplace::shop.form.control-group.control
                                                    type="select"
                                                    name="status"
                                                    ::value="variant.status"
                                                    rules="required"
                                                    :label="trans('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.status')"
                                                >
                                                    <option value="1">
                                                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.enabled')
                                                    </option>

                                                    <option value="0">
                                                        @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.disabled')
                                                    </option>
                                                </x-marketplace::shop.form.control-group.control>
                    
                                                <x-marketplace::shop.form.control-group.error control-name="status" />
                                            </x-marketplace::shop.form.control-group>
                                        </div>

                                        <x-marketplace::shop.form.control-group>
                                            <x-marketplace::shop.form.control-group.label class="required">
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.weight')
                                            </x-marketplace::shop.form.control-group.label>
                
                                            <x-marketplace::shop.form.control-group.control
                                                type="text"
                                                name="weight"
                                                ::value="variant.weight"
                                                ::rules="{ required: true, regex: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]+\.[0-9]*[1-9][0-9]*)$/ }"
                                                :label="trans('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.weight')"
                                            />
                
                                            <x-marketplace::shop.form.control-group.error control-name="weight" />
                                        </x-marketplace::shop.form.control-group>

                                        <!-- Inventories -->
                                        <div class="mt-5 grid">
                                            <p class="mb-2.5 font-semibold text-gray-800">
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.quantities')
                                            </p>

                                            <div class="mb-2.5 grid grid-cols-3 gap-4">
                                                <x-marketplace::shop.form.control-group
                                                    class="mb-0"
                                                    v-for='inventorySource in inventorySources'
                                                >
                                                    <x-marketplace::shop.form.control-group.label>
                                                        @{{ inventorySource.name }}
                                                    </x-marketplace::shop.form.control-group.label>

                                                    <v-field
                                                        type="text"
                                                        :name="'inventories[' + inventorySource.id + ']'"
                                                        v-model="variant.inventories[inventorySource.id]"
                                                        class="flex min-h-10 w-full rounded-md border bg-white px-3 py-1.5 text-sm font-normal text-gray-600 transition-all hover:border-gray-400"
                                                        :class="[errors['inventories[' + inventorySource.id + ']'] ? 'border border-red-500' : '']"
                                                        rules="numeric|min:0"
                                                        :label="inventorySource.name"
                                                    >
                                                    </v-field>

                                                    <v-error-message
                                                        :name="'inventories[' + inventorySource.id + ']'"
                                                        v-slot="{ message }"
                                                    >
                                                        <p
                                                            class="mt-1 text-xs italic text-red-600"
                                                            v-text="message"
                                                        >
                                                        </p>
                                                    </v-error-message>
                                                </x-marketplace::shop.form.control-group>
                                            </div>
                                        </div>

                                        <!-- Images -->
                                        <div class="mb-2.5">
                                            <p class="mb-2.5 font-semibold text-gray-800">
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.images')
                                            </p>

                                            <v-media-images
                                                name="images"
                                                v-bind:allow-multiple="true"
                                                :uploaded-images="variant.images"
                                            ></v-media-images>
                                        </div>

                                        <!-- Actions -->
                                        <div
                                            class="mt-2.5 text-sm font-semibold text-gray-800"
                                            v-if="typeof variant.id !== 'string'"
                                        >
                                            @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.edit-info')

                                            <a
                                                :href="'{{ route('admin.catalog.products.edit', ':id') }}'.replace(':id', variant.id)" 
                                                class="inline-block text-blue-500 hover:text-navyBlue hover:underline"
                                                target="_blank"
                                            >
                                                @lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.edit.edit-link-title')
                                            </a>
                                        </div>
                                    </x-slot:content>
                                </x-marketplace::shop.drawer>
                            </form>
                        </x-marketplace::shop.form>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-product-variations', {
            template: '#v-product-variations-template',

            props: ['errors'],

            data () {
                return {
                    defaultId: parseInt('{{ $product->additional['default_variant_id'] ?? null }}'),

                    variants: @json($product->variants()->with(['attribute_family', 'images', 'inventories'])->get()),

                    superAttributes: @json($product->super_attributes()->with(['options', 'options.attribute', 'options.translations'])->get()),

                    selectedVariant: {
                        id: null,
                        name: '',
                        sku: '',
                        price: 0,
                        status: 1,
                        weight: 0,
                        inventories: {},
                        images: []
                    },
                }
            },

            methods: {
                addVariant(params, { resetForm }) {
                    let self = this;

                    let filteredVariants = this.variants.filter(function (variant) {
                        let matchCount = 0;

                        for (let key in params) {
                            if (variant[key] == params[key]) {
                                matchCount++;
                            }
                        }

                        return matchCount == self.superAttributes.length;
                    })

                    if (filteredVariants.length) {
                        this.$emitter.emit('add-flash', { type: 'warning', message: "@lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.create.variant-already-exists')" });

                        return;
                    }

                    const optionIds = Object.values(params);

                    this.variants.push(Object.assign({
                        id: 'variant_' + this.variants.length,
                        sku: '{{ $product->sku }}' + '-variant-' + optionIds.join('-'),
                        name: '',
                        price: 0,
                        status: 1,
                        weight: 0,
                        inventories: {},
                        images: []
                    }, params));

                    resetForm();

                    this.$refs.variantCreateModal.close();
                },

                removeVariant(variant) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.variants.splice(this.variants.indexOf(variant), 1);
                        },
                    });
                },
            }
        });

        app.component('v-product-variations-mass-action', {
            template: '#v-product-variations-mass-action-template',

            props: ['superAttributes', 'variants'],

            data: function () {
                return {
                    inventorySources: @json($inventorySources),

                    updateTypes: {
                        editPrices: {
                            key: 'editPrices',
                            title: "@lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.edit-prices')"
                        },

                        editInventories: {
                            key: 'editInventories',
                            title: "@lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.edit-inventories')"
                        },

                        addImages: {
                            key: 'addImages',
                            title: "@lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.add-images')",
                            images: []
                        },

                        removeImages: {
                            key: 'removeImages',
                            title: "@lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.remove-images')"
                        },

                        removeVariants: {
                            key: 'removeVariants',
                            title: "@lang('marketplace::app.shop.sellers.account.products.edit.types.configurable.mass-edit.remove-variants')"
                        }
                    },

                    selectedType: ''
                }
            },

            computed: {
                selectedVariants() {
                    return this.variants.filter(function(variant) {
                        variant.temp_images = [];

                        return variant.selected;
                    });
                }
            },

            methods: {
                usedAttributeOptions(attribute) {
                    const options = [];

                    for (const option of attribute.options) {
                        if (this.variants.some(variant => variant[attribute.code] === option.id)) {
                            if (! options.includes(option)) {
                                options.push(option);
                            }
                        }
                    }

                    return options;
                },

                selectAll() {
                    let isSelected = this.selectedVariants.length <= 0;

                    this.variants.forEach(function (variant) {
                        variant.selected = isSelected;
                    });
                },

                selectVariantsByAttributeOption(attribute, option) {
                    let self = this;

                    let isAttributeOptionChecked = self.isAttributeOptionChecked(attribute, option);

                    this.variants.forEach(function (variant) {
                        if (variant[attribute.code] == option.id) {
                            variant.selected = ! isAttributeOptionChecked;
                        }
                    });
                },

                isAttributeOptionChecked(attribute, option) {
                    let variants = this.variants.filter(function (variant) {
                        return variant[attribute.code] == option.id;
                    });

                    if (! variants.length) {
                        return false;
                    }
                    
                    let isSelected = true;

                    variants.forEach(function (variant) {
                        if (! variant.selected) {
                            isSelected = false;
                        }
                    });

                    return isSelected;
                },

                edit(type) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.selectedType = type;

                            if (['editPrices', 'editInventories', 'addImages'].includes(type)) {
                                this.$refs.updateVariantsDrawer.open();
                            } else {
                                this[this.selectedType]();
                            }
                        }
                    });
                },

                update(params) {
                    this[this.selectedType](params);

                    this.$refs.updateVariantsDrawer.close();
                },

                editPrices(params) {
                    this.selectedVariants.forEach(function (variant) {
                        variant.price = params?.price ?? params.variants[variant.id];

                        variant.selected = false;
                    });
                },

                editInventories(params) {
                    this.selectedVariants.forEach(function (variant) {
                        variant.inventories = params?.inventories ?? params.variants[variant.id];

                        variant.selected = false;
                    });
                },

                addImages(params) {
                    let self = this;

                    this.selectedVariants.forEach(function (variant) {
                        if (self.updateTypes.addImages.images.length) {
                            variant.images = variant.images.concat(self.updateTypes.addImages.images);
                        } else {
                            variant.images = variant.images.concat(variant.temp_images);

                            variant.temp_images = [];
                        }

                        variant.selected = false;
                    });

                    this.updateTypes.addImages.images = [];
                },

                removeImages() {
                    this.selectedVariants.forEach(function (variant) {
                        variant.images = [];

                        variant.selected = false;
                    });
                },

                removeVariants() {
                    let self = this;

                    this.selectedVariants.forEach(function (variant) {
                        if (variant.selected) {
                            let index = self.variants.indexOf(variant);

                            self.variants.splice(index, 1);
                        }
                    });
                },

                optionName: function (attribute, optionId) {
                    return attribute.options.find(function (option) {
                        return option.id == optionId;
                    })?.admin_name;
                },
            }
        });

        app.component('v-product-variation-item', {
            template: '#v-product-variation-item-template',

            props: [
                'variant',
                'attributes',
                'errors',
            ],

            data() {
                return {
                    inventorySources: @json($inventorySources),
                }
            },

            created() {
                let inventories = {};
                
                if (Array.isArray(this.variant.inventories)) {
                    this.variant.inventories.forEach(function (inventory) {
                        inventories[inventory.inventory_source_id] = inventory.qty;
                    });

                    this.variant.inventories = inventories; 
                }
            },

            mounted() {
                if (typeof this.variant.id === 'string' || this.variant.id instanceof String) {
                    this.$refs.editVariantDrawer.open();
                }
            },

            computed: {
                isDefault() {
                    return this.variant.id == this.$parent.defaultId;
                },

                totalQty() {
                    let totalQty = 0;

                    for (let key in this.variant.inventories) {
                        totalQty += parseInt(this.variant.inventories[key]);
                    }

                    return totalQty;
                }
            },

            watch: {
                variant: {
                    handler: function(newValue) {
                        let self = this;

                        setTimeout(function() {
                            self.setFiles();
                        })
                    },
                    deep: true
                }
            },

            methods: {
                optionName: function (attribute, optionId) {
                    return attribute.options.find(function (option) {
                        return option.id == optionId;
                    })?.admin_name;
                },

                update(params) {
                    Object.assign(this.variant, params);

                    this.$refs.editVariantDrawer.close();
                },

                setFiles() {
                    let self = this;

                    this.variant.images.forEach(function (image, index) {
                        if (image.file instanceof File) {
                            image.is_new = 1;

                            const dataTransfer = new DataTransfer();

                            dataTransfer.items.add(image.file);

                            self.$refs[self.$.uid + '_imageInput_' + index][0].files = dataTransfer.files;
                        } else {
                            image.is_new = 0;
                        }
                    });
                },

                remove: function () {
                    this.$emit('onRemoved', this.variant);
                },
            }
        });
    </script>
@endPushOnce