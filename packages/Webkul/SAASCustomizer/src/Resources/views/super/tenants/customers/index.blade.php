<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.tenants.customers.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas::app.super.tenants.customers.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('super.tenants.customers.index') }}"></x-admin::datagrid.export>
        </div>
    </div>

    {!! view_render_event('bagisto.super.tenants.customers.list.before') !!}

    <x-saas::datagrid :src="route('super.tenants.customers.index')" />

    {!! view_render_event('bagisto.super.tenants.customers.list.after') !!}

</x-saas::layouts>