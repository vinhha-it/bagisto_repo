<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.settings.locales.index.title')
    </x-slot:title>

    {!! view_render_event('bagisto.super.settings.locales.create.before') !!}

    <v-super-locales>
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('saas::app.super.settings.locales.index.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                @if (companyBouncer()->hasPermission('settings.locales.create'))
                    <button 
                        type="button"
                        class="primary-button"
                    >
                        @lang('saas::app.super.settings.locales.index.create-btn')
                    </button>
                @endif
            </div>
        </div>

        <!-- DataGrid Shimmer -->
        <x-admin::shimmer.datagrid/>
    </v-super-locales>

    {!! view_render_event('bagisto.super.settings.locales.create.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-super-locales-template">
            <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                <p class="text-xl font-bold text-gray-800 dark:text-white">
                    @lang('saas::app.super.settings.locales.index.title')
                </p>

                <div class="flex items-center gap-x-2.5">
                    <!-- Locale Create Button -->
                    @if (companyBouncer()->hasPermission('settings.locales.create'))
                        <button
                            type="button"
                            class="primary-button"
                            @click="selectedLocales=0;resetForm();$refs.superLocaleUpdateOrCreateModal.toggle()"
                        >
                            @lang('saas::app.super.settings.locales.index.create-btn')
                        </button>
                    @endif
                </div>
            </div>
    
            <x-saas::datagrid :src="route('super.settings.locales.index')" ref="datagrid">
                @php
                    $hasPermission = companyBouncer()->hasPermission('settings.locales.edit') || companyBouncer()->hasPermission('settings.locales.delete');
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
                        <div
                            class="row grid grid-cols-{{ $hasPermission ? '5' : '4' }} grid-rows-1 gap-2.5 items-center px-4 py-2.5 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold"
                            :style="'grid-template-columns: repeat({{ $hasPermission ? '5' : '4' }} , 1fr);'"
                        >
                            <div
                                class="flex cursor-pointer gap-2.5"
                                v-for="(columnGroup, index) in ['id', 'code', 'name', 'direction']"
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
                                    @lang('saas::app.super.settings.locales.index.datagrid.actions')
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
                            :style="'grid-template-columns: repeat(' + (record.actions.length ? 5 : 4) + ', 1fr);'"
                        >
                            <div class="flex items-center gap-2.5">
                                <p>
                                    <!-- Bulk Option -->
                                    @if ($hasPermission)
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
                                        >
                                        </label>
                                    @endif
                                </p>
                            
                                <!-- Id -->
                                <p v-text="record.id"></p>
                            </div>

                            <!-- Code -->
                            <p v-text="record.code"></p>

                            <!-- Name -->
                            <p v-text="record.name"></p>

                            <!-- Direction -->
                            <p v-text="record.direction"></p>

                            <!-- Actions -->
                            <div class="flex justify-end">
                                <a @click="selectedLocales=1; editModal(record.actions.find(action => action.index === 'edit')?.url)">
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

            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
                ref="modalForm"
            >
                <form 
                    @submit="handleSubmit($event, updateOrCreate)"
                    ref="createSuperLocaleForm"
                >

                    {!! view_render_event('bagisto.super.settings.create_form_controls.before') !!}

                    <x-admin::modal ref="superLocaleUpdateOrCreateModal">
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                <span v-if="selectedLocales">
                                    @lang('saas::app.super.settings.locales.index.edit.title')
                                </span>

                                <span v-else>
                                    @lang('saas::app.super.settings.locales.index.create.title')
                                </span>
                            </p>
                        </x-slot:header>

                        <!-- Modal Content -->
                        <x-slot:content>
                            {!! view_render_event('bagisto.admin.settings.locale.create.before') !!}

                            <x-admin::form.control-group.control
                                type="hidden"
                                name="id"
                                v-model="locale.id"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.locales.index.create.code')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="code"
                                    id="code"
                                    rules="required"
                                    :label="trans('saas::app.super.settings.locales.index.create.code')"
                                    :placeholder="trans('saas::app.super.settings.locales.index.create.code')"
                                    v-model="locale.code"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="code"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.locales.index.create.name')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="name"
                                    id="name"
                                    rules="required"
                                    :label="trans('saas::app.super.settings.locales.index.create.name')"
                                    :placeholder="trans('saas::app.super.settings.locales.index.create.name')"
                                    v-model="locale.name"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="name"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.locales.index.create.direction')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="direction"
                                    id="direction"
                                    rules="required"
                                    :label="trans('saas::app.super.settings.locales.index.create.direction')"
                                    v-model="locale.direction"
                                >
                                    <!-- Default Option -->
                                    <option value="">
                                        @lang('saas::app.super.settings.locales.index.create.select-direction')
                                    </option>

                                    <option value="ltr" selected title="Text direction left to right">@lang('saas::app.super.settings.locales.index.create.text-ltr')</option>
                
                                    <option value="rtl" title="Text direction right to left">@lang('saas::app.super.settings.locales.index.create.text-rtl')</option>
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="direction"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label>
                                    @lang('saas::app.super.settings.locales.index.create.locale-logo')
                                </x-admin::form.control-group.label>

                                <div class="hidden">
                                    <x-admin::media.images
                                        name="logo_path"
                                        ::uploaded-images='locale.image'
                                    >
                                    </x-admin::media.images>
                                </div>

                                <v-media-images
                                    name="logo_path"
                                    :uploaded-images='locale.image'
                                >
                                </v-media-images>

                                <x-admin::form.control-group.error
                                    control-name="logo_path"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                            
                            <p class="text-xs text-gray-600 dark:text-gray-300">
                                @lang('saas::app.super.settings.locales.index.create.logo-size')
                            </p>

                            {!! view_render_event('bagisto.admin.settings.locale.create.after') !!}
                        </x-slot:content>

                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <div class="flex items-center gap-x-2.5">
                                <button 
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('saas::app.super.settings.locales.index.create.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>

                    {!! view_render_event('bagisto.super.settings.create_form_controls.after') !!}

                </form>
            </x-admin::form>
        </script>

        <script type="module">
            app.component('v-super-locales', {
                template: '#v-super-locales-template',

                data() {
                    return {
                        locale: {
                            image: [],
                        },

                        selectedLocales: 0,
                    }
                },

                methods: {
                    updateOrCreate(params, { resetForm, setErrors  }) {
                        let formData = new FormData(this.$refs.createSuperLocaleForm);

                        if (params.id) {
                            formData.append('_method', 'put');
                        }

                        this.$axios.post(params.id ? "{{ route('super.settings.locales.update') }}" : "{{ route('super.settings.locales.store') }}", formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then((response) => {
                            this.$refs.superLocaleUpdateOrCreateModal.close();

                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                            
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
                                this.locale = {
                                    ...response.data.data,
                                    image: response.data.data.logo_path
                                    ? [{ id: 'logo_url', url: response.data.data.logo_url }]
                                    : [],
                                };

                                this.$refs.superLocaleUpdateOrCreateModal.toggle();
                            })
                    },

                    resetForm() {
                        this.locale = {
                            image: [],
                        };
                    }
                },
            });
        </script>
    @endPushOnce
</x-saas::layouts>