<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.settings.agents.index.title')
    </x-slot:title>

    <!-- Agent Create Button -->
                    
    {!! view_render_event('bagisto.super.settings.agents.create.before') !!}
    
    <v-create-agent-form>
        <div class="flex items-center justify-between">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('saas::app.super.settings.agents.index.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <!-- Export Modal -->
                <x-admin::datagrid.export src="{{ route('super.settings.agents.index') }}" />

                <!-- Agent Create Vue Component -->
                <div class="flex items-center gap-x-2.5">
                    
                    @if (companyBouncer()->hasPermission('settings.agents.create'))
                        <button
                            type="button"
                            class="primary-button"
                        >
                            @lang('saas::app.super.settings.agents.index.register-btn')
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- DataGrid Shimmer -->
        <x-admin::shimmer.datagrid/>
    </v-create-agent-form>

    {!! view_render_event('bagisto.super.settings.agents.create.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-create-agent-form-template">
            <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                <p class="text-xl font-bold text-gray-800 dark:text-white">
                    @lang('saas::app.super.settings.agents.index.title')
                </p>

                <div class="flex items-center gap-x-2.5">
                    <!-- Agent Create Button -->
                    @if (companyBouncer()->hasPermission('settings.agents.create'))
                        <button
                            type="button"
                            class="primary-button"
                            @click="selectedAgents=0;resetForm();$refs.agentUpdateOrCreateModal.toggle()"
                        >
                            @lang('saas::app.super.settings.agents.index.register-btn')
                        </button>
                    @endif
                </div>
            </div>

            {!! view_render_event('bagisto.super.settings.agents.list.before') !!}

            <x-saas::datagrid 
                :src="route('super.settings.agents.index')"
                ref="agent_datagrid"
                :isMultiRow="true"
            >
                @php
                    $hasPermission = companyBouncer()->hasPermission('settings.agents.edit') || companyBouncer()->hasPermission('settings.agents.delete');
                @endphp

                <!-- DataGrid Header -->
                <template #header="{
                    isLoading,
                    available,
                    applied,
                    selectAll,
                    sort,
                    performAction
                }">
                    <template v-if="! isLoading">
                        <div class="row grid grid-cols-{{ $hasPermission ? '6' : '5' }} grid-rows-1 gap-2.5 items-center px-4 py-2.5 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold">
                            <div
                                class="flex cursor-pointer gap-2.5"
                                v-for="(columnGroup, index) in ['agent_id', 'full_name', 'agent_email', 'role_name', 'status']"
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
                                    @lang('saas::app.super.settings.agents.index.datagrid.actions')
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
                    performAction
                }">
                    <template v-if="! isLoading">
                        <div
                            class="row grid items-center gap-2.5 border-b px-4 py-4 text-gray-600 transition-all hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950"
                            :style="'grid-template-columns: repeat(' + (record.actions.length ? 6 : 5) + ', 1fr);'"
                            v-for="record in available.records"
                        >
                            <div class="flex items-center gap-2.5">
                                <p>
                                    <!-- Bulk Option -->
                                    @if ($hasPermission)
                                        <input
                                            type="checkbox"
                                            :name="`mass_action_select_record_${record.agent_id}`"
                                            :id="`mass_action_select_record_${record.agent_id}`"
                                            :value="record.agent_id"
                                            class="hidden peer"
                                            v-model="applied.massActions.indices"
                                            @change="setCurrentSelectionMode"
                                        >

                                        <label
                                            class="text-2xl rounded-md cursor-pointer icon-uncheckbox peer-checked:icon-checked peer-checked:text-blue-600"
                                            :for="`mass_action_select_record_${record.agent_id}`"
                                        >
                                        </label>
                                    @endif
                                </p>
                            
                                <!-- Id -->
                                <p v-text="record.agent_id"></p>
                            </div>

                            <!-- Agent Profile -->
                            <div class="flex items-center gap-2.5">
                                <div
                                    class="inline-block mr-2 overflow-hidden text-center align-middle border-gray-800 rounded-full border-3 h-9 w-9"
                                    v-if="record.agent_img"
                                >
                                    <img
                                        class="h-9 w-9"
                                        :src="record.agent_img"
                                        alt="record.full_name"
                                    />
                                </div>

                                <div
                                    class="profile-info-icon"
                                    v-else
                                >
                                    <button
                                        class="flex items-center justify-center text-sm font-semibold leading-6 text-white transition-all bg-blue-400 rounded-full cursor-pointer h-9 w-9 hover:bg-blue-500 focus:bg-blue-500"
                                        v-text="record.full_name[0].toUpperCase()"
                                    >
                                    </button>
                                </div>

                                <div
                                    class="text-sm"
                                    v-text="record.full_name"
                                >
                                </div>
                            </div>

                            <!-- Email -->
                            <p v-text="record.agent_email"></p>

                            <!-- Role -->
                            <p v-text="record.role_name"></p>

                            <!-- Status -->
                            <p v-html="record.status"></p>

                            <!-- Actions -->
                            <div class="flex justify-end">
                                <a @click="selectedAgents=1; editModal(record.actions.find(action => action.index === 'edit')?.url)">
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

            {!! view_render_event('bagisto.super.settings.agents.list.after') !!}
                
            <!-- Modal Form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
                ref="modalForm"
            >
                <form 
                    @submit="handleSubmit($event, updateOrCreate)"
                    ref="userCreateForm"
                >
                    <!-- User Create Modal -->
                    <x-admin::modal ref="agentUpdateOrCreateModal">
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                <span v-if="selectedAgents">
                                    @lang('saas::app.super.settings.agents.index.edit.title')
                                </span>

                                <span v-else>
                                    @lang('saas::app.super.settings.agents.index.create.title')
                                </span>
                            </p>
                        </x-slot:header>
                        
                        <!-- Modal Content -->
                        <x-slot:content>
                            <!-- First & Last Name -->
                            <div class="flex gap-4">
                                
                                <!-- First Name -->
                                <x-admin::form.control-group class="mb-2.5 flex-1">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.settings.agents.index.create.first-name')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="hidden"
                                        name="id"
                                        v-model="data.agent.id"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="first_name"
                                        id="first_name"
                                        rules="required"
                                        :label="trans('saas::app.super.settings.agents.index.create.first-name')" 
                                        :placeholder="trans('saas::app.super.settings.agents.index.create.first-name')"
                                        v-model="data.agent.first_name"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="first_name"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Last Name -->
                                <x-admin::form.control-group class="mb-2.5 flex-1">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.settings.agents.index.create.last-name')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="hidden"
                                        name="id"
                                        v-model="data.agent.id"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="last_name"
                                        id="last_name"
                                        rules="required"
                                        :label="trans('saas::app.super.settings.agents.index.create.last-name')" 
                                        :placeholder="trans('saas::app.super.settings.agents.index.create.last-name')"
                                        v-model="data.agent.last_name"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="last_name"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>

                            <!-- Email -->
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.agents.index.create.email')
                                </x-admin::form.control-group.label>
    
                                <x-admin::form.control-group.control
                                    type="email"
                                    name="email"
                                    id="email"
                                    rules="required|email"
                                    :label="trans('saas::app.super.settings.agents.index.create.email')"
                                    placeholder="email@example.com"
                                    v-model="data.agent.email"
                                >
                                </x-admin::form.control-group.control>
    
                                <x-admin::form.control-group.error
                                    control-name="email"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Password & Confirm Password -->
                            <div class="flex gap-4">
                                <!-- Password -->
                                <x-admin::form.control-group class="mb-2.5 flex-1">
                                    <x-admin::form.control-group.label>
                                        @lang('saas::app.super.settings.agents.index.create.password')
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="password"
                                        name="password"
                                        id="password" 
                                        ref="password"
                                        rules="min:6"
                                        :label="trans('saas::app.super.settings.agents.index.create.password')"
                                        :placeholder="trans('saas::app.super.settings.agents.index.create.password')"
                                        v-model="data.agent.password"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="password"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Confirm Password -->
                                <x-admin::form.control-group class="mb-2.5 flex-1">
                                    <x-admin::form.control-group.label>
                                        @lang('saas::app.super.settings.agents.index.create.confirm-password')
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="password"
                                        name="password_confirmation"
                                        id="password_confirmation" 
                                        rules="confirmed:@password"
                                        :label="trans('saas::app.super.settings.agents.index.create.password')"
                                        :placeholder="trans('saas::app.super.settings.agents.index.create.confirm-password')"
                                        v-model="data.agent.password_confirmation"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="password_confirmation"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>

                            <!-- Role & Status-->
                            <div class="flex gap-4">
                                
                                <x-admin::form.control-group class="mb-2.5 w-full flex-1">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.settings.agents.index.create.role')
                                    </x-admin::form.control-group.label>

                                    <v-field
                                        name="role_id" 
                                        rules="required"
                                        label="@lang('saas::app.super.settings.agents.index.create.role')"
                                        v-model="data.agent.role_id"
                                    >
                                        <select
                                            name="role_id" 
                                            class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                            :class="[errors['options[sort]'] ? 'border border-red-600 hover:border-red-600' : '']"
                                            v-model="data.agent.role_id"
                                        >
                                            <option value="" disabled>@lang('saas::app.super.settings.agents.index.create.select')</option>

                                            <option 
                                                v-for="role in roles"
                                                :value="role.id"
                                                :text="role.name"
                                            >
                                            </option>
                                        </select>
                                    </v-field>
        
                                    <x-admin::form.control-group.error
                                        control-name="role_id"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <template v-if="currentAgentId != data.agent.id">
                                    <x-admin::form.control-group class="!mb-0 w-full flex-1">
                                        <x-admin::form.control-group.label>
                                            @lang('saas::app.super.settings.agents.index.create.status')
                                        </x-admin::form.control-group.label>

                                        <div class="mt-2.5 w-full gap-2.5">    
                                            <x-admin::form.control-group.control
                                                type="switch"
                                                name="status"
                                                :value="1"
                                                :label="trans('saas::app.super.settings.agents.index.create.status')"
                                                ::checked="data.agent.status"
                                                v-model="data.agent.status"
                                            >
                                            </x-admin::form.control-group.control>
            
                                            <x-admin::form.control-group.error
                                                control-name="status"
                                            >
                                            </x-admin::form.control-group.error>
                                        </div>
                                    </x-admin::form.control-group>
                                </template>

                                <template v-else>
                                    <input type="hidden" name="status" v-model="data.agent.status">
                                </template>
                            </div>

                            <x-admin::form.control-group>
                                <div class="hidden">
                                    <x-admin::media.images
                                        name="image"
                                        ::uploaded-images='data.images'
                                    />
                                </div>

                                <v-media-images
                                    name="image"
                                    :uploaded-images='data.images'
                                >
                                </v-media-images>

                                <p class="my-3 text-sm text-gray-400 required">
                                    @lang('saas::app.super.settings.agents.index.create.upload-image-info')
                                </p>
                            </x-admin::form.control-group>
                        </x-slot:content>
                        
                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <div class="flex items-center gap-x-2.5">
                                <button 
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('admin::app.settings.users.index.create.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>

            <!-- Agent Delete Password Form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form 
                    @submit="handleSubmit($event, agentConfirmModal)"
                    ref="confirmPassword"
                >
                    <x-admin::modal ref="confirmPasswordModal">
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                @lang('Confirm Password Before DELETE')
                            </p>
                        </x-slot:header>
        
                        <!-- Modal Content -->
                        <x-slot:content>
                            <!-- Password -->
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('Enter Current Password')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="password"
                                    name="password"
                                    id="password"
                                    rules="required"
                                    :label="trans('Password')" 
                                    :placeholder="trans('Password')"
                                >
                                </x-admin::form.control-group.control>
    
                                <x-admin::form.control-group.error
                                    control-name="password"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </x-slot:content>
        
                        <x-slot:footer>
                            <!-- Modal Submission -->
                            <div class="flex items-center gap-x-2.5">
                                <button 
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('Confirm Delete This Account')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </script>

        <script type="module">
            app.component('v-create-agent-form', {
                template: '#v-create-agent-form-template',

                data() {
                    return {
                        roles: @json($roles),
                        
                        data: {
                            agent: {},
                            images: [],
                        },

                        selectedAgents: 0,

                        currentAgentId: "{{ auth()->guard('super-admin')->user()->id }}",
                    }
                },

                methods: {
                    updateOrCreate(params, { setErrors }) {
                        let formData = new FormData(this.$refs.userCreateForm);

                        if (params.id) {
                            formData.append('_method', 'put');
                        }

                        this.$axios.post(params.id ? "{{ route('super.settings.agents.update') }}" : "{{ route('super.settings.agents.store') }}", formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                }
                            })
                            .then((response) => {
                                this.$refs.agentUpdateOrCreateModal.close();

                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                this.$refs.agent_datagrid.get();
                                
                                resetForm();
                            })
                            .catch(error => {
                                if (error.response.status && error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },

                    editModal(url) {
                        this.$axios.get(url)
                            .then((response) => {
                                this.data = {
                                    ...response.data,
                                        images: response.data.agent.image
                                        ? [{ id: 'image_url', url: response.data.agent.image_url }]
                                        : [],
                                        agent: {
                                            ...response.data.agent,
                                            password:'',
                                            password_confirmation:'',
                                        },
                                };
                                
                                this.$refs.modalForm.setValues(response.data.agent);

                                this.$refs.agentUpdateOrCreateModal.toggle();
                            })
                            .catch(error => {
                                if (error.response && error.response.data.message) {
                                    this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                                }
                            });
                    },

                    agentConfirmModal() {
                        let formData = new FormData(this.$refs.confirmPassword);

                        formData.append('_method', 'put');
                        
                        this.$axios.post("{{ route('super.settings.agents.destroy')}}", formData)
                            .then((response) => {
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                window.location.href = response.data.redirectUrl;
                            })
                            .catch(error => {
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });

                                this.$refs.confirmPasswordModal.toggle();
                            });
                    },

                    resetForm() {
                        this.data = {
                            agent: {},
                            images: [],
                        };
                    },
                },
            });
        </script>
    @endPushOnce

</x-saas::layouts>