<div class="flex gap-1.5">
    @php
        $maxVisibleItems = 3;
        $items = $order->items->take($maxVisibleItems);
        $restCount = max($order->items->count() - $maxVisibleItems, 0);
    @endphp

    @foreach ($items as $item)
        @php
            $imageCount = $item->product?->images->count();
        @endphp

        <div class="relative">
            <div class="relativerounded h-[60px] max-h-[60px] w-full max-w-[60px]">
                @if ($imageCount > 0)
                    <img 
                        class="h-full w-full rounded" 
                        src="{{ $item->product->base_image_url }}"
                    >
                    <span class="bg-darkPink absolute bottom-px rounded-full px-1.5 text-xs font-bold text-white ltr:left-px rtl:right-px">{{ $imageCount }}</span>
                @else
                    <div class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert">
                        <img src="{{ bagisto_asset('images/product-placeholders/front.svg', 'admin') }}">
                        
                        <p class="absolute bottom-1.5 w-full text-center text-xs font-semibold text-gray-400"> 
                            @lang('admin::app.sales.invoices.view.product-image') 
                        </p>
                    </div>
                @endif
            </div>
        </div>
    @endforeach

        @if ($restCount >= 1)
            <div class="flex h-[65px] w-[65px] items-center rounded bg-gray-50 dark:bg-gray-800">
                <p class="px-1.5 py-1.5 text-center text-xs font-bold text-gray-600 dark:text-gray-300">
                    @lang('admin::app.sales.orders.index.datagrid.product-count', ['count' => $restCount])
                </p>
            </div>
        @endif
    </div>
</div>