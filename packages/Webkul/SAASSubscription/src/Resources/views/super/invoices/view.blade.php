<x-saas::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('saas_subscription::app.super.invoices.view.title', ['invoice_id' => $invoice->id])
    </x-slot>
    <div class="flex gap-2.5 mt-3.5 max-xl:flex-wrap">
        <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">
            <x-admin::accordion>
                <!-- invoice-and-account -->
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.super.invoices.view.invoice-and-account')
                    </p>
                </x-slot:header>

                <x-slot:content>
                    <div class="grid grid-cols-2 gap-2">
                        <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.invoices.view.invoice-id') </p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            #{{ $invoice->id }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.profile-id') </p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $invoice->recurring_profile->reference_id }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.invoice-date')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $invoice->created_at }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.invoice-status')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $invoice->status }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.customer-name')</p>
                            
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $invoice->customer_name }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.customer-email')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $invoice->customer_email }}
                        </p>

                    </div>
                </x-slot:content>
            </x-admin::accordion>

            <x-admin::accordion>
                <!-- payment-details -->
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.super.invoices.view.payment-detail')
                    </p>
                </x-slot:header>

                <x-slot:content>

                    <div class="grid grid-cols-2 gap-2">
                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.payment-detail') </p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            #{{ $paymentDetails->reference_id ?? '--'  }} 
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.payment-state') </p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->state ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.payment-type') </p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->type ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.payment-status')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->payment_status ?? '--'  }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.schedule-description')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->schedule_description ?? '--'  }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.tin')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->tin ?? '--'  }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.amount')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->amount ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.payment-method')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->payment_method ?? '--' }}
                        </p>

                    </div>

                </x-slot:content>
            </x-admin::accordion>
        </div>

        <div class="flex flex-col gap-2 w-[360px] max-w-full max-sm:w-full">
           <x-admin::accordion>
                    <!-- plan-info -->
                    <x-slot:header>
                        <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                            @lang('saas_subscription::app.super.invoices.view.plan-information')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.sku') </p>
                            
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ $invoice->purchased_plan->code }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.plan') </p>
                            
                            <p class="text-gray-600 dark:text-gray-300">
                                @if ($invoice->recurring_profile->type == 'trial')
                                    @lang('saas_subscription::app.super.invoices.plan-name', ['plan' => $invoice->purchased_plan->name])
                                @else
                                    {{ $invoice->purchased_plan->name }}
                                @endif
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.expiration-date') </p>
                            
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ $invoice->cycle_expired_on }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.super.invoices.view.grand-total') </p>
                            
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ core()->formatPrice($invoice->grand_total, config('app.currency')) }}
                            </p>

                        </div>
                    </x-slot:content>
            </x-admin::accordion>
        </div>
    </div>

</x-saas::layouts>