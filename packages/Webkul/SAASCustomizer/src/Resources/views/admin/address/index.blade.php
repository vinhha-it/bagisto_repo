<x-admin::layouts>
    <x-slot:title>
        @lang('saas::app.admin.tenant-address.index.title')
    </x-slot:title>

    <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            @lang('saas::app.admin.tenant-address.index.title')
        </p>

        <div class="flex gap-x-2.5 items-center">
            <a href="{{ route('admin.company.address.create') }}">
                <div class="primary-button">
                    @lang('saas::app.admin.tenant-address.index.create-btn')
                </div>
            </a>
        </div>        
    </div>

    {!! view_render_event('bagisto.saas.company.address.list.before') !!}

    <x-admin::datagrid src="{{ route('admin.company.address.index') }}"></x-admin::datagrid>

    {!! view_render_event('bagisto.saas.company.address.list.after') !!}

</x-admin::layouts>
