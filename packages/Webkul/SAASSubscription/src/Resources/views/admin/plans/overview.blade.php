<x-admin::layouts>

    <x-slot:title>
            @lang('saas_subscription::app.admin.plans.overview.title')
    </x-slot:title>

    {!! view_render_event('subscription.overview.tabs.before', ['recurringProfile' => $recurringProfile]) !!}
    <x-slot:content>
        
        <div class="my-2">
            <x-admin::accordion>
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.admin.plans.overview.plan-info')
                    </p>
                </x-slot:header>

                <x-slot:content>
                    <div class="grid grid-cols-2 gap-2">
                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.plan')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300 items-end">
                            @if ($recurringProfile->type == 'trial')
                                {{ __('saas_subscription::app.admin.invoices.plan-name', ['plan' => $recurringProfile->schedule_description]) }}
                            @else
                                {{ $recurringProfile->schedule_description }}
                            @endif
                        </p>

                        @if ($recurringProfile->type != 'free')
                            <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.expiration-date')</p>
                            
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ \Carbon\Carbon::parse($recurringProfile->cycle_expired_on)->format('Y-m-d h:i:a'); }}
                            </p>
                        @endif

                        @if ($recurringProfile->type != 'trial')
                            <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.billing-amount')</p>
                            
                            <p class="text-gray-600 dark:text-gray-300">
                            {{ core()->formatPrice($recurringProfile->amount, config('app.currency')) }}
                            </p>
                        @endif


                        @if ($recurringProfile->type != 'free')
                        
                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('saas_subscription::app.admin.plans.overview.billing-cycle')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @if ($recurringProfile->period_unit == 'month')
                                    @lang('saas_subscription::app.admin.plans.overview.monthly')
                                @else
                                    @lang('saas_subscription::app.admin.plans.overview.annual')
                                @endif
                            </p>
                            
                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('saas_subscription::app.admin.plans.overview.profile-id')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ $recurringProfile->reference_id }}
                            </p>
                        
                            @if ($recurringProfile->tin != '')
                                
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas_subscription::app.admin.plans.overview.tin')
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $recurringProfile->tin }}
                                </p>
                                
                            @endif
                            
                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('saas_subscription::app.admin.plans.overview.profile-state')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ $recurringProfile->state }}
                            </p>

                            @if ($recurringProfile->state == 'Active')
                            
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas_subscription::app.admin.plans.overview.next-billing-date') 
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($recurringProfile->next_due_date)->format('Y-m-d h:i:a'); }}
                                </p>
                            

                            
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas_subscription::app.admin.plans.overview.payment-status') 
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $recurringProfile->payment_status }}
                                </p>
                            
                            @endif

                            @if (
                                ! empty($plan) 
                                && $plan->offer->offer_status
                            )
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas_subscription::app.admin.plans.overview.offer.title') 
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{$plan->offer->title}}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas_subscription::app.admin.plans.overview.offer.type') 
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{$plan->offer->type}}
                                </p>
                            
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas_subscription::app.admin.plans.overview.offer.price') 
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @php

                                        $price = '';

                                        if (
                                            $plan->offer->offer_status
                                            && $recurringProfile->period_unit != 'month'
                                        ) {
                                            if ($plan->offer->type == 'fixed') {
                                                $plan->yearly_amount = $plan->yearly_amount - $plan->offer->price;
                                            } else {
                                                $plan->yearly_amount = $plan->yearly_amount - ($plan->yearly_amount * ($plan->offer->price / 100));
                                            }

                                            $price =  core()->formatPrice($plan->yearly_amount, config('app.currency'));
                                        } else {
                                            if ($plan->offer->type == 'fixed') {
                                                $plan->monthly_amount = $plan->monthly_amount - $plan->offer->price;
                                            } else {
                                                $plan->monthly_amount = $plan->monthly_amount - ($plan->monthly_amount * ($plan->offer->price / 100));
                                            }

                                            $price =  core()->formatPrice($plan->monthly_amount, config('app.currency'));
                                        }
                                    @endphp

                                    {{ $price }}

                                </p>
                            @endif
                        @endif
                    </div>
                    
                </x-slot:content>
            </x-admin::accordion>
        </div>

        <div class="my-2">
            <x-admin::accordion>
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.admin.plans.overview.payment-details')
                    </p>
                </x-slot:header>

                <x-slot:content>

                    <div class="grid grid-cols-2 gap-2">
                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.reference-id') </p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->reference_id ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.state') </p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->state ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.admin.plans.overview.type')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->type ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.admin.plans.overview.payment-status')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->payment_status ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.admin.plans.overview.schedule-description')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->schedule_description ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.admin.plans.overview.tin')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->tin ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.admin.plans.overview.amount')</p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->amount ?? '--' }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">  @lang('saas_subscription::app.admin.plans.overview.payment-method') </p>
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $paymentDetails->payment_method ?? '--' }}
                        </p>

                    </div>

                </x-slot:content>
            </x-admin::accordion>
        </div>

        <div class="my-2">
            <x-admin::accordion>
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.admin.plans.overview.features')
                    </p>
                </x-slot:header>

                <x-slot:content>

                <div class="grid grid-cols-2 gap-2">
                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.allowed-products') </p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_products }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.allowed-categories')</p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_categories }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.allowed-attributes')</p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_attributes }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.allowed-attribute-families')</p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_attribute_families }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.overview.allowed-channels')</p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_channels }}
                    </p>

                    <p class="text-gray-600 dark:text-gray-300"> @lang('saas_subscription::app.admin.plans.overview.allowed-orders')</p>
                    
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ $recurringProfile->purchased_plan->allowed_orders }}
                    </p>
                </div>

                </x-slot:content>
            </x-admin::accordion>
        </div>

        {{--  Extension Assignment  --}}
        @if ( company()->getSuperConfigData('subscription.payment.module.status') )
            <div class="my-2">
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                            @lang('saas_subscription::app.admin.plans.overview.assign-modules')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="grid grid-cols-2 gap-2">
                            @php
                                $planExtensions = $recurringProfile->assign_modules ? json_decode($recurringProfile->assign_modules, true) : [];
                            @endphp

                            @foreach ($planExtensions as $extension)
                                @php
                                    $separateName = explode(".", $extension);
                                    $extensionName = $separateName[0];
                                    if (! empty($separateName[2]) 
                                        && ($separateName[0] == 'sales' 
                                        || $separateName[0] == 'payment'
                                        )
                                    ) {
                                        $extensionName = $separateName[2];
                                    }
                                @endphp
                            
                                <div class="text-gray-600 dark:text-gray-300">
                                   @lang('saas_subscription::app.admin.plans.overview.text-bagisto', ['extension' => ucfirst($extensionName)])
                                </div>

                            @endforeach

                            @if ( empty($planExtensions))
                                <div class="text-gray-600 dark:text-gray-300">
                                   @lang('saas_subscription::app.admin.plans.overview.no-module-assign')
                                </div>
                            
                            @endif
                        </div>

                    </x-slot:content>
                </x-admin::accordion>
            </div>
        @endif

    {!! view_render_event('subscription.overview.tabs.before', ['recurringProfile' => $recurringProfile]) !!}
</x-admin::layouts>