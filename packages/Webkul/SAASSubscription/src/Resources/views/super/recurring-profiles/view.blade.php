<x-saas::layouts>
    <!-- Title of the page -->
        <x-slot name="title">   
            @lang('saas_subscription::app.super.recurring-profiles.view.title', ['recurring_profile_id' => $recurringProfile->id])
        </x-slot>
    <div class="my-2">
        <x-admin::accordion>
            <!-- plan -->
            <x-slot:header>
                <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                    @lang('saas_subscription::app.super.recurring-profiles.view.plan-info')
                </p>
            </x-slot:header>
        
            <x-slot:content>
                    <div class="grid grid-cols-2 gap-2">
                        <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.plan') </p>
                            <p class="text-gray-600 dark:text-gray-300">
                                @if ($recurringProfile->type == 'trial')
                                    @lang('saas_subscription::app.super.recurring-profiles.view.plan-name', ['plan' => $recurringProfile->schedule_description])
                                @else
                                    {{ $recurringProfile->schedule_description }}
                                @endif
                            </p>
                        

                        @if ($recurringProfile->type != 'free')
                        <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.expiration-date') </p>
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ \Carbon\Carbon::parse($recurringProfile->cycle_expired_on)->format('Y-m-d h:i:a') }}
                            </p>
                       
                        @endif

                        @if ($recurringProfile->type != 'trial')
                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('saas_subscription::app.super.recurring-profiles.view.billing-amount')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ core()->formatPrice($recurringProfile->amount, config('app.currency')) }}
                            </p>

                            @if ($recurringProfile->type != 'free')
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas_subscription::app.super.recurring-profiles.view.billing-cycle')
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @if ($recurringProfile->period_unit == 'month')
                                        @lang('saas_subscription::app.super.recurring-profiles.view.monthly')
                                    @else
                                        @lang('saas_subscription::app.super.recurring-profiles.view.annual')
                                    @endif
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas_subscription::app.super.recurring-profiles.view.profile-id')
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $recurringProfile->reference_id }}
                                </p>
                            

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas_subscription::app.super.recurring-profiles.view.profile-state')
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $recurringProfile->state }}
                                </p>

                                @if ($recurringProfile->state == 'Active')
                                    <p class="text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.super.recurring-profiles.view.next-billing-date')
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ \Carbon\Carbon::parse($recurringProfile->next_due_date)->format('Y-m-d h:i:a') }}
                                    
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ __('saas_subscription::app.super.recurring-profiles.view.payment-status') }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ $recurringProfile->payment_status }}
                                    </p>
                                @endif

                                @if (! empty($plan->offer->offer_status))
                                    <p class="text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.super.recurring-profiles.view.offer-title')
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{$plan->offer->title}}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.super.recurring-profiles.view.offer-type')
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{$plan->offer->type}}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.super.recurring-profiles.view.offer-price')
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        @php
                                            if (
                                                $plan->offer->offer_status
                                                && $recurringProfile->period_unit != 'month'
                                            ) {
                                                if ($plan->offer->type == 'fixed') {
                                                    $plan->yearly_amount = $plan->yearly_amount - $plan->offer->price;
                                                } else {
                                                    $plan->yearly_amount = $plan->yearly_amount - ($plan->yearly_amount * ($plan->offer->price / 100));
                                                }

                                                echo core()->formatPrice($plan->yearly_amount, config('app.currency'));
                                            } else {
                                                if ($plan->offer->type == 'fixed') {
                                                    $plan->monthly_amount = $plan->monthly_amount - $plan->offer->price;
                                                } else {
                                                    $plan->monthly_amount = $plan->monthly_amount - ($plan->monthly_amount * ($plan->offer->price / 100));
                                                }

                                                echo core()->formatPrice($plan->monthly_amount, config('app.currency'));
                                            }
                                        @endphp
                                
                                    </p>
                                @endif
                            @endif
                        @endif
                    </div>
            </x-slot:content>
        </x-admin::accordion>
    </div>

    <div class="my-2">
        <x-admin::accordion>
            <!-- payment-details -->
            <x-slot:header>
                <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                    @lang('saas_subscription::app.super.recurring-profiles.view.payment-details')
                </p>
            </x-slot:header>

            <x-slot:content>
                <div class="grid grid-cols-2 gap-2">
                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.reference-id') </p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->reference_id ?? '--' }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.plan-state') </p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->state ?? '--' }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.plan-type') </p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->type ?? '--' }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.payment-status') </p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->payment_status ?? '--' }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.schedule-description') </p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->schedule_description ?? '--' }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.tin') </p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->tin ?? '--' }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.amount') </p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->amount ?? '--' }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.payment-method') </p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->payment_method ?? '--' }}
                    </p>

                </div>
            </x-slot:content>

        </x-admin::accordion>
    </div>

    <div class="my-2">
        <x-admin::accordion>
            <!-- payment-details -->
            <x-slot:header>
                <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                    @lang('saas_subscription::app.super.recurring-profiles.view.features')
                </p>
            </x-slot:header>

            <x-slot:content>
                <div class="grid grid-cols-2 gap-2">
                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.allowed-products') </p>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_products }}
                    </p>
                
                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.allowed-categories') </p>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_categories }}
                    </p>
                

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.allowed-attributes') </p>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_attributes }}
                    </p>
                

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.allowed-attribute-families') </p>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_attribute_families }}
                    </p>
                

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.allowed-channels') </p>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_channels }}
                    </p>
                

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.super.recurring-profiles.view.allowed-orders') </p>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_orders }}
                    </p>
                </div>

            </x-slot:content>

        </x-admin::accordion>
    </div>
   
</x-saas::layouts>