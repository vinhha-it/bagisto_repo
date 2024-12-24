<x-saas::layouts>
    <!-- Title of the page -->
    <x-slot name="title">   
        @lang('saas_subscription::app.super.subscriptions.plans.edit.edit-title')
    </x-slot>

    <!-- Input Form -->
    <x-admin::form
        :action="route('super.subscriptions.plans.update', $plan->id)"
        method="POST"
        enctype="multipart/form-data"
    >

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/super/companies') }}';"></i>
            @lang('saas_subscription::app.super.subscriptions.plans.edit.edit-title')
        </p>
    
        <div class="flex items-center gap-x-2.5">
            <button 
                type="submit" 
                class="primary-button"
            >
                @lang('saas_subscription::app.super.subscriptions.plans.edit.save-btn-title')
            </button>
        </div>
    </div>

    <div class="mt-4 flex gap-2.5">

    <!-- Left Section -->
    <div class="flex flex-1 flex-col gap-2 overflow-auto">
        @csrf

        {!! view_render_event('bagisto.super.subscription.plan.edit.before', ['plan' => $plan]) !!}

            <x-admin::accordion>
                <!-- General -->
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.super.subscriptions.plans.edit.general')
                    </p>
                </x-slot:header>
                 <!-- body content -->
                 <x-slot:content>
                    
                    <div class="gap-4">
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.code')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="code"
                                id="code"
                                rules="required"
                                value="{{ old('code') ?: $plan->code }}"
                                data-vv-as="'{{ __('saas_subscription::app.super.subscriptions.plans.edit.code') }}'"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="code"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="name"
                                id="name"
                                rules="required"
                                value="{{ old('name') ?: $plan->name }}"
                                data-vv-as="'{{ __('saas_subscription::app.super.subscriptions.plans.edit.name') }}'"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="name"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="description"
                                id="description"
                                rules="required"
                                value="{{ old('description') ?: $plan->description }}"
                                :label="trans('saas_subscription::app.super.subscriptions.plans.edit.description')"
                                :placeholder="trans('saas_subscription::app.super.subscriptions.plans.edit.description')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="description"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </x-slot:content>
            </x-admin::accordion>

            <x-admin::accordion>
                <!-- Billing Amount -->
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.super.subscriptions.plans.edit.billing-amount')
                    </p>
                </x-slot:header>
                
                 <!-- body content -->
                 <x-slot:content>
                    
                    <div class="gap-4">
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.monthly-amount')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="monthly_amount"
                                id="monthly_amount"
                                rules="required|min_value:0"
                                value="{{ old('monthly_amount') ?: $plan->monthly_amount }}"
                                :label="trans('saas_subscription::app.super.subscriptions.plans.edit.monthly-amount')"
                                :placeholder="trans('saas_subscription::app.super.subscriptions.plans.edit.monthly-amount')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="monthly_amount"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                            
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.yearly-amount')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="yearly_amount"
                                id="yearly_amount"
                                rules="required|min_value:0"
                                value="{{ old('yearly_amount') ?: $plan->yearly_amount }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.edit.yearly-amount') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="yearly_amount"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </x-slot:content>
            </x-admin::accordion>
              
            <x-admin::accordion>
                <!-- Plan Limitation -->
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.super.subscriptions.plans.edit.plan-limitation')
                    </p>
                </x-slot:header>

                <!-- body content -->
                <x-slot:content> 
                    <div class="gap-4">
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.allowed-products')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_products"
                                id="allowed_products"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_products') ?: $plan->allowed_products }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.edit.allowed-products') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_products"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group> 
                     
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.allowed-categories')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_categories"
                                id="allowed_categories"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_categories') ?: $plan->allowed_categories }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.edit.allowed-categories') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_categories"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>   
                    
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.allowed-attributes')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_attributes"
                                id="allowed_attributes"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_attributes') ?: $plan->allowed_attributes }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.edit.allowed-attributes') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_attributes"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group> 
                            
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.allowed-attribute-families')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_attribute_families"
                                id="allowed_attribute_families"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_attribute_families') ?: $plan->allowed_attribute_families }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.edit.allowed-attribute-families') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_attribute_families"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                           
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.allowed-channels')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_channels"
                                id="allowed_channels"
                                rules="required|numeric|min_value:1"
                                value="{{ old('channels') ?: $plan->allowed_channels }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.edit.allowed-channels') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_channels"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group> 
                           
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.edit.allowed-orders')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_orders"
                                id="allowed_orders"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_orders') ?: $plan->allowed_orders }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.edit.allowed-orders') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_orders"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group> 
                    </div>
                </x-slot:content>
            </x-admin::accordion>   

            <x-admin::accordion>
                <!-- Offers -->
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.super.subscriptions.plans.edit.offers')
                    </p>
                </x-slot:header>
                
                <x-slot:content>
                    <div class="offer">
                        <div class="gap-4">
                            <input type="hidden" id="offer_id" name="offer_id" value="{{ $plan->offer->id }}">
                        
                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas_subscription::app.super.subscriptions.plans.edit.offer-status')
                                </x-admin::form.control-group.label>
                                        
                                <x-admin::form.control-group.control
                                    type="select"
                                    name="offer_status"
                                    rules="required"
                                    id="offer_status"
                                    :value="old('offer_status') ?? $plan->offer->offer_status"
                                    :label="trans('saas_subscription::app.super.subscriptions.plans.edit.offer-status')"
                                    :placeholder="trans('saas_subscription::app.super.subscriptions.plans.edit.offer-status')"
                                >
                                    @foreach ($dropdownOptions['offer_status'] as $key => $offerStatus)
                                        <option value="{{ $offerStatus }}" {{ $plan->offer->offer_status == $offerStatus ? 'selected' : '' }}>
                                            {{ ucfirst($key) }}
                                        </option>
                                    @endforeach
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="offer_status"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group> 

                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas_subscription::app.super.subscriptions.plans.edit.offer-title')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="title"
                                    rules="required"
                                    id="title"
                                    value="{{ old('title') ?? $plan->offer->title }}"
                                    data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.edit.offer-title') }}&quot;"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="title"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>  
                  
                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas_subscription::app.super.subscriptions.plans.edit.type')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="type"
                                    rules="required"
                                    id="type"
                                    :value="old('type') ?? $plan->offer->type"
                                    :label="trans('saas_subscription::app.super.subscriptions.plans.edit.type')"
                                    :placeholder="trans('saas_subscription::app.super.subscriptions.plans.edit.type')"
                                >
                                    @foreach ($dropdownOptions['types'] as $type)
                                        <option value="{{ $type }}" {{ $plan->offer->type == $type ? 'selected' : '' }}>
                                            {{ ucfirst($type) }}
                                        </option>
                                    @endforeach
                                      
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="type"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas_subscription::app.super.subscriptions.plans.edit.price')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="price"
                                    rules="required"
                                    id="type"
                                    value="{{ old('price') ?? $plan->offer->price }}"
                                    rules="numeric|max_value:100|min_value:1"
                                    data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.edit.price') }}&quot;" 
                                >
                        
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="price"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>  
                        </div>
                    </div>
                </x-slot:content>
            </x-admin::accordion>
            
            @if ( company()->getSuperConfigData('subscription.payment.module.status') )
            
                @php
                    $saasExtensions = config('saas-extensions') ?? []; 
                    
                    $allowExtensions = old('modules') ?? ($plan->modules ? json_decode($plan->modules, true) : []);
                @endphp

                <x-admin::accordion>
                <!-- General -->
                    <x-slot:header>
                        <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                            @lang('saas_subscription::app.super.subscriptions.plans.create.module-assignment')
                        </p>
                    </x-slot:header>
                    
                     <!-- body content -->
                    <x-slot:content>
                    
                        <div class="gap-4">
                            <x-admin::form.control-group>
                                <x-slot name="label" class="required">
                                    @lang('saas_subscription::app.super.subscriptions.plans.create.allowed-orders')
                                </x-slot>
                                
                                <x-slot name="control">
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="modules[]"
                                        id="modules[]"
                                        value="{{ old('modules[]') }}"
                                        data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.allow-modules') }}&quot;" multiple
                                    />
                                </x-slot>
                                
                                    @foreach ($saasExtensions as $extension)
                                        @php
                                            $separateName = explode(".", $extension);
                                            $extensionName = $separateName[0];
                                            if ( isset($separateName[2]) && ($separateName[0] == 'sales' || $separateName[0] == 'payment')) {
                                                $extensionName = $separateName[2];
                                            }
                                        @endphp

                                        <option value="{{ $extension }}" {{ in_array($extension, $allowExtensions) ? 'selected' : '' }}>{{ ucfirst($extensionName) }}</option>
                                    @endforeach
                                
                                <x-slot name="error">
                                    <x-admin::form.control-group.error control-name="modules[]" />
                                </x-slot>
                            </x-admin::form.control-group> 
                        </div>
                    </x-slot:content>
                </x-admin::accordion>
                @endif
                
                {!! view_render_event('bagisto.super.subscription.plan.edit.after', ['plan' => $plan]) !!}
                    
            </div>
        </div>
    </x-admin::form>

    @pushOnce('scripts')
        <script>
            Vue.component('offer', {
                template: '#offer-template',
                data() {
                    return {
                        
                    };
                },
              
                methods: {
                    
                }
            });
        </script>
    @endPushOnce
</x-saas::layouts>
