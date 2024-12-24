<x-admin::layouts>

<x-slot:title>
        @lang('saas_subscription::app.admin.plans.index.title')
</x-slot:title>

@forelse ($plans as $plan)
<div class="my-1">
    <x-admin::accordion>
        <x-slot:header>
            <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                {{ $plan->name }}
            </p>
        </x-slot:header>

        <x-slot:content>
            <div class="grid grid-cols-2 gap-2">
                <p class="text-gray-600 dark:text-gray-300">Yearly</p>
                    @if ($plan->offer->offer_status)
                    <p class="text-gray-600 dark:text-gray-300">{{ core()->formatPrice($plan->yearly_amount, config('app.currency')) }}</p> 
                    @endif
                    @php 
                        if ($plan->offer->offer_status) {
                            if ($plan->offer->type == 'fixed') {
                                $plan->yearly_amount = $plan->yearly_amount - $plan->offer->price;
                            } else {
                                $plan->yearly_amount = $plan->yearly_amount - ($plan->yearly_amount * ($plan->offer->price / 100));
                            }
                        }
                    @endphp
                    <p class="text-gray-600 dark:text-gray-300">{{ core()->formatPrice($plan->yearly_amount, config('app.currency')) }}</p>

                <p class="text-gray-600 dark:text-gray-300">Monthly</p>
                @if ($plan->offer->offer_status)
                    <p class="text-gray-600 dark:text-gray-300">{{ core()->formatPrice($plan->monthly_amount, config('app.currency')) }}</p> 
                @endif
                @php 
                    if ($plan->offer->offer_status) {
                        if ($plan->offer->type == 'fixed') {
                            $plan->monthly_amount = $plan->monthly_amount - $plan->offer->price;
                        } else {
                            $plan->monthly_amount = $plan->monthly_amount - ($plan->monthly_amount * ($plan->offer->price / 100));
                        }
                    }
                @endphp
                <p class="text-gray-600 dark:text-gray-300">{{ core()->formatPrice($plan->monthly_amount, config('app.currency')) }}</p>
            </div>
            
            <x-admin::form
                :action="route('admin.subscription.plan.add-to-cart', $plan->id)"
                enctype="multipart/form-data"
            >
                @csrf()
                <div class="text-gray-800 dark:text-gray-800 my-2">@lang('saas_subscription::app.admin.plans.index.plan-description', ['amount' => '<b>' . core()->formatPrice($plan->monthly_amount, config('app.currency')) . '</b>'])</div>
                
                <div class="grid grid-cols-2 gap-2">
                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.index.allowed-products') </p>
                    <p class="text-gray-600 dark:text-gray-300">{{ $plan->allowed_products }}</p>
                   
                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.index.allowed-categories')</p>
                    <p class="text-gray-600 dark:text-gray-300">{{ $plan->allowed_categories }}</p>
                   
                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.index.allowed-attributes') </p>
                    <p class="text-gray-600 dark:text-gray-300">{{ $plan->allowed_attributes }}</p>

                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.index.allowed-attribute-families') </p>
                    <p class="text-gray-600 dark:text-gray-300">{{ $plan->allowed_attribute_families }}</p>

                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.index.allowed-channels') </p>
                    <p class="text-gray-600 dark:text-gray-300">{{ $plan->allowed_channels }}</p>
                    
                    <p class="text-gray-600 dark:text-gray-300">@lang('saas_subscription::app.admin.plans.index.allowed-orders') </p>
                    <p class="text-gray-600 dark:text-gray-300">{{ $plan->allowed_orders }}</p>
                   
                </div>
                
                
                {{--  Extension Assignment  --}}
                @if ( company()->getSuperConfigData('subscription.payment.module.status') )
                    @php
                        $planExtensions = $plan->modules ? json_decode($plan->modules, true) : [];
                    @endphp
                    <hr>
                    <p class="subscription-plan-section">
                        @lang('saas_subscription::app.admin.plans.index.allowed-modules')
                    </p>
                    
                    <ul>
                        @foreach ($planExtensions as $extension)
                            @php
                                $separateName = explode(".", $extension);
                                $extensionName = $separateName[0];
                                if ( isset($separateName[2]) && ($separateName[0] == 'sales' || $separateName[0] == 'payment')) {
                                    $extensionName = $separateName[2];
                                }
                            @endphp
                            <li> @lang('saas_subscription::app.admin.overview.text-bagisto', ['extension' => ucfirst($extensionName)])</li>
                        @endforeach
                    </ul>

                    @if ( empty($planExtensions))
                         @lang('saas_subscription::app.admin.plans.index.no-module-assign')
                    @endif
                @endif

                <button class="primary-button my-2">
                    @lang('saas_subscription::app.admin.plans.index.purchase')
                </button>
            </x-admin::form>
        </x-slot:content>
        
    </x-admin::accordion>
</div>

@empty
    <div class="plan-list align-center">
        <span>@lang('saas_subscription::app.admin.plans.index.plan-not-available')</span>
    </div>
@endforelse

</x-admin::layouts>
