<x-admin::layouts>
    <x-slot:title>
            @lang('saas_subscription::app.admin.plans.history.title')
    </x-slot:title>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas_subscription::app.admin.plans.history.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('admin.subscription.plan.history.index') }}"></x-admin::datagrid.export>

        </div>
    </div>

    {!! view_render_event('bagisto.super.subscriptions.pages.list.before') !!}

    <x-admin::datagrid src="{{ route('admin.subscription.plan.history.index') }}"></x-admin::datagrid>

</x-admin::layouts>
