<x-saas::layouts>
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('saas::app.super.settings.exchange-rates.index.title')
    </x-slot:title>

    {!! view_render_event('bagisto.super.settings.exchange_rates.create.before') !!}

    <v-super-exchange-rates>
        <div class="flex items-center justify-between">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('saas::app.super.settings.exchange-rates.index.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                 <!-- Create Button -->
                @if (companyBouncer()->hasPermission('settings.exchange_rates.create'))
                    <button
                        type="button"
                        class="primary-button"
                    >
                        @lang('saas::app.super.settings.exchange-rates.index.create-btn')
                    </button>
                @endif
            </div>
        </div>

        <!-- DataGrid Shimmer -->
        <x-admin::shimmer.datagrid/>
    </v-super-exchange-rates>

    {!! view_render_event('bagisto.super.settings.exchange_rates.create.after') !!}

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-super-exchange-rates-template"
        >
            <div class="flex items-center justify-between">
                <p class="text-xl font-bold text-gray-800 dark:text-white">
                    @lang('saas::app.super.settings.exchange-rates.index.title')
                </p>

                <div class="flex items-center gap-x-2.5">
                     <!-- Create Button -->
                    @if (companyBouncer()->hasPermission('settings.exchange_rates.create'))
                        <button
                            type="button"
                            class="primary-button"
                            @click="selectedExchangeRates=0;resetForm();$refs.exchangeRateUpdateOrCreateModal.toggle()"
                        >
                            @lang('saas::app.super.settings.exchange-rates.index.create-btn')
                        </button>
                    @endif
                </div>
            </div>

            <x-saas::datagrid
                :src="route('super.settings.exchange_rates.index')"
                ref="datagrid"
            >
                @php
                    $hasPermission = companyBouncer()->hasPermission('settings.exchange_rates.edit') || companyBouncer()->hasPermission('settings.exchange_rates.delete');
                @endphp

                <!-- DataGrid Header -->
                <template #header="{
                    isLoading,
                    available,
                    applied,
                    selectAll,
                    sort,
                    performAction,
                 }">
                    <template v-if="! isLoading">
                        <div class="row grid grid-cols-{{ $hasPermission ? '4' : '3' }} grid-rows-1 gap-2.5 items-center px-4 py-2.5 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold">
                            <div
                                class="flex cursor-pointer gap-2.5"
                                v-for="(columnGroup, index) in ['currency_exchange_id', 'currency_name', 'currency_rate']"
                            >

                                @if ($hasPermission)
                                    <label
                                        class="flex items-center gap-1 cursor-pointer select-none w-max"
                                        for="mass_action_select_all_records"
                                        v-if="! index"
                                    >
                                        <input
                                            type="checkbox"
                                            name="mass_action_select_all_records"
                                            id="mass_action_select_all_records"
                                            class="hidden peer"
                                            :checked="['all', 'partial'].includes(applied.massActions.meta.mode)"
                                            @change="selectAll"
                                        >

                                        <span
                                            class="text-2xl rounded-md cursor-pointer icon-uncheckbox"
                                            :class="[
                                                applied.massActions.meta.mode === 'all' ? 'peer-checked:icon-checked peer-checked:text-blue-600' : (
                                                    applied.massActions.meta.mode === 'partial' ? 'peer-checked:icon-checkbox-partial peer-checked:text-blue-600' : ''
                                                ),
                                            ]"
                                        >
                                        </span>
                                    </label>
                                @endif
                                
                                <p class="text-gray-600 dark:text-gray-300">
                                    <span class="[&>*]:after:content-['_/_']">
                                        <span
                                            class="after:content-['/'] last:after:content-['']"
                                            :class="{
                                                'text-gray-800 dark:text-white font-medium': applied.sort.column == columnGroup,
                                                'cursor-pointer hover:text-gray-800 dark:hover:text-white': available.columns.find(columnTemp => columnTemp.index === columnGroup)?.sortable,
                                            }"
                                            @click="
                                                available.columns.find(columnTemp => columnTemp.index === columnGroup)?.sortable ? sort(available.columns.find(columnTemp => columnTemp.index === columnGroup)): {}
                                            "
                                        >
                                            @{{ available.columns.find(columnTemp => columnTemp.index === columnGroup)?.label }}
                                        </span>
                                    </span>

                                    <!-- Filter Arrow Icon -->
                                    <i
                                        class="align-text-bottom text-base text-gray-800 ltr:ml-1.5 rtl:mr-1.5 dark:text-white"
                                        :class="[applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                        v-if="columnGroup.includes(applied.sort.column)"
                                    ></i>
                                </p>
                            </div>

                            <!-- Actions -->
                            @if ($hasPermission)
                                <p class="flex justify-end gap-2.5">
                                    @lang('saas::app.super.settings.exchange-rates.index.datagrid.actions')
                                </p>
                            @endif
                        </div>
                    </template>
        
                    <!-- Datagrid Head Shimmer -->
                    <template v-else>
                        <x-admin::shimmer.datagrid.table.head :isMultiRow="true" />
                    </template>
                </template>

                <!-- DataGrid Body -->
                <template #body="{
                    isLoading,
                    available,
                    applied,
                    selectAll,
                    sort,
                    performAction,
                 }">
                    <template v-if="! isLoading">
                        <div
                            v-for="record in available.records"
                            class="row grid items-center gap-2.5 border-b px-4 py-4 text-gray-600 transition-all hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950"
                            :style="'grid-template-columns: repeat(' + (record.actions.length ? 4 : 3) + ', 1fr);'"
                        >
                            <div class="flex items-center gap-2.5">
                                <p>
                                    <!-- Bulk Option -->
                                    @if ($hasPermission)
                                        <input
                                            type="checkbox"
                                            :name="`mass_action_select_record_${record.currency_exchange_id}`"
                                            :id="`mass_action_select_record_${record.currency_exchange_id}`"
                                            :value="record.currency_exchange_id"
                                            class="hidden peer"
                                            v-model="applied.massActions.indices"
                                            @change="setCurrentSelectionMode"
                                        >
        
                                        <label
                                            class="text-2xl rounded-md cursor-pointer icon-uncheckbox peer-checked:icon-checked peer-checked:text-blue-600"
                                            :for="`mass_action_select_record_${record.currency_exchange_id}`"
                                        >
                                        </label>
                                    @endif
                                </p>
                            
                                <!-- Id -->
                                <p v-text="record.currency_exchange_id"></p>
                            </div>
            
                            <!-- Status -->
                            <p v-text="record.currency_name"></p>
            
                            <!-- Email -->
                            <p v-text="record.currency_rate"></p>
            
                            <!-- Actions -->
                            <div class="flex justify-end">
                                <a @click="selectedExchangeRates=1; editModal(record.actions.find(action => action.index === 'edit')?.url)">
                                    <span
                                        :class="record.actions.find(action => action.index === 'edit')?.icon"
                                        class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 max-sm:place-self-center dark:hover:bg-gray-800"
                                    >
                                    </span>
                                </a>

                                <a @click="performAction(record.actions.find(action => action.index === 'delete'))">
                                    <span
                                        :class="record.actions.find(action => action.index === 'delete')?.icon"
                                        class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 max-sm:place-self-center dark:hover:bg-gray-800"
                                    >
                                    </span>
                                </a>
                            </div>
                        </div>
                    </template>
        
                    <!-- Datagrid Body Shimmer -->
                    <template v-else>
                        <x-admin::shimmer.datagrid.table.body :isMultiRow="true" />
                    </template>
                </template>
            </x-saas::datagrid>

            <!-- Exchange Rate Create Form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
                ref="modalForm"
            >
                <form
                    @submit="handleSubmit($event, updateOrCreate)"
                    ref="exchangeRateCreateForm"
                >
                    <!-- Modal -->
                    <x-admin::modal ref="exchangeRateUpdateOrCreateModal">
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                <span v-if="selectedExchangeRates">
                                    @lang('saas::app.super.settings.exchange-rates.index.create.title')
                                </span>

                                <span v-else>
                                    @lang('saas::app.super.settings.exchange-rates.index.edit.title')
                                </span>
                            </p>
                        </x-slot:header>

                        <!-- Modal Content -->
                        <x-slot:content>
                            {!! view_render_event('bagisto.super.settings.exchangerate.create.before') !!}

                            <x-admin::form.control-group.control
                                type="hidden"
                                name="id"
                                v-model="selectedExchangeRate.id"
                            >
                            </x-admin::form.control-group.control>

                            <!-- Currency Code -->
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label>
                                    @lang('saas::app.super.settings.exchange-rates.index.create.source-currency')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="base_currency"
                                    disabled
                                    :value="company()->getBaseCurrencyCode()"
                                >
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <!-- Target Currency -->
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.exchange-rates.index.create.target-currency')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="target_currency"
                                    rules="required"
                                    v-model="selectedExchangeRate.target_currency"
                                    :label="trans('saas::app.super.settings.exchange-rates.index.create.target-currency')"
                                >
                                    <!-- Default Option -->
                                    <option value="">
                                        @lang('saas::app.super.settings.exchange-rates.index.create.select-target-currency')
                                    </option>

                                    <option
                                        v-for="currency in currencies"
                                        :value="currency.id"
                                        :selected="currency.id == selectedExchangeRate.target_currency"
                                    >
                                        @{{ currency.name }}
                                    </option>

                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="target_currency"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Rate -->
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.exchange-rates.index.create.rate')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="rate"
                                    :value="old('rate')"
                                    rules="required"
                                    v-model="selectedExchangeRate.rate"
                                    :label="trans('saas::app.super.settings.exchange-rates.index.create.rate')"
                                    :placeholder="trans('saas::app.super.settings.exchange-rates.index.create.rate')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="rate"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </x-slot:content>

                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <div class="flex items-center gap-x-2.5">
                                <!-- Save Button -->
                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('saas::app.super.settings.exchange-rates.index.create.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </script>

        <script type="module">
            app.component('v-super-exchange-rates', {
                template: '#v-super-exchange-rates-template',


                data() {
                    return {
                        selectedExchangeRate: {},

                        selectedExchangeRates: 0,

                        currencies: @json($currencies),
                    }
                },

                methods: {
                    updateOrCreate(params, { resetForm, setErrors }) {
                        let formData = new FormData(this.$refs.exchangeRateCreateForm);

                        if (params.id) {
                            formData.append('_method', 'put');
                        }

                        this.$axios.post(params.id ? "{{ route('super.settings.exchange_rates.update')  }}" : "{{ route('super.settings.exchange_rates.store')  }}", formData)
                            .then((response) => {
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                this.$refs.exchangeRateUpdateOrCreateModal.close();

                                this.$refs.datagrid.get();

                                resetForm();
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },

                    editModal(url) {
                        this.$axios.get(url)
                            .then((response) => {
                                this.selectedExchangeRate = response.data.data.exchangeRate;

                                this.$refs.exchangeRateUpdateOrCreateModal.toggle();
                            })
                            .catch(error => [
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message })
                            ]);
                    },

                    resetForm() {
                        this.selectedExchangeRate = {};
                    }
                }
            })
        </script>
    @endPushOnce
</x-saas::layouts>
