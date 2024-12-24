<x-saas::layouts>
    <x-slot name="title">
        @lang('saas::app.super.tenants.view.title')
    </x-slot>

    <!-- Header -->
    <div class="grid">
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            {!! view_render_event('super.company.view.title.before', ['company' => $company]) !!}

            <div class="flex items-center gap-2.5">
                <p class="text-xl font-bold leading-6 text-gray-800 dark:text-white">
                    @lang('saas::app.super.tenants.view.heading', ['tenant_name' => $company->name])
                </p>

                <div>
                    @if ($company->is_active)
                        <span class="label-processing mx-1.5 text-sm">
                            @lang('saas::app.super.tenants.index.datagrid.active')    
                        </span>
                    @else
                        <span class="label-canceled mx-1.5 text-sm">
                            @lang('saas::app.super.tenants.customers.index.datagrid.inactive')
                        </span>
                    @endif
                </div>
            </div>

            {!! view_render_event('super.company.view.title.after', ['company' => $company]) !!}

            <v-assign-plans />

            <div class="flex items-center gap-x-2.5">

                @php $recurringProfile = app('Webkul\SAASSubscription\Helpers\Subscription')->getCurrentRecurringProfile($company); @endphp

                @if ($recurringProfile && $recurringProfile->state != 'Cancelled' && ! in_array($recurringProfile->type, ['trial', 'free', 'manual']))
                    {{--<a 
                        href="{{ route('super.subscription.plan.cancel', $recurringProfile->id) }}" 
                        class="btn btn-lg btn-black" 
                        v-alert:message="'{{ __('saas_subscription::app.super.plans.cancel-confirm-msg') }}'"
                    >
                        @lang('saas_subscription::app.super.plans.cancel-plan')
                    </a>--}}
                @endif
                
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
        <!-- Left Component -->
        <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">

            {!! view_render_event('super.company.view.tabs.before', ['company' => $company]) !!}

            <!-- Full Component -->
            <div class="flex w-full max-w-full flex-col gap-2 max-sm:w-full">
                
                <!-- Domain & cName Information -->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-basep-2.5 font-semibold text-gray-600 dark:text-gray-300">
                            @lang('saas::app.super.tenants.view.domain-information')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="flex w-full justify-start gap-5 pb-4">

                            {!! view_render_event('super.company.view.domain.before', ['company' => $company]) !!}

                            <div class="flex flex-col gap-y-1.5">
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.email-address')
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.phone')
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.mapped-domain')
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.cname-entry')
                                </p>
                            </div>
                    
                            <div class="flex flex-col gap-y-1.5">
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $company->email }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $company->details->phone ?? '-' }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $company->domain }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $company->cname ?? '-' }}
                                </p>
                            </div>

                            {!! view_render_event('super.company.view.domain.after', ['company' => $company]) !!}
                        </div>

                    </x-slot:content>
                </x-admin::accordion>
                
                <!-- Attributes & Attribute Families Information -->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-basep-2.5 font-semibold text-gray-600 dark:text-gray-300">
                            @lang('saas::app.super.tenants.view.attribute-information')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="flex w-full justify-start gap-5 pb-4">

                            {!! view_render_event('super.company.view.no_of_attributes.before', ['company' => $company]) !!}

                            <div class="flex flex-col gap-y-1.5">
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.no-of-attributes')
                                </p>
                            </div>
                    
                            <div class="flex flex-col gap-y-1.5">
                                {{-- Attribute Count --}}
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $aggregates['attributes'] }}
                                </p>
                            </div>
                            
                            {!! view_render_event('super.company.view.no_of_attributes.after', ['company' => $company]) !!}

                        </div>

                        <span class="block w-full border-b dark:border-gray-800"></span>

                        <div class="flex items-center justify-between">
                            <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                @lang('saas::app.super.tenants.view.attribute-family-information')
                            </p>
                        </div>

                        <div class="flex w-full justify-start gap-5">

                            {!! view_render_event('super.company.view.no_of_attribute_families.before', ['company' => $company]) !!}

                            <div class="flex flex-col gap-y-1.5">
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.no-of-attribute-families')
                                </p>
                            </div>
                    
                            <div class="flex flex-col gap-y-1.5">
                                {{-- Attribute Family Count --}}
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $aggregates['attribute_families'] }}
                                </p>
                            </div>
                            
                            {!! view_render_event('super.company.view.no_of_attribute_families.after', ['company' => $company]) !!}

                        </div>

                    </x-slot:content>
                </x-admin::accordion>
                
                <!-- Products Information -->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-basep-2.5 font-semibold text-gray-600 dark:text-gray-300">
                            @lang('saas::app.super.tenants.view.product-information')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="flex w-full justify-start gap-5">

                            {!! view_render_event('super.company.view.no_of_products.before', ['company' => $company]) !!}

                            <div class="flex flex-col gap-y-1.5">
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.no-of-products')
                                </p>
                            </div>
                    
                            <div class="flex flex-col gap-y-1.5">
                                {{-- Product Count --}}
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $aggregates['products'] }}
                                </p>
                            </div>
                            
                            {!! view_render_event('super.company.view.no_of_products.after', ['company' => $company]) !!}

                        </div>

                    </x-slot:content>
                </x-admin::accordion>
                
                <!-- Categories Information -->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-basep-2.5 font-semibold text-gray-600 dark:text-gray-300">
                            @lang('saas::app.super.tenants.view.category-information')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="flex w-full justify-start gap-5">

                            {!! view_render_event('super.company.view.no_of_categories.before', ['company' => $company]) !!}

                            <div class="flex flex-col gap-y-1.5">
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.no-of-categories')
                                </p>
                            </div>
                    
                            <div class="flex flex-col gap-y-1.5">
                                {{-- Category Count --}}
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $aggregates['categories'] }}
                                </p>
                            </div>
                            
                            {!! view_render_event('super.company.view.no_of_categories.after', ['company' => $company]) !!}

                        </div>

                    </x-slot:content>
                </x-admin::accordion>
                
                <!-- Customers & Customer Groups Information -->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-basep-2.5 font-semibold text-gray-600 dark:text-gray-300">
                            @lang('saas::app.super.tenants.view.customer-information')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="flex w-full justify-start gap-5 pb-4">

                            {!! view_render_event('super.company.view.no_of_customers.before', ['company' => $company]) !!}

                            <div class="flex flex-col gap-y-1.5">
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.no-of-customers')
                                </p>
                            </div>
                    
                            <div class="flex flex-col gap-y-1.5">
                                {{-- Customer Count --}}
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $aggregates['customers'] }}
                                </p>
                            </div>
                            
                            {!! view_render_event('super.company.view.no_of_customers.after', ['company' => $company]) !!}

                        </div>

                        <span class="block w-full border-b dark:border-gray-800"></span>

                        <div class="flex items-center justify-between">
                            <p class="py-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                                @lang('saas::app.super.tenants.view.customer-group-information')
                            </p>
                        </div>

                        <div class="flex w-full justify-start gap-5">

                            {!! view_render_event('super.company.view.no_of_customer_groups.before', ['company' => $company]) !!}

                            <div class="flex flex-col gap-y-1.5">
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.no-of-customer-groups')
                                </p>
                            </div>
                    
                            <div class="flex flex-col gap-y-1.5">
                                {{-- Customer Group Count --}}
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $aggregates['customer_groups'] }}
                                </p>
                            </div>
                            
                            {!! view_render_event('super.company.view.no_of_customer_groups.after', ['company' => $company]) !!}

                        </div>

                    </x-slot:content>
                </x-admin::accordion>
            </div>

            {!! view_render_event('super.company.view.tabs.after', ['company' => $company]) !!}
        </div>

        <!-- Right Component -->
        <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">

            <!-- Addresses listing-->
            <x-admin::accordion>
                <x-slot:header>
                    <div class="flex items-center justify-between p-1.5">
                        <p class="text-base font-semibold text-gray-800 dark:text-white">
                            @lang('saas::app.super.tenants.view.addresses', ['count' => count($company->addresses)])
                        </p>
                    </div>
                </x-slot>

                <x-slot:content>
                    @if (count($company->addresses))
                        @foreach ($company->addresses as $index => $address)
                            <div class="grid gap-y-2.5">

                                <p class="font-semibold text-gray-800 dark:text-white">
                                    {{ $company->details->name }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $address->address1 }},
                                    {{ $address->address2 }},

                                    {{ $address->city }},
                                    {{ $address->state }},
                                    {{ core()->country_name($address->country) }}

                                    @if($address->postcode)
                                        ({{ $address->postcode }})
                                    @endif
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('saas::app.super.tenants.view.phone', ['phone' => $address->phone ?? 'N/A'])
                                </p>
                            </div>

                            @if ($index < count($company->addresses) - 1)
                                <span class="mb-4 mt-4 block w-full border-b dark:border-gray-800"></span>
                            @endif
                        @endforeach
                    @else
                        <!-- Empty Address Container -->
                        <div class="flex items-center gap-5 py-2.5">
                            <img
                                src="{{ bagisto_asset('images/settings/address.svg', 'admin') }}"
                                class="h-20 w-20 dark:mix-blend-exclusion dark:invert"
                            >

                            <div class="flex flex-col gap-1.5">
                                <p class="text-base font-semibold text-gray-400">
                                    @lang('saas::app.super.tenants.view.empty-title')
                                </p>

                                <p class="text-gray-400">
                                    @lang('saas::app.super.tenants.view.empty-description')
                                </p>
                            </div>
                        </div>
                    @endif
                </x-slot>
            </x-admin::accordion>
        </div>
    </div>
    
    
    
@pushOnce('scripts')
    <script type="text/x-template" id="v-assign-plans-template">  
        <div>
            <div class="flex items-center gap-x-2.5">
                <button
                    type="button"
                    class="primary-button"
                    @click="$refs.assignPlanModal.toggle()"
                >
                    @lang('saas_subscription::app.super.plans.assign-plan')
                </button>

                <a
                    href="{{ route('super.tenants.companies.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('saas::app.super.tenants.index.create.back-btn')
                </a>
            </div>
            <x-admin::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                    >
                <form @submit="handleSubmit($event, create)">
                    <!-- Plan Create Modal -->
                    <x-admin::modal ref="assignPlanModal">
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p class="text-lg text-gray-800 dark:text-white font-bold">
                                @lang('saas_subscription::app.super.plans.assign-plan')
                            </p>
                        </x-slot>

                        <!-- Modal Content -->
                        <x-slot:content>
                            <div class="flex gap-4 max-sm:flex-wrap">
                                <!-- Plan -->
                                <x-admin::form.control-group class="w-full">
                                    <x-admin::form.control-group.label>
                                        @lang('saas_subscription::app.super.plans.plan')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="select"
                                        id="plan"
                                        name="plan"
                                        :label="trans('saas_subscription::app.super.plans.plan')"
                                        
                                    >

                                    @foreach (app('Webkul\SAASSubscription\Repositories\PlanRepository')->where('status', 1)->get() as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                    @endforeach
                                    
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="customer_group_id" />
                                </x-admin::form.control-group>

                                <!-- Plan Unit -->
                                <x-admin::form.control-group class="w-full">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas_subscription::app.super.plans.period-unit')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="select"
                                        id="period_unit"
                                        name="period_unit"
                                        rules="required"
                                        :label="trans('saas_subscription::app.super.plans.period-unit')"
                                    >
                                        <option value="month">
                                            @lang('saas_subscription::app.super.plans.month')
                                        </option>

                                        <option value="year">
                                            @lang('saas_subscription::app.super.plans.year')
                                        </option>

                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="period_unit" />
                                </x-admin::form.control-group>

                            </div>

                        </x-slot>

                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <!-- Modal Submission -->
                            <div class="flex gap-x-2.5 items-center">
                                <!-- Save Button -->
                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('saas_subscription::app.super.plans.assign')
                                </button>
                            </div>
                        </x-slot>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </div>     
    </script>

    <script type="module">
            app.component('v-assign-plans', {
            template: '#v-assign-plans-template',
            data() {
                return {

                };
            },
            methods: {
                create(params, { resetForm, setErrors }) {
                    this.$axios.post("{{  route('super.subscriptions.plans.assign', $company->id) }}", params)
                        .then((response) => {
                           
                            this.$refs.assignPlanModal.close();

                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                            resetForm();
                        })
                        .catch(error => {
                            if (error.response.status ==422) {
                                this.$emitter.emit('add-flash', { type: 'error', message: 'Manual plan need at least one recurring profile.' });
                                this.$refs.assignPlanModal.close();
                                //setErrors(error.response.data.errors);
                            }
                        });
                }
            }
        });
    </script>
@endPushOnce
</x-saas::layouts>