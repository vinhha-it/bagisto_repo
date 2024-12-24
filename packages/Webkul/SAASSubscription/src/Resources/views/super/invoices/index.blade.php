<x-saas::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('saas_subscription::app.super.invoices.index.title')
    </x-slot:title>
    
    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas_subscription::app.super.invoices.index.title')
        </p>
    </div>
    
    {!! view_render_event('bagisto.super.subscriptions.invoice.list.before') !!}
    
    <x-saas::datagrid src="{{ route('super.subscriptions.invoices.index') }}"></x-saas::datagrid>
    
    {!! view_render_event('bagisto.super.subscriptions.invoice.list.after') !!}
    
</x-saas::layouts>