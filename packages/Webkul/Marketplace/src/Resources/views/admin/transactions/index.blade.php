<x-marketplace::admin.layouts>
    <x-slot:title>
        @lang('marketplace::app.admin.transactions.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="py-2.5 text-xl font-bold text-gray-800 dark:text-white">
            @lang('marketplace::app.admin.transactions.index.title')
        </p>
    </div>

    <x-admin::datagrid src="{{ route('admin.marketplace.transactions.index') }}"></x-admin::datagrid>
</x-marketplace::admin.layouts>
