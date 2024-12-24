<v-product-variations :errors="errors"></v-product-variations>

@pushOnce('scripts')
    <!-- Variations Template -->
    <script type="text/x-template" id="v-product-variations-template">
        <!-- Panel Header -->
        <div class="mt-5 flex flex-wrap justify-between gap-2.5">
            <div class="flex flex-col gap-2">
                <p class="text-base font-semibold text-gray-800 dark:text-white">
                    @lang('marketplace::app.admin.sellers.assign-product.configurable.title')
                </p>
            </div>
        </div>

        <template v-if="variants.length">
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
                />
            </div>
        </template>
    </script>

    <!-- Variation Item Template -->
    <script type="text/x-template" id="v-product-variation-item-template"> 
        <div class="flex justify-between gap-2.5 border-b border-slate-300 py-6 dark:border-gray-800">

            <!-- Information -->
            <div class="flex gap-2.5">
                <!-- Form Hidden Fields -->
                <input type="hidden" :name="'variants[' + variant.id + '][price]'" :value="variant.price"/>

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

                <!-- Image -->
                <div
                    class="relative h-15 max-h-15 w-full max-w-15 overflow-hidden rounded"
                    :class="{'border border-dashed border-gray-300 dark:border-gray-800 dark:invert dark:mix-blend-exclusion': ! variant.images.length}"
                >
                    <template v-if="! variant.images.length">
                        <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                    
                        <p class="absolute bottom-1 w-full text-center text-[6px] font-semibold text-gray-400">
                            @lang('marketplace::app.admin.sellers.assign-product.configurable.image-placeholder')
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
                        class="font-semibold text-[16x] text-gray-800 dark:text-white"
                        v-text="variant.name ?? 'N/A'"
                    >
                    </p>

                    <p class="text-gray-600 dark:text-gray-300">
                        @{{ "@lang('marketplace::app.admin.sellers.assign-product.configurable.sku')".replace(':sku', variant.sku) }}
                    </p>

                    <div class="flex place-items-start gap-1.5">
                        <span
                            class="label-active"
                            v-if="isDefault"
                        >
                            Default
                        </span>

                        <p class="text-gray-600 dark:text-gray-300">
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
                <p class="font-semibold text-gray-800 dark:text-white">
                    @{{ $admin.formatPrice(variant.price) }}  
                </p>

                <p class="font-semibold text-gray-800 dark:text-white">
                    @{{ "@lang('marketplace::app.admin.sellers.assign-product.configurable.qty')".replace(':qty', totalQty) }}
                </p>

                <div class="flex gap-2.5">
                    <!-- Remove -->
                    <p
                        class="cursor-pointer text-red-600 transition-all hover:underline"
                        @click="remove"
                    >
                        @lang('marketplace::app.admin.sellers.assign-product.configurable.delete-btn')
                    </p>
                    
                    <!-- Edit -->
                    <div>
                        <p
                            class="cursor-pointer text-emerald-600 transition-all hover:underline"
                            @click="$refs.editVariantDrawer.open()"
                        >
                            @lang('marketplace::app.admin.sellers.assign-product.configurable.edit-btn')
                        </p>

                        <!-- Edit Drawer -->
                        <x-admin::form
                            v-slot="{ meta, errors, handleSubmit }"
                            as="div"
                        >
                            <form @submit="handleSubmit($event, update)">
                                <!-- Edit Drawer -->
                                <x-admin::drawer
                                    ref="editVariantDrawer"
                                    class="text-left"
                                >
                                    <!-- Drawer Header -->
                                    <x-slot:header>
                                        <div class="flex items-center justify-between">
                                            <p
                                                class="text-xl font-medium dark:text-white"
                                                v-text="variant.name ?? 'N/A'"
                                            >
                                            </p>

                                            <button class="primary-button mr-11 mt-1">
                                                @lang('marketplace::app.admin.sellers.assign-product.configurable.edit.save-btn')
                                            </button>
                                        </div>
                                    </x-slot:header>

                                    <!-- Drawer Content -->
                                    <x-slot:content>
                                        <x-admin::form.control-group>
                                            <x-admin::form.control-group.label class="required">
                                                @lang('marketplace::app.admin.sellers.assign-product.configurable.edit.price')
                                            </x-admin::form.control-group.label>
                
                                            <x-admin::form.control-group.control
                                                type="text"
                                                name="price"
                                                ::value="variant.price"
                                                ::rules="{required: true, decimal: true, min_value: 0}"
                                                :label="trans('marketplace::app.admin.sellers.assign-product.configurable.edit.price')"
                                            />
                
                                            <x-admin::form.control-group.error control-name="price" />
                                        </x-admin::form.control-group>

                                        <!-- Inventories -->
                                        <div class="mt-5 grid">
                                            <p class="mb-2.5 font-semibold text-gray-800 dark:text-white">
                                                @lang('marketplace::app.admin.sellers.assign-product.configurable.edit.quantities')
                                            </p>

                                            <x-admin::form.control-group
                                                class="mb-0"
                                                v-for='inventorySource in inventorySources'
                                            >
                                                <x-admin::form.control-group.label>
                                                    @{{ inventorySource.name }}
                                                </x-admin::form.control-group.label>

                                                <v-field
                                                    type="text"
                                                    :name="'inventories[' + inventorySource.id + ']'"
                                                    v-model="variant.inventories[inventorySource.id]"
                                                    class="flex min-h-10 w-full rounded-md border bg-white px-3 py-1.5 text-sm font-normal text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
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
                                            </x-admin::form.control-group>
                                        </div>

                                        <!-- Images -->
                                        <div class="mt-2.5">
                                            <p class="mb-2.5 font-semibold text-gray-800 dark:text-white">
                                                @lang('marketplace::app.admin.sellers.assign-product.configurable.edit.images')
                                            </p>

                                            <v-media-images
                                                name="images"
                                                v-bind:allow-multiple="true"
                                                :uploaded-images="variant.images"
                                            ></v-media-images>
                                        </div>
                                    </x-slot:content>
                                </x-admin::drawer>
                            </form>
                        </x-admin::form>
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
                    variants: @json($product->variants()->with(['attribute_family', 'images', 'inventories'])->get()),

                    superAttributes: @json($product->super_attributes()->with(['options', 'options.attribute', 'options.translations'])->get()),
                }
            },

            methods: {
                removeVariant(variant) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.variants.splice(this.variants.indexOf(variant), 1);
                        },
                    });
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
                    }).admin_name;
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