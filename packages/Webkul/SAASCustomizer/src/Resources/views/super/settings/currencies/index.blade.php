<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.settings.currencies.index.title')
    </x-slot:title>

    {!! view_render_event('bagisto.super.settings.currencies.create.before') !!}

    <v-super-currencies>
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('saas::app.super.settings.currencies.index.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <!-- Craete currency Button -->
                @if (companyBouncer()->hasPermission('settings.currencies.create'))
                    <button 
                        type="button"
                        class="primary-button"
                    >
                        @lang('saas::app.super.settings.currencies.index.create-btn')
                    </button>
                @endif
            </div>
        </div>

        {{-- DataGrid Shimmer --}}
        <x-admin::shimmer.datagrid/>
    </v-super-currencies>

    {!! view_render_event('bagisto.super.settings.currencies.create.after') !!}

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-super-currencies-template"
        >
            <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                <p class="text-xl font-bold text-gray-800 dark:text-white">
                    @lang('saas::app.super.settings.currencies.index.title')
                </p>

                <div class="flex items-center gap-x-2.5">
                    <!-- Craete currency Button -->
                    @if (companyBouncer()->hasPermission('settings.currencies.create'))
                        <button 
                            type="button"
                            class="primary-button"
                            @click="selectedCurrencies=0; resetForm();$refs.currencyUpdateOrCreateModal.toggle()"
                        >
                            @lang('saas::app.super.settings.currencies.index.create-btn')
                        </button>
                    @endif
                </div>
            </div>
    
            <x-saas::datagrid
                :src="route('super.settings.currencies.index')"
                ref="datagrid"
            >
                @php
                    $hasPermission = companyBouncer()->hasPermission('settings.currencies.edit') || companyBouncer()->hasPermission('settings.currencies.delete');
                    
                    $hasBulkPermission = companyBouncer()->hasPermission('settings.currencies.mass_delete');
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
                    <div class="row grid grid-cols-{{ $hasPermission ? '4' : '3' }} grid-rows-1 gap-2.5 items-center px-4 py-2.5 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold">
                        <div
                            class="flex cursor-pointer gap-2.5"
                            v-for="(columnGroup, index) in ['id', 'code', 'name']"
                        >
                            @if ($hasBulkPermission)
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
                                @lang('saas::app.super.settings.currencies.index.datagrid.actions')
                            </p>
                        @endif
                    </div>
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
                    <div
                        v-for="record in available.records"
                        class="row grid items-center gap-2.5 border-b px-4 py-4 text-gray-600 transition-all hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950"
                        :style="'grid-template-columns: repeat(' + (record.actions.length ? 4 : 3) + ', 1fr);'"
                    >
                        <div class="flex gap-2.5">
                            @if ($hasBulkPermission)
                                <input
                                    type="checkbox"
                                    :name="`mass_action_select_record_${record.id}`"
                                    :id="`mass_action_select_record_${record.id}`"
                                    :value="record.id"
                                    class="hidden peer"
                                    v-model="applied.massActions.indices"
                                    @change="setCurrentSelectionMode"
                                >

                                <label
                                    class="text-2xl rounded-md cursor-pointer icon-uncheckbox peer-checked:icon-checked peer-checked:text-blue-600"
                                    :for="`mass_action_select_record_${record.id}`"
                                ></label>
                            @endif

                            <!-- Id -->
                            <p v-text="record.id"></p>
                        </div>

                        <!-- Code -->
                        <p v-text="record.code"></p>

                        <!-- Name -->
                        <p v-text="record.name"></p>

                        <!-- Actions -->
                        <div class="flex justify-end">
                            <a @click="selectedCurrencies=1; editModal(record.actions.find(action => action.index === 'edit')?.url)">
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
            </x-saas::datagrid>

            <!-- Modal Form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
                ref="modalForm"
            >
                <form
                    @submit="handleSubmit($event, updateOrCreate)"
                    ref="currencyCreateForm"
                >
                    <x-admin::modal ref="currencyUpdateOrCreateModal">
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                <span v-if="selectedCurrencies">
                                    @lang('saas::app.super.settings.currencies.index.edit.title')
                                </span>

                                <span v-else>
                                    @lang('saas::app.super.settings.currencies.index.create.title')
                                </span>
                            </p>
                        </x-slot:header>

                        <!-- Modal Content -->
                        <x-slot:content>
                            {!! view_render_event('bagisto.super.settings.currencies.create.before') !!}

                            <x-admin::form.control-group.control
                                type="hidden"
                                name="id"
                                v-model="selectedCurrency.id"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.currencies.index.create.code')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="code"
                                    :value="old('code')"
                                    rules="required"
                                    v-model="selectedCurrency.code"
                                    :label="trans('saas::app.super.settings.currencies.index.create.code')"
                                    :placeholder="trans('saas::app.super.settings.currencies.index.create.code')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="code"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required"> 
                                    @lang('saas::app.super.settings.currencies.index.create.name')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="name"
                                    :value="old('name')"
                                    rules="required"
                                    v-model="selectedCurrency.name"
                                    :label="trans('saas::app.super.settings.currencies.index.create.name')"
                                    :placeholder="trans('saas::app.super.settings.currencies.index.create.name')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="name"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label>
                                    @lang('saas::app.super.settings.currencies.index.create.symbol')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="symbol"
                                    :value="old('symbol')"
                                    v-model="selectedCurrency.symbol"
                                    :label="trans('saas::app.super.settings.currencies.index.create.symbol')"
                                    :placeholder="trans('saas::app.super.settings.currencies.index.create.symbol')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="symbol"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label>
                                    @lang('saas::app.super.settings.currencies.index.create.decimal')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="decimal"
                                    :value="old('decimal')"
                                    v-model="selectedCurrency.decimal"
                                    :label="trans('saas::app.super.settings.currencies.index.create.decimal')"
                                    :placeholder="trans('saas::app.super.settings.currencies.index.create.decimal')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="decimal"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            {!! view_render_event('bagisto.super.settings.currencies.create.after') !!}
                        </x-slot:content>

                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <div class="flex items-center gap-x-2.5">
                               <button 
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('saas::app.super.settings.currencies.index.create.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </script>

        <script type="module">
            app.component('v-super-currencies', {
                template: '#v-super-currencies-template',

                data() {
                    return {
                        selectedCurrency: {},

                        selectedCurrencies: 0,
                    }
                },

                methods: {
                    updateOrCreate(params, { resetForm, setErrors  }) {
                        let formData = new FormData(this.$refs.currencyCreateForm);

                        if (params.id) {
                            formData.append('_method', 'put');
                        }

                        this.$axios.post(params.id ? "{{ route('super.settings.currencies.update') }}" : "{{ route('super.settings.currencies.store') }}", formData)
                        .then((response) => {
                            this.$refs.currencyUpdateOrCreateModal.close();

                            this.$refs.datagrid.get();

                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

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
                                this.selectedCurrency = response.data;

                                this.$refs.currencyUpdateOrCreateModal.toggle();
                            })
                            .catch(error => {
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message })
                            });
                    },

                    resetForm() {
                        this.selectedCurrency = {};
                    }
                }
            })
        </script>
    @endPushOnce
</x-saas::layouts>