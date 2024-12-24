@php $subscriptionHelper = app('Webkul\SAASSubscription\Helpers\Subscription');  @endphp

@if ($subscriptionHelper->isServiceStopped())
    @if (! in_array(request()->route()->getName(), [
        'admin.subscription.plan.overview',
        'admin.subscription.plan.index',
        'admin.subscription.checkout.index',
        'admin.subscription.invoice.index',
        'admin.subscription.invoice.view',
    ]))
    @if (Auth::guard('admin')->check())
        <v-service-stopped></v-service-stopped>
    @endif
        @pushOnce('scripts')
            @php $recurringProfile = $subscriptionHelper->getCurrentRecurringProfile();
            @endphp
                <script type="text/x-template" id="v-service-stopped-template">
                    <x-admin::modal ref="serviceStopModal">
                        <!-- Modal Header -->
                        @if (! $recurringProfile)
                            <x-slot:header>
                                <p class="text-lg text-gray-800 dark:text-white font-bold">
                                    @lang('saas_subscription::app.admin.layouts.purchase-plan-heading')
                                </p>
                            </x-slot>
                            <!-- Modal Content -->
                            <x-slot:content>
                                <div class="flex gap-10 max-sm:flex-wrap">
                                    <p>
                                        {{ __('saas_subscription::app.admin.layouts.purchase-plan-notification') }}
                                    </p>
                                </div>
                            </x-slot>
                        @elseif ($recurringProfile->type == 'trial')

                            <x-slot:header>
                                <p class="text-lg text-gray-800 dark:text-white font-bold">
                                    @lang('saas_subscription::app.admin.layouts.trial-expired-heading')
                                </p>
                            </x-slot>
                            <!-- Modal Content -->
                            <x-slot:content>
                                <div class="flex gap-10 max-sm:flex-wrap">
                                    <p>
                                        {{ __('saas_subscription::app.admin.layouts.trial-expired-notification', ['date' => $recurringProfile->cycle_expired_on]) }}
                                    </p>
                                </div>
                            </x-slot>

                        @elseif ($recurringProfile->state == "Cancelled")
                            <x-slot:header>
                                <p class="text-lg text-gray-800 dark:text-white font-bold">
                                    @lang('saas_subscription::app.admin.layouts.subscription-stopped-heading')
                                </p>
                            </x-slot>
                            <!-- Modal Content -->
                            <x-slot:content>
                                <div class="flex gap-10 max-sm:flex-wrap">
                                    <p>
                                        {{ __('saas_subscription::app.admin.layouts.subscription-stopped-notification', ['date' => $recurringProfile->cycle_expired_on]) }}
                                    </p>
                                </div>
                            </x-slot>

                        @elseif ($recurringProfile->state == "Suspending")
                            <x-slot:header>
                                <p class="text-lg text-gray-800 dark:text-white font-bold">
                                    @lang('saas_subscription::app.admin.layouts.subscription-suspended-heading')
                                </p>
                            </x-slot>
                            <!-- Modal Content -->
                            <x-slot:content>
                                <div class="flex gap-10 max-sm:flex-wrap">
                                    <p>
                                        {{ __('saas_subscription::app.admin.layouts.subscription-suspended-notification') }}
                                    </p>
                                </div>
                            </x-slot>
                        @else
                        <x-slot:header>
                                <p class="text-lg text-gray-800 dark:text-white font-bold">
                                    @lang('saas_subscription::app.admin.layouts.payment-due-heading')
                                </p>
                            </x-slot>
                            <!-- Modal Content -->
                            <x-slot:content>
                                <div class="flex gap-10 max-sm:flex-wrap">
                                    <p>
                                        {{ __('saas_subscription::app.admin.layouts.payment-due-notification') }}
                                    </p>
                                </div>
                            </x-slot>

                        @endif
                        <x-slot:footer>
                            <a href="{{ route('admin.subscription.plan.index') }}" class="w-28 h-10 p-2 cursor-pointer bg-blue-600 text-white">
                                {{ __('saas_subscription::app.admin.layouts.choose-plan') }}
                            </a>
                        </x-slot>
                        
                    </x-admin::modal>
                </script>

                <script type="module">
                    app.component('v-service-stopped', {
                        template: '#v-service-stopped-template',
                        
                        mounted() {
                            this.$refs.serviceStopModal.toggle();
                        }
                    });
                </script>
        @endPushOnce
    @endif
@endif