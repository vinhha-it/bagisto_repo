<x-marketplace::shop.layouts>
    <x-slot:title>
        @lang('marketplace::app.shop.sellers.account.products.edit.title')
    </x-slot:title>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-marketplace::shop.breadcrumbs name="seller_product_edit" />
    @endSection

    @php
        $currentChannel = core()->getRequestedChannel();

        $currentLocale = core()->getRequestedLocale();
    @endphp

    <x-marketplace::shop.form
        action="{{route('marketplace.account.products.update', $product->id)}}"
        enctype="multipart/form-data"
    >
        @method('PUT')

        <input
            type="hidden"
            name="channel"
            value="{{ $currentChannel->code }}"
        />

        <!-- Page Header -->
        <div class="grid gap-2.5">
            <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                <div class="grid gap-1.5">
                    <p class="text-2xl font-medium leading-6">
                        @lang('marketplace::app.shop.sellers.account.products.edit.title')
                    </p>
                </div>

                <div class="flex items-center gap-x-2.5">
                    <button class="primary-button px-5 py-2.5">
                        @lang('marketplace::app.shop.sellers.account.products.edit.save-btn')
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-3.5 flex gap-8 max-xl:flex-wrap">
            @foreach ($product->attribute_family->attribute_groups->groupBy('column') as $column => $groups)
                <div
                    @if ($column == 1) class="flex flex-1 flex-col gap-8 max-xl:flex-auto" @endif
                    @if ($column == 2) class="flex w-[360px] max-w-full flex-col gap-8 max-sm:w-full" @endif
                >
                    @foreach ($groups as $group)
                        @php
                            $customAttributes = $product->getEditableAttributes($group);
                        @endphp

                        @if (count($customAttributes))
                            <div class="box-shadow relative rounded-xl border bg-white p-5">
                                <p class="mb-4 text-base font-semibold text-gray-800">
                                    {{ $group->name }}
                                </p>

                                @foreach ($customAttributes as $attribute)
                                    @php
                                        if (
                                            ! $sellerProduct->is_approved
                                            && $attribute->code == 'status'
                                        ) {
                                            continue;
                                        }
                                    @endphp
                                    
                                    <x-marketplace::shop.form.control-group>
                                        <x-marketplace::shop.form.control-group.label class="!mt-5">
                                            {{ $attribute->admin_name . ($attribute->is_required ? '*' : '') }}
                                        </x-marketplace::shop.form.control-group.label>

                                        @include ('marketplace::shop.sellers.account.products.edit.controls', [
                                            'attribute' => $attribute,
                                            'product'   => $product,
                                        ])
            
                                        <x-marketplace::shop.form.control-group.error :control-name="$attribute->code" />
                                    </x-marketplace::shop.form.control-group>
                                @endforeach

                                @includeWhen($group->code == 'price', 'marketplace::shop.sellers.account.products.edit.price.group')

                                @includeWhen(
                                    $group->code == 'inventories' && ! $product->getTypeInstance()->isComposite(),
                                    'marketplace::shop.sellers.account.products.edit.inventories'
                                )

                                {!! view_render_event('bagisto.marketplace.seller.account.products.edit.form.' . $group->code . '.after', ['product' => $product]) !!}
                            </div>
                        @endif
                    @endforeach

                    @if ($column == 1)
                        <!-- Images View Blade File -->
                        @include('marketplace::shop.sellers.account.products.edit.images')

                        <!-- Videos View Blade File -->
                        @include('marketplace::shop.sellers.account.products.edit.videos')

                        <!-- Product Type View Blade File -->
                        @includeIf('marketplace::shop.sellers.account.products.edit.types.' . $product->type)

                        <!-- Related, Cross Sells, Up Sells View Blade File -->
                        @include('marketplace::shop.sellers.account.products.edit.links')

                        <!-- Include Product Type Additional Blade Files If Any -->
                        @foreach ($product->getTypeInstance()->getAdditionalViews() as $view)
                            @includeIf($view)
                        @endforeach
                    @else
                        <!-- Categories View Blade File -->
                        @include('marketplace::shop.sellers.account.products.edit.categories')
                    @endif
                </div>
            @endforeach
        </div>
    </x-marketplace::shop.form>    
</x-marketplace::shop.layouts>
