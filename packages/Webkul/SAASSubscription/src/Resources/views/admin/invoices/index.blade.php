<x-admin::layouts>

<x-slot:title>
        @lang('saas_subscription::app.admin.invoices.title')
</x-slot:title>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas_subscription::app.admin.invoices.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('admin.subscription.invoice.index') }}"></x-admin::datagrid.export>

        </div>
    </div>

    <x-admin::datagrid src="{{ route('admin.subscription.invoice.index') }}"></x-admin::datagrid>

</x-admin::layouts>
