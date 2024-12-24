<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.tenants.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas::app.super.tenants.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('super.tenants.companies.index') }}"></x-admin::datagrid.export>

            <div class="flex items-center gap-x-2.5">

                <!-- Create Company Vue Components -->
                @if (companyBouncer()->hasPermission('tenants.companies.create'))
                
                    <v-create-company-form>
                        <button
                            type="button"
                            class="primary-button"
                        >
                            @lang('saas::app.super.tenants.index.register-btn')
                        </button>
                    </v-create-company-form>
                @endif

            </div>
        </div>
    </div>

    {!! view_render_event('bagisto.super.tenants.list.before') !!}

    <x-saas::datagrid :src="route('super.tenants.companies.index')" />

    {!! view_render_event('bagisto.super.tenants.list.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-create-company-form-template">
            <div>
                <!-- Product Create Button -->
                @if (companyBouncer()->hasPermission('tenants.companies.create'))
                    <button
                        type="button"
                        class="primary-button"
                        @click="$refs.companyCreateModal.toggle()"
                    >
                        @lang('saas::app.super.tenants.index.register-btn')
                    </button>
                @endif

                <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <form @submit="handleSubmit($event, create)">

                        <!-- Customer Create Modal -->
                        <x-admin::modal ref="companyCreateModal">
                            <!-- Modal Header -->
                            <x-slot:header>
                                <p class="text-lg font-bold text-gray-800 dark:text-white">
                                    @lang('saas::app.super.tenants.index.create.title')
                                </p>
                            </x-slot:header>

                            <!-- Modal Content -->
                            <x-slot:content>
                                {!! view_render_event('bagisto.super.tenants.companies.create_form.general.controls.before') !!}

                                <div class="flex gap-4 max-sm:flex-wrap">
                                    <!-- First Name -->
                                    <x-admin::form.control-group class="mb-2.5 w-full">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('saas::app.super.tenants.index.create.first-name')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="first_name"
                                            id="first_name"
                                            rules="required"
                                            :label="trans('saas::app.super.tenants.index.create.first-name')"
                                            :placeholder="trans('saas::app.super.tenants.index.create.first-name')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="first_name"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <!-- Last Name -->
                                    <x-admin::form.control-group class="mb-2.5 w-full">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('saas::app.super.tenants.index.create.last-name')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="last_name"
                                            id="last_name"
                                            rules="required"
                                            :label="trans('saas::app.super.tenants.index.create.last-name')"
                                            :placeholder="trans('saas::app.super.tenants.index.create.last-name')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="last_name"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>

                                <!-- Phone Number -->
                                <x-admin::form.control-group class="mb-2.5">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.tenants.index.create.phone')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="phone"
                                        id="phone"
                                        rules="required|integer|max:20"
                                        :label="trans('saas::app.super.tenants.index.create.phone')"
                                        :placeholder="trans('saas::app.super.tenants.index.create.phone')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="phone"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <div class="flex gap-4 max-sm:flex-wrap">
                                    <!-- User Name -->
                                    <x-admin::form.control-group class="mb-2.5 w-full">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('saas::app.super.tenants.index.create.user-name')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="username"
                                            id="user_name"
                                            rules="required"
                                            :label="trans('saas::app.super.tenants.index.create.user-name')"
                                            :placeholder="trans('saas::app.super.tenants.index.create.user-name')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="username"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <!-- Organization Name -->
                                    <x-admin::form.control-group class="mb-2.5 w-full">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('saas::app.super.tenants.index.create.organization-name')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="name"
                                            id="organization_name"
                                            rules="required"
                                            :label="trans('saas::app.super.tenants.index.create.organization-name')"
                                            :placeholder="trans('saas::app.super.tenants.index.create.organization-name')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="name"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>

                                <!-- Email -->
                                <x-admin::form.control-group class="mb-2.5">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.tenants.index.create.email')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="email"
                                        name="email"
                                        id="email"
                                        rules="required|email|max:191"
                                        :label="trans('saas::app.super.tenants.index.create.email')"
                                        placeholder="email@example.com"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="email"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Password -->
                                <x-admin::form.control-group class="relative mb-2.5">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.tenants.index.create.password')
                                    </x-admin::form.control-group.label>
                            
                                    <x-admin::form.control-group.control 
                                        type="password" 
                                        name="password" 
                                        id="password"
                                        class="w-[254px] max-w-full ltr:pr-10 rtl:pl-10" 
                                        rules="required|min:6" 
                                        :label="trans('saas::app.super.tenants.index.create.password')"
                                        :placeholder="trans('saas::app.super.tenants.index.create.password')"
                                    >
                                    </x-admin::form.control-group.control>
                            
                                    <span 
                                        class="absolute text-2xl transform -translate-y-1/2 cursor-pointer icon-view top-10 ltr:right-2 rtl:left-2"
                                        onclick="switchVisibility(this, 'password')"
                                        id="visibilityIcon"
                                    >
                                    </span>
                            
                                    <x-admin::form.control-group.error 
                                        control-name="password"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Confirm Password -->
                                <x-admin::form.control-group class="relative mb-2.5">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('saas::app.super.tenants.index.create.confirm-password')
                                    </x-admin::form.control-group.label>
                            
                                    <x-admin::form.control-group.control 
                                        type="password" 
                                        name="password_confirmation" 
                                        id="password_confirmation"
                                        class="w-[254px] max-w-full ltr:pr-10 rtl:pl-10" 
                                        rules="confirmed:@password"
                                        :label="trans('saas::app.super.tenants.index.create.confirm-password')"
                                        :placeholder="trans('saas::app.super.tenants.index.create.confirm-password')"
                                    >
                                    </x-admin::form.control-group.control>
                            
                                    <span 
                                        class="absolute text-2xl transform -translate-y-1/2 cursor-pointer icon-view top-10 ltr:right-2 rtl:left-2"
                                        onclick="switchVisibility(this, 'password_confirmation')"
                                        id="visibilityIcon"
                                    >
                                    </span>
                            
                                    <x-admin::form.control-group.error 
                                        control-name="password_confirmation"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                {!! view_render_event('bagisto.super.tenants.companies.create_form.general.controls.before') !!}
                            </x-slot:content>

                            <!-- Modal Footer -->
                            <x-slot:footer>
                                <div class="flex items-center gap-x-2.5">
                                    <button
                                        type="submit"
                                        class="primary-button"
                                    >
                                        @lang('saas::app.super.tenants.index.create.save-btn')
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-admin::modal>
                    </form>
                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-create-company-form', {
                template: '#v-create-company-form-template',

                data() {
                    return {};
                },

                methods: {
                    create(params, { resetForm, resetField, setErrors }) {
                        this.$axios.post("{{ route('company.create.store') }}", params)
                            .then(response => {
                                window.open(response.data.redirect_url, '_blank');

                                window.location.href = "{{ route('super.tenants.companies.index') }}";
                            }).catch(error => {
                                if (error.response.status == 422) {
                                    console.log(error.response.data.errors);
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },
                }
            })
        </script>

        <script>
            function switchVisibility(visibilityIcon, type) {
                let passwordField = document.getElementById(type);
                
                passwordField.type = passwordField.type === "password" ? "text" : "password";
                visibilityIcon.classList.toggle("icon-view-close");
            }
        </script>
    @endPushOnce

</x-saas::layouts>