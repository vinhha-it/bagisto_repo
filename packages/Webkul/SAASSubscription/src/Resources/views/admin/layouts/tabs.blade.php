<div class="tabs">
    <div class="flex gap-4 mb-4 pt-2 border-b-2 max-sm:hidden dark:border-gray-800">
        <a href="{{ route('admin.subscription.plan.overview') }}">
            <div  @if (request()->route()->getName() == 'admin.subscription.plan.overview') class="pb-3.5 px-2.5 text-base font-medium text-gray-600 dark:text-gray-300 cursor-pointer" @endif>
                @lang('saas_subscription::app.admin.layouts.overview')
            </div>
        </a>

        <a href="{{ route('admin.subscription.plan.index') }}">
            <div  @if (in_array(request()->route()->getName(), ['admin.subscription.plan.index', 'admin.subscription.checkout.index'])) class="pb-3.5 px-2.5 text-base font-medium text-gray-600 dark:text-gray-300 cursor-pointer active" @endif>
                @lang('saas_subscription::app.admin.layouts.plans')
            </div>
        </a>

        <a href="{{ route('admin.subscription.invoice.index') }}">
            <div @if (in_array(request()->route()->getName(), ['admin.subscription.invoice.index', 'admin.subscription.invoice.view'])) class="pb-3.5 px-2.5 text-base font-medium text-gray-600 dark:text-gray-300 cursor-pointer active" @endif>
                @lang('saas_subscription::app.admin.layouts.invoices')
            </div>
        </a>
    </div>
</div>
