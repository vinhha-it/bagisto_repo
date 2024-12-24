<x-saas::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('saas_subscription::app.super.subscriptions.plans.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas_subscription::app.super.subscriptions.plans.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('super.subscriptions.plans.index') }}"></x-admin::datagrid.export>

            <!-- Create New Pages Button -->
            @if (companyBouncer()->hasPermission('subscriptions.plans.create'))
                <a
                    href="{{ route('super.subscriptions.plans.create') }}"
                    class="primary-button"
                >
                    @lang('saas_subscription::app.super.subscriptions.plans.index.create-btn')
                </a>
            @endif
        </div>
    </div>

    {!! view_render_event('bagisto.super.subscriptions.pages.list.before') !!}

    <x-saas::datagrid src="{{ route('super.subscriptions.plans.index') }}"></x-saas::datagrid>
    
    {!! view_render_event('bagisto.super.subscriptions.pages.list.after') !!}

</x-saas::layouts>