 <v-product-links></v-product-links>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-product-links-template"
    >
        <div class="grid gap-8">
            <!-- Panel -->
            <div
                class="box-shadow relative rounded-xl border bg-white p-5"
                v-for="type in types"
            >
                <div class="mb-2.5 grid grid-cols-3 justify-items-end gap-5">
                    <div class="col-span-2 flex flex-col gap-2">
                        <p
                            class="text-base text-gray-800 font-semibold"
                            v-text="type.title"
                        >
                        </p>

                        <p
                            class="text-xs text-gray-500 font-medium"
                            v-text="type.info"
                        >
                        </p>
                    </div>
                    
                    <!-- Add Button -->
                    <div class="flex gap-x-1 items-center">
                        <div
                            class="secondary-button h-14"
                            @click="selectedType = type.key; $refs.productSearch.openDrawer()"
                        >
                            @lang('marketplace::app.shop.sellers.account.products.edit.links.add-btn')
                        </div>
                    </div>
                </div>

                <!-- Product Listing -->
                <div
                    class="grid"
                    v-if="addedProducts[type.key].length"
                >
                    <div
                        class="flex gap-2.5 justify-between py-4 border-b border-slate-300"
                        v-for="product in addedProducts[type.key]"
                    >
                        <!-- Hidden Input -->
                        <input
                            type="hidden"
                            :name="type.key + '[]'"
                            :value="product.id"
                        />

                        <!-- Information -->
                        <div class="flex gap-2.5">
                            <!-- Image -->
                            <div
                                class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded overflow-hidden"
                                :class="{'border border-dashed border-gray-300': ! product.images.length}"
                            >
                                <template v-if="! product.images.length">
                                    <img src="{{ bagisto_asset('images/product-placeholders/front.svg', 'marketplace') }}">
                                
                                    <p class="w-full absolute bottom-1.5 text-[6px] text-gray-400 text-center font-semibold">
                                        @lang('marketplace::app.shop.sellers.account.products.edit.links.image-placeholder')
                                    </p>
                                </template>
            
                                <template v-else>
                                    <img :src="product.images[0].url">
                                </template>
                            </div>

                            <!-- Details -->
                            <div class="grid gap-1.5 place-content-start">
                                <p
                                    class="text-base text-gray-800 font-semibold"
                                    v-text="product.name"
                                >
                                </p>

                                <p class="text-gray-600">
                                    @{{ "@lang('marketplace::app.shop.sellers.account.products.edit.links.sku')".replace(':sku', product.sku) }}
                                </p>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="grid gap-1 place-content-start text-right">
                            <p class="text-gray-800 font-semibold">
                                @{{ $shop.formatPrice(product.price) }}
                            </p>

                            <p
                                class="text-red-600 cursor-pointer transition-all hover:underline"
                                @click="remove(type.key, product)"
                            >
                                @lang('marketplace::app.shop.sellers.account.products.edit.links.delete')
                            </p>
                        </div>
                    </div>
                </div>

                <!-- For Empty Variations -->
                <div
                    class="grid gap-3.5 justify-center justify-items-center py-10 px-2.5"
                    v-else
                >
                    <!-- Placeholder Image -->
                    <img
                        src="{{ bagisto_asset('images/icon-add-product.svg', 'marketplace') }}"
                        class="w-20 h-20"
                    />

                    <!-- Add Variants Information -->
                    <div class="flex flex-col gap-1.5 items-center">
                        <p class="text-base text-gray-400 font-semibold">
                            @lang('marketplace::app.shop.sellers.account.products.edit.links.empty-title')
                        </p>

                        <p
                            class="text-gray-400"
                            v-text="type.empty_info"
                        >
                        </p>
                    </div>
                </div>
            </div>

            <!-- Product Search Blade Component -->
            <x-marketplace::shop.products.search
                ref="productSearch"
                ::added-product-ids="addedProductIds"
                @onProductAdded="addSelected($event)"
            />
        </div>
    </script>

    <script type="module">
        app.component('v-product-links', {
            template: '#v-product-links-template',

            data() {
                return {
                    currentProduct: @json($product),

                    selectedType: 'related_products',

                    types: [
                        {
                            key: 'related_products',
                            title: `@lang('marketplace::app.shop.sellers.account.products.edit.links.related-products.title')`,
                            info: `@lang('marketplace::app.shop.sellers.account.products.edit.links.related-products.info')`,
                            empty_info: `@lang('marketplace::app.shop.sellers.account.products.edit.links.related-products.empty-info')`,
                        }, {
                            key: 'up_sells',
                            title: `@lang('marketplace::app.shop.sellers.account.products.edit.links.up-sells.title')`,
                            info: `@lang('marketplace::app.shop.sellers.account.products.edit.links.up-sells.info')`,
                            empty_info: `@lang('marketplace::app.shop.sellers.account.products.edit.links.up-sells.empty-info')`,
                        }, {
                            key: 'cross_sells',
                            title: `@lang('marketplace::app.shop.sellers.account.products.edit.links.cross-sells.title')`,
                            info: `@lang('marketplace::app.shop.sellers.account.products.edit.links.cross-sells.info')`,
                            empty_info: `@lang('marketplace::app.shop.sellers.account.products.edit.links.cross-sells.empty-info')`,
                        }
                    ],

                    addedProducts: {
                        'up_sells': @json($product->up_sells()->with('images')->get()),

                        'cross_sells': @json($product->cross_sells()->with('images')->get()),

                        'related_products': @json($product->related_products()->with('images')->get())
                    },
                }
            },

            computed: {
                addedProductIds() {
                    let productIds = this.addedProducts[this.selectedType].map(product => product.id);

                    productIds.push(this.currentProduct.id);

                    return productIds;
                }
            },

            methods: {
                addSelected(selectedProducts) {
                    this.addedProducts[this.selectedType] = [...this.addedProducts[this.selectedType], ...selectedProducts];
                },

                remove(type, product) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.addedProducts[type] = this.addedProducts[type].filter(item => item.id !== product.id);
                        },
                    });
                },

                totalQty(product) {
                    let qty = 0;

                    product.inventories.forEach(inventory => {
                        qty += inventory.qty;
                    });

                    return qty;
                }
            }
        });
    </script>
@endPushOnce