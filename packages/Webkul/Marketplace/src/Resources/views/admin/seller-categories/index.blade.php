<x-marketplace::admin.layouts>
    <x-slot:title>
        @lang('marketplace::app.admin.seller-categories.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="py-2.5 text-xl font-bold text-gray-800 dark:text-white">
            @lang('marketplace::app.admin.seller-categories.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            @if (bouncer()->hasPermission('marketplace.seller-categories.create'))
                <a 
                    href="{{ route('admin.marketplace.seller_categories.create') }}"
                    class="primary-button"
                >
                    @lang('marketplace::app.admin.seller-categories.index.create-btn')                  
                </a>
            @endif
        </div>
    </div>
    
    <x-admin::datagrid src="{{ route('admin.marketplace.seller_categories.index') }}"></x-admin::datagrid>
</x-marketplace::admin.layouts>
