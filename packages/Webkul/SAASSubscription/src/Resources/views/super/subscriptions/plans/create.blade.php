<x-saas::layouts>
    <!-- Title of the page -->
    <x-slot name="title">   
        @lang('saas_subscription::app.super.subscriptions.plans.create.add-title')
    </x-slot>

    <!-- Input Form -->
    <x-admin::form
        :action="route('super.subscriptions.plans.store')"
        enctype="multipart/form-data"
    >

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/super/companies') }}';"></i>
            @lang('saas_subscription::app.super.subscriptions.plans.create.add-title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <button 
                type="submit" 
                class="primary-button"
            >
                @lang('saas_subscription::app.super.subscriptions.plans.create.save-btn-title')
            </button>
        </div>
    </div>

    <div class="mt-4 flex gap-2.5">

    <!-- Left Section -->
    <div class="flex flex-1 flex-col gap-2 overflow-auto">
        @csrf

            {!! view_render_event('bagisto.super.subscription.plan.create.before') !!}

            <x-admin::accordion>
                <!-- General -->
                <x-slot:header>
                    <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                        @lang('saas_subscription::app.super.subscriptions.plans.create.general')
                    </p>
                </x-slot:header>
                <!-- body content -->
                <x-slot:content>
                    
                    <div class="gap-4">
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.code')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="code"
                                id="code"
                                rules="required"
                                :value="old('code')"
                                data-vv-as="'{{ __('saas_subscription::app.super.subscription.plans.create.code') }}'"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="code"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.name')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="name"
                                id="name"
                                rules="required"
                                :value="old('name')"
                                data-vv-as="'{{ __('saas_subscription::app.super.subscriptions.plans.create.name') }}'"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="name"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                        
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="description"
                                id="description"
                                rules="required"
                                value="{{ old('description') }}"
                                :label="trans('saas_subscription::app.super.subscriptions.plans.create.description')"
                                :placeholder="trans('saas_subscription::app.super.subscriptions.plans.create.description')"
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
                        @lang('saas_subscription::app.super.subscriptions.plans.create.billing-amount')
                    </p>
                </x-slot:header>
                
                <!-- body content -->
                <x-slot:content>
                    
                    <div class="gap-4">
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.monthly-amount')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="monthly_amount"
                                id="monthly_amount"
                                rules="required|min_value:0"
                                value="{{ old('monthly_amount') }}"
                                :label="trans('saas_subscription::app.super.subscriptions.plans.create.monthly-amount')"
                                :placeholder="trans('saas_subscription::app.super.subscriptions.plans.create.monthly-amount')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="monthly_amount"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                       
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.yearly-amount')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="yearly_amount"
                                id="yearly_amount"
                                rules="required|min_value:0"
                                value="{{ old('yearly_amount') }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.yearly-amount') }}&quot;"
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
                        @lang('saas_subscription::app.super.subscriptions.plans.create.plan-limitation')
                    </p>
                </x-slot:header>
                
                <!-- body content -->
                <x-slot:content> 
                    <div class="gap-4">
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.allowed-products')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_products"
                                id="allowed_products"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_products') }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.allowed-products') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_products"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>  
                    
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.allowed-categories')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_categories"
                                id="allowed_categories"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_categories') }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.allowed-categories') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_categories"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>    
                        
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.allowed-attributes')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_attributes"
                                id="allowed_attributes"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_attributes') }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.allowed-attributes') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_attributes"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group> 
                        
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.allowed-attribute-families')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_attribute_families"
                                id="allowed_attribute_families"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_attribute_families') }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.allowed-attribute-families') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_attribute_families"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group> 
                        
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.allowed-channels')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_channels"
                                id="allowed_channels"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_channels') }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.allowed-channels') }}&quot;"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="allowed_channels"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group> 
                            
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('saas_subscription::app.super.subscriptions.plans.create.allowed-orders')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="allowed_orders"
                                id="allowed_orders"
                                rules="required|numeric|min_value:1"
                                value="{{ old('allowed_orders') }}"
                                data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.allowed-orders') }}&quot;"
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
                        @lang('saas_subscription::app.super.subscriptions.plans.create.offers')
                    </p>
                </x-slot:header>

                <x-slot:content>
                    <div class="offer">
                        <div class="gap-4">
                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas_subscription::app.super.subscriptions.plans.create.offer-status')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="offer_status"
                                    rules="required"
                                    id="offer_status"
                                    v-model="offer_status"
                                    @change="handleOfferStatusChange"
                                    :label="trans('saas_subscription::app.super.subscriptions.plans.create.offer-status')"
                                    :placeholder="trans('saas_subscription::app.super.subscriptions.plans.create.offer-status')"
                                >
                                    <option value="1" {{ old('offer_status') ? 'selected' : '' }}>
                                        @lang('saas_subscription::app.super.subscriptions.plans.create.active')
                                    </option>
                                    
                                    <option value="0"  {{  old('offer_status') ? 'selected' : '' }}>
                                        @lang('saas_subscription::app.super.subscriptions.plans.create.inactive')
                                    </option>
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="offer_status"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group> 
                            
                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas_subscription::app.super.subscriptions.plans.create.offer-title')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="title"
                                    rules="required"
                                    id="title"
                                    value="{{ old('title') }}"
                                    data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.offer-title') }}&quot;"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="title"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>  

                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas_subscription::app.super.subscriptions.plans.create.type')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="type"
                                    rules="required"
                                    id="type"
                                    value="{{ old('type') }}"
                                    :label="trans('saas_subscription::app.super.subscriptions.plans.create.type')"
                                    :placeholder="trans('saas_subscription::app.super.subscriptions.plans.create.type')"
                                >
                                    <option value="discount" {{ old('type') == 'discount' ? 'selected' : '' }}>
                                        @lang('saas_subscription::app.super.subscriptions.plans.create.discount')
                                    </option>

                                    <option value="fixed"  {{  old('type') == 'fixed' ? 'selected' : '' }}>
                                        @lang('saas_subscription::app.super.subscriptions.plans.create.fixed')
                                    </option>
                                        
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="type"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>  

                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas_subscription::app.super.subscriptions.plans.create.price')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="price"
                                    rules="required"
                                    id="type"
                                    value="{{ old('price') }}"
                                    rules="numeric|max_value:100|min_value:1"
                                    data-vv-as="&quot;{{ __('saas_subscription::app.super.subscriptions.plans.create.price') }}&quot;" 
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

            {{--  Extension Assignment  --}}
                @if ( company()->getSuperConfigData('subscription.payment.module.status') )

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
                            allowed_products
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
                                    
                                    @foreach ((array) config('saas-extensions') as $extension)
                                        @php
                                            $separateName = explode(".", $extension);
                                            $extensionName = $separateName[0];
                                            if ( isset($separateName[2]) && ($separateName[0] == 'sales' || $separateName[0] == 'payment')) {
                                                $extensionName = $separateName[2];
                                            }
                                        @endphp

                                        <option value="{{ $extension }}">{{ ucfirst($extensionName) }}</option>
                                    @endforeach
                                    
                                    <x-slot name="error">
                                        <x-admin::form.control-group.error control-name="modules[]" />
                                    </x-slot>
                                </x-admin::form.control-group> 
                            </div>
                        </x-slot:content>
                    </x-admin::accordion>
                @endif

                {!! view_render_event('bagisto.super.subscription.plan.create.after') !!}
            </div>
        </div>
    </x-admin::form>

    @pushOnce('scripts')
        <script>
            Vue.component('offer', {
            template: '#offer-template',
                data() {
                    return {
                        offer_status: {{ old('offer_status') ?? 0 }},
                    };
                },
                mounted() {
                    this.handleOfferStatusChange();
                }, 
                methods: {
                    handleOfferStatusChange() {
                        if (this.offer_status == "1") {
                            this.$nextTick(() => {
                                const labels = document.querySelectorAll('.offer label');

                                labels.forEach(label => {
                                    label.classList.add('required');
                                });
                            });
                        } else {
                            this.$nextTick(() => {
                                const labels = document.querySelectorAll('.offer label');

                                const inputs = document.querySelectorAll('.offer input');

                                labels.forEach(label => {
                                    label.classList.remove('required');
                                });
                            });
                        }
                    }
                }
            });
        </script>
    @endPushOnce
</x-saas::layouts>
