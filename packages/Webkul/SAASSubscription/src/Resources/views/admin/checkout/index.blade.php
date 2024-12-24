<x-admin::layouts>
    <x-slot:title>
        @lang('saas_subscription::app.admin.checkout.title')
    </x-slot>

    <v-plan-checkout></v-plan-checkout>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-plan-checkout-template">
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form 
                    action="{{ route('admin.subscription.checkout.purchase') }}" 
                    method="post" 
                    @submit="onSubmit"
                    > 
                    @csrf()

                    <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
                        <p class="text-xl text-gray-800 dark:text-white font-bold">
                            @lang('saas_subscription::app.admin.checkout.title')
                        </p>

                        <div class="flex gap-x-2.5 items-center">
                            <a 
                                href="{{ route('admin.subscription.plan.index') }}" 
                                class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
                            > 
                                @lang('admin::app.account.edit.back-btn')
                            </a>
                        </div>
                    </div>

                    <div class="mt-3.5 grid grid-cols-2 gap-2 max-lg:grid-cols-1">
                        <div class="">
                            <x-admin::accordion class="p-1 mb-3">
                                <!-- header -->
                                <x-slot:header>
                                    <p class="text-base text-gray-800 dark:text-white font-semibold mb-4">
                                        @lang('saas_subscription::app.admin.checkout.payment-information')
                                    </p>
                                </x-slot:header>

                                <!-- body content -->
                                <x-slot:content>
                                    <div class="gap-4">
                                        <input type="hidden" name="allow_trail" id="allow_trail" v-model="allow_trail" />
                                        
                                        <x-admin::form.control-group class="w-full">
                                            <x-admin::form.control-group.label>
                                                @lang('saas_subscription::app.admin.checkout.plan')
                                            </x-admin::form.control-group.label>

                                            <x-admin::form.control-group.control
                                                type="select"
                                                id="plan"
                                                name="plan"
                                                @change="changePlan($event.target.value)"
                                                :label="trans('saas_subscription::app.admin.checkout.plan')"
                                                ::value="plans[period_unit][plan]?.id"
                                                
                                            >
                                                <option v-for="plan in plans[period_unit]" selected :value="plan.id">
                                                    @{{ plan.label }}
                                                </option>
                                                
                                            </x-admin::form.control-group.control>

                                            <x-admin::form.control-group.error control-name="plan" />
                                        </x-admin::form.control-group>

                                        <x-admin::form.control-group class="w-full">
                                            <x-admin::form.control-group.label>
                                                @lang('saas_subscription::app.admin.checkout.billing-cycle')
                                            </x-admin::form.control-group.label>

                                            <x-admin::form.control-group.control
                                                type="select"
                                                id="period_unit"
                                                name="period_unit"
                                                :label="trans('saas_subscription::app.admin.checkout.billing-cycle')"
                                                ::value="period_unit"
                                                @change="updatePrice($event.target.value)"
                                            >
                                                <option value="month">@lang('saas_subscription::app.admin.checkout.month')</option>
                                                <option value="year">@lang('saas_subscription::app.admin.checkout.year')</option>
                                            
                                            </x-admin::form.control-group.control>

                                            <x-admin::form.control-group.error control-name="period_unit" />
                                        </x-admin::form.control-group>

                                        <x-admin::form.control-group class="w-full">
                                            <x-admin::form.control-group.label>
                                                @lang('saas_subscription::app.admin.checkout.tin')
                                            </x-admin::form.control-group.label>

                                            <x-admin::form.control-group.control
                                                type="text"
                                                id="tin"
                                                name="tin"
                                                :label="trans('saas_subscription::app.admin.checkout.tin')"
                                            >
                                            </x-admin::form.control-group.control>
                                            
                                            <x-admin::form.control-group.error control-name="tin" />
                                        </x-admin::form.control-group>
                                    </div>
                                </x-slot:content>
                            </x-admin::accordion>

                            <x-admin::accordion class="p-1">
                                <!-- header -->
                                <x-slot:header>
                                    <p class="text-base text-gray-800 dark:text-white font-semibold mb-4">
                                        @lang('saas_subscription::app.admin.checkout.billing-address')
                                    </p>
                                </x-slot:header>

                                <!-- body content -->
                                <x-slot:content>
                                    <div class="gap-4">
                                        <div class="flex gap-4 max-sm:flex-wrap">
                                            <x-admin::form.control-group class="w-full">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('saas_subscription::app.admin.checkout.first-name')
                                                </x-admin::form.control-group.label>
                                            
                                                <x-admin::form.control-group.control
                                                    type="text"
                                                    id="address[first_name]"
                                                    name="address[first_name]"
                                                    rules="required"
                                                    :label="trans('saas_subscription::app.admin.checkout.first-name')"   
                                                >
                                                </x-admin::form.control-group.control>

                                                <x-admin::form.control-group.error control-name="address[first_name]" />
                                            </x-admin::form.control-group>
                                        </div>

                                        <div class="flex gap-4 max-sm:flex-wrap">
                                            <x-admin::form.control-group class="w-full">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('saas_subscription::app.admin.checkout.last-name')
                                                </x-admin::form.control-group.label>
                                            
                                                <x-admin::form.control-group.control
                                                    type="text"
                                                    id="address[last_name]"
                                                    name="address[last_name]"
                                                    rules="required"
                                                    :label="trans('saas_subscription::app.admin.checkout.last-name')"
                                                >
                                                </x-admin::form.control-group.control>

                                                <x-admin::form.control-group.error control-name="address[last_name]" />
                                            </x-admin::form.control-group>
                                        </div>

                                        <div class="flex gap-4 max-sm:flex-wrap">
                                            <x-admin::form.control-group class="w-full">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('saas_subscription::app.admin.checkout.email')
                                                </x-admin::form.control-group.label>
                                            
                                                <x-admin::form.control-group.control
                                                    type="text"
                                                    id="address[email]"
                                                    name="address[email]"
                                                    rules="required"
                                                    :label="trans('saas_subscription::app.admin.checkout.email')"
                                                >
                                                </x-admin::form.control-group.control>

                                                <x-admin::form.control-group.error control-name="address[email]" />
                                            </x-admin::form.control-group>
                                        </div>

                                        <div class="flex gap-4 max-sm:flex-wrap">
                                            <x-admin::form.control-group class="w-full">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('saas_subscription::app.admin.checkout.address1')
                                                </x-admin::form.control-group.label>
                                            
                                                <x-admin::form.control-group.control
                                                    type="text"
                                                    id="address[address1]"
                                                    name="address[address1]"
                                                    rules="required"
                                                    :label="trans('saas_subscription::app.admin.checkout.address1')"
                                                >
                                                </x-admin::form.control-group.control>

                                                <x-admin::form.control-group.error control-name="address[address1]" />
                                            </x-admin::form.control-group>
                                        </div>

                                        <div class="flex gap-4 max-sm:flex-wrap">
                                            <x-admin::form.control-group class="w-full">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('saas_subscription::app.admin.checkout.address2')
                                                </x-admin::form.control-group.label>
                                            
                                                <x-admin::form.control-group.control
                                                    type="text"
                                                    id="address[address2]"
                                                    name="address[address2]"
                                                    rules="required"
                                                    :label="trans('saas_subscription::app.admin.checkout.address2')"
                                                >
                                                </x-admin::form.control-group.control>

                                                <x-admin::form.control-group.error control-name="address[address2]" />
                                            </x-admin::form.control-group>
                                        </div>

                                        <div class="flex gap-4 max-sm:flex-wrap">
                                            <x-admin::form.control-group class="w-full">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('saas_subscription::app.admin.checkout.city')
                                                </x-admin::form.control-group.label>
                                            
                                                <x-admin::form.control-group.control
                                                    type="text"
                                                    id="address[city]"
                                                    name="address[city]"
                                                    rules="required"
                                                    :label="trans('saas_subscription::app.admin.checkout.city')"
                                                >
                                                </x-admin::form.control-group.control>

                                                <x-admin::form.control-group.error control-name="address[city]" />
                                            </x-admin::form.control-group>
                                        </div>

                                        <div class="flex gap-4 max-sm:flex-wrap">
                                            <x-admin::form.control-group class="w-full">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('saas_subscription::app.admin.checkout.postcode')
                                                </x-admin::form.control-group.label>
                                            
                                                <x-admin::form.control-group.control
                                                    type="text"
                                                    id="address[postcode]"
                                                    name="address[postcode]"
                                                    rules="required"
                                                    :label="trans('saas_subscription::app.admin.checkout.postcode')"
                                                >
                                                </x-admin::form.control-group.control>

                                                <x-admin::form.control-group.error control-name="address[postcode]" />
                                            </x-admin::form.control-group>
                                        </div>

                                        <div class="flex gap-4 max-sm:flex-wrap">
                                            <!-- Country Name -->
                                            <x-admin::form.control-group class="w-full">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('saas_subscription::app.admin.checkout.country')
                                                </x-admin::form.control-group.label>

                                                <x-admin::form.control-group.control
                                                    type="select"
                                                    name="address[country]"
                                                    rules="required"
                                                    v-model="addressData.country"
                                                    :label="trans('saas_subscription::app.admin.checkout.country')"
                                                >
                                                    @foreach (core()->countries() as $country)
                                                        <option 
                                                            {{ $country->code === config('app.default_country') ? 'selected' : '' }}  
                                                            value="{{ $country->code }}"
                                                        >
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </x-admin::form.control-group.control>

                                                <x-admin::form.control-group.error control-name="address[country]" />
                                            </x-admin::form.control-group>

                                            <!-- State Name -->
                                            <x-admin::form.control-group class="w-full">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('saas_subscription::app.admin.checkout.state')
                                                </x-admin::form.control-group.label>

                                                <template v-if="haveStates()">
                                                    <x-admin::form.control-group.control
                                                        type="select"
                                                        id="state"
                                                        name="address[state]"
                                                        rules="required"
                                                        ::value="addressData.state"
                                                        v-model="addressData.state"
                                                        :label="trans('saas_subscription::app.admin.checkout.state')"
                                                        :placeholder="trans('saas_subscription::app.admin.checkout.state')"
                                                    >
                                                        <option 
                                                            v-for='(state, index) in countryStates[addressData.country]'
                                                            :value="state.code"
                                                            v-text="state.default_name"
                                                        >
                                                        </option>
                                                    </x-admin::form.control-group.control>
                                                </template>

                                                <template v-else>
                                                    <x-admin::form.control-group.control
                                                        type="text"
                                                        name="address[state]"
                                                        v-model="addressData.state"
                                                        rules="required"
                                                        :label="trans('saas_subscription::app.admin.checkout.state')"
                                                        :placeholder="trans('saas_subscription::app.admin.checkout.state')"
                                                    />
                                                </template>

                                                <x-admin::form.control-group.error control-name="address[state]" />
                                            </x-admin::form.control-group>
                                        </div>
                                    </div>
                                </x-slot:content>
                            </x-admin::accordion>
                        </div>

                        <div>
                            <div class="w-full box-shadow rounded bg-white p-4 dark:bg-gray-900">
                                <div 
                                    v-if="period_unit == 'month'" 
                                    class="border-b-2 flex justify-between py-3"
                                    >
                                    <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.admin.checkout.month')
                                    </p>

                                    <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.admin.checkout.month')
                                    </p>
                                </div>
                                
                                <div v-else class="border-b-2 flex justify-between py-3">
                                    <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.admin.checkout.annual')
                                    </p>

                                    <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.admin.checkout.annual')
                                    </p>
                                </div>

                                <div class="border-b-2 flex justify-between py-3">
                                    <p class="!leading-5 text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.admin.checkout.plan')
                                    </p>

                                    <p class="!leading-5 text-gray-600 dark:text-white">
                                        @{{ plans[period_unit][plan]['name'] }}
                                    </p>
                                </div>

                                <div class="border-b-2 flex justify-between py-3">
                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        @lang('saas_subscription::app.admin.checkout.subtotal')
                                    </p>

                                    <p class="font-semibold !leading-5 text-gray-600 dark:text-gray-300">
                                        @{{ plans[period_unit][plan]['total'] }}
                                    </p>
                                </div>

                                <div class="py-3 flex justify-end">
                                    <button class="primary-button">
                                        @lang('saas_subscription::app.admin.plans.index.purchase')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </x-admin::form>
        </script>

        <script type="module">
            app.component('v-plan-checkout', {
                template: '#v-plan-checkout-template',

                data: function() {
                    return {
                        addressData: {},

                        plan: "{{ old('plan') ?? session()->get('subscription_cart.plan.id') }}",

                        plans: @json(app('Webkul\SAASSubscription\Helpers\Subscription')->getFormatedPlans()),

                        period_unit: 'month',

                        allow_trail: '{{ $isTrailAllowed }}',

                        country: '',

                        state: '',

                        countryStates: @json(core()->groupedStatesByCountries()),

                        address: [],
                    }
                },

                mounted() {
                    this.addressData = this.address;

                    this.addressData.address = this.addressData.address?.split('\n');
                },

                methods: {
                    haveStates() {
                        return !!this.countryStates[this.addressData.country]?.length;
                    },

                    changePlan($event) {
                        this.plan = $event;
                    },

                    updatePrice($event) {
                        this.period_unit = $event;
                    },
                },
            });
        </script>
    @endPushOnce
</x-admin::layouts>
