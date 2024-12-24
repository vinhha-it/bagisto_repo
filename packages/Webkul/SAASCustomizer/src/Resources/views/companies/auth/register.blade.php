@php
    $channel = company()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta name="title" content="{{ $channel->home_seo['meta_title'] ?? '' }}" />

    <meta name="description" content="{{ $channel->home_seo['meta_description'] ?? '' }}" />

    <meta name="keywords" content="{{ $channel->home_seo['meta_keywords'] ?? '' }}" />
@endPush

<x-company::layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('saas::app.tenant.registration.merchant-auth')
    </x-slot>

    <div class="container px-16 max-lg:px-8 max-sm:px-4">
        <v-seller-registration>
            <div></div>
        </v-seller-registration>
    </div>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-seller-registration-template">
            
            <div class="mt-9 flex flex-row flex-wrap gap-10">
                <div class="gap-15 flex flex-col">
                    <div
                        class="align-center w-full max-w-[394px] font-dmserif text-4xl font-normal leading-[54.84px] text-navyBlue"
                    >
                        Merchant Registration
                    </div>
    
                    <p
                        class="font-poppins text-xl font-normal leading-8 text-[#7D7D7D]"
                    >
                        Become a merchant and create your own store hassle free
                        without worrying about installing and managing the server.
                        You just need to signup, upload product data and get your
                        e-commerce store.
                    </p>
                </div>
    
                <div class="mt-9 flex w-full justify-between max-sm:flex-col">
                    <!-- Left Panel -->
                    <div class="flex flex-row gap-10">
                        <ul class="max-sm:flex max-sm:w-full max-sm:justify-center">
                            <li
                                class="items-left relative flex gap-5 px-4 py-5 align-top max-sm:px-6"
                                v-on:click="stepNav(1)"
                            >
                                <span
                                    class="absolute top-[68px] {{ company()->getCurrentLocale()->direction == 'ltr' ? 'left-[38px] max-sm:left-[92px]' : 'right-10 max-sm:right-[90px]' }} h-[80px] border-2 border-dotted border-[#7D7D7D] max-sm:h-[48px] max-sm:top-6 max-sm:rotate-90"
                                ></span>
    
                                <span
                                    :class="['flex mt-0 items-center justify-center w-[48px] h-[48px] border-2 border-solid border-[#7D7D7D] rounded-full text-xl text-[#7D7D7D]', isOneActive ? 'icon-cart bg-white font-semibold border-navyBlue text-navyBlue' : 'icon-check-box bg-navyBlue border-navyBlue text-white text-3xl']"
                                ></span>
    
                                <div class="max-sm:hidden">
                                    <p
                                        :class="['mb-2.5 text-base text-navyBlue leading-6 font-Poppins', isOneActive ? 'font-semibold ' : 'font-medium']"
                                    >
                                        @lang('saas::app.tenant.registration.auth-cred')
                                    </p>
    
                                    <p
                                        class="max-w-[404px] text-sm font-normal leading-6 text-[#7D7D7D]"
                                    >
                                        Enter Authentication credentials like email,
                                        password and confirm password.
                                    </p>
                                </div>
                            </li>
    
                            <li
                                class="items-left relative flex gap-5 px-4 py-5 align-top max-sm:px-6"
                                v-on:click="stepNav(2)"
                            >
                                <span
                                    class="absolute top-[74px] {{ company()->getCurrentLocale()->direction == 'ltr' ? 'left-[38px] max-sm:left-[92px]' : 'right-[38px] max-sm:right-[90px]' }} h-[76px] border-2 border-dotted border-[#7D7D7D] max-sm:h-[48px] max-sm:top-6 max-sm:rotate-90"
                                ></span>
    
                                <span
                                    :class="['flex mt-1.5 items-center justify-center w-[48px] h-[48px] border-2 border-solid rounded-full text-xl text-[#7D7D7D]', isTwoActive ? 'icon-users bg-white font-semibold border-navyBlue text-navyBlue' : (isThreeActive ? 'icon-check-box bg-navyBlue border-navyBlue text-white text-3xl' : 'icon-users bg-white border-[#7D7D7D]')]"
                                ></span>
    
                                <div class="max-sm:hidden">
                                    <p
                                        :class="['mb-2.5 text-base text-[#7D7D7D] leading-6 font-Poppins', isTwoActive ? 'text-navyBlue font-semibold ' : (isThreeActive ? 'text-navyBlue font-medium ' : 'font-medium')]"
                                    >
                                        @lang('saas::app.tenant.registration.personal')
                                    </p>
    
                                    <p
                                        class="max-w-[404px] text-sm font-normal leading-6 text-[#7D7D7D]"
                                    >
                                        Enter Personal Details like first name, last
                                        name and phone number.
                                    </p>
                                </div>
                            </li>
    
                            <li
                                class="items-left relative flex gap-5 px-4 py-5 align-top max-sm:px-6"
                                v-on:click="stepNav(3)"
                            >
                                <span
                                    :class="['icon-orders flex mt-1.5 items-center justify-center w-[48px] h-[48px] bg-white border-2 border-solid border-[#7D7D7D] rounded-full text-xl text-[#7D7D7D]', isThreeActive ? 'font-semibold border-navyBlue text-navyBlue' : '']"
                                ></span>
    
                                <div class="max-sm:hidden">
                                    <p
                                        :class="['mb-2.5 text-base text-[#7D7D7D] leading-6 font-Poppins', isThreeActive ? 'text-navyBlue font-semibold ' : 'font-medium']"
                                    >
                                        @lang('saas::app.tenant.registration.org-details')
                                    </p>
    
                                    <p
                                        class="max-w-[404px] text-sm font-normal leading-6 text-[#7D7D7D]"
                                    >
                                        Enter Organisation Details like user name,
                                        organisation name.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
    
                    <!-- Right Panel -->
                    <div class="mt-4 flex max-w-[790px] gap-2.5 max-xl:flex-wrap">
                        <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                            <!-- step_one -->
                            <x-shop::form
                                v-slot="{ meta, errors, handleSubmit }"
                                as="div"
                                v-if="step_one"
                            >
                                <form
                                    class="w-[650px] rounded-xl border border-solid border-[#E9E9E9] p-14 max-sm:w-auto max-sm:p-0"
                                    data-vv-scope="step-one"
                                    v-if="step_one"
                                    @submit.prevent="handleSubmit($event, stepOne)"
                                >
                                    <h2
                                        class="font-dmserif text-4xl font-normal leading-[54.84px] text-navyBlue max-sm:m-2.5 max-sm:text-3xl max-sm:leading-10"
                                    >
                                        @lang('saas::app.tenant.registration.auth-cred')
                                    </h2>
    
                                    <!-- Email -->
                                    <x-shop::form.control-group
                                        class="mb-2.5 max-sm:m-2.5"
                                    >
                                        <x-shop::form.control-group.label
                                            class="required"
                                        >
                                            @lang('saas::app.tenant.registration.email')
                                        </x-shop::form.control-group.label>
    
                                        <x-shop::form.control-group.control
                                            type="email"
                                            name="email"
                                            rules="required|email|max:191"
                                            :label="trans('saas::app.tenant.registration.email')"
                                            :placeholder="trans('saas::app.tenant.registration.email')"
                                            v-model="email"
                                        >
                                        </x-shop::form.control-group.control>
    
                                        <x-shop::form.control-group.error
                                            control-name="email"
                                        >
                                        </x-shop::form.control-group.error>
                                    </x-shop::form.control-group>
    
                                    <!-- Password -->
                                    <x-shop::form.control-group
                                        class="mb-2.5 max-sm:m-2.5"
                                    >
                                        <x-shop::form.control-group.label
                                            class="required"
                                        >
                                            @lang('saas::app.tenant.registration.password')
                                        </x-shop::form.control-group.label>
    
                                        <x-shop::form.control-group.control
                                            type="password"
                                            name="password"
                                            rules="required|min:6"
                                            ref="password"
                                            :label="trans('saas::app.tenant.registration.password')"
                                            :placeholder="trans('saas::app.tenant.registration.password')"
                                            v-model="password"
                                        >
                                        </x-shop::form.control-group.control>
    
                                        <x-shop::form.control-group.error
                                            control-name="password"
                                        >
                                        </x-shop::form.control-group.error>
                                    </x-shop::form.control-group>
    
                                    <!-- Confirmed Password -->
                                    <x-shop::form.control-group
                                        class="mb-2.5 max-sm:m-2.5"
                                    >
                                        <x-shop::form.control-group.label
                                            class="required"
                                        >
                                            @lang('saas::app.tenant.registration.cpassword')
                                        </x-shop::form.control-group.label>
    
                                        <x-shop::form.control-group.control
                                            type="password"
                                            name="password_confirmation"
                                            rules="confirmed:@password"
                                            :label="trans('saas::app.tenant.registration.cpassword')"
                                            :placeholder="trans('saas::app.tenant.registration.cpassword')"
                                            v-model="password_confirmation"
                                        >
                                        </x-shop::form.control-group.control>
    
                                        <x-shop::form.control-group.error
                                            control-name="password_confirmation"
                                        >
                                        </x-shop::form.control-group.error>
                                    </x-shop::form.control-group>
    
                                    <div class="items-left flex max-sm:m-2.5">
                                        <!-- Save Button -->
                                        <button
                                            type="submit"
                                            class="primary-button px-40 py-4 max-sm:px-10 max-sm:py-3"
                                        >
                                            @lang('saas::app.tenant.registration.continue')
                                        </button>
                                    </div>
                                </form>
                            </x-shop::form>
    
                            <!-- step_two -->
                            <x-shop::form
                                v-slot="{ meta, errors, handleSubmit }"
                                as="div"
                                v-if="step_two"
                            >
                                <form
                                    class="w-[650px] rounded-xl border border-solid border-[#E9E9E9] p-12 max-sm:w-auto max-sm:p-0"
                                    data-vv-scope="step-two"
                                    v-if="step_two"
                                    @submit.prevent="handleSubmit($event, stepTwo)"
                                >
                                    <h2
                                        class="font-dmserif text-4xl font-normal leading-[54.84px] text-navyBlue max-sm:m-2.5 max-sm:text-3xl max-sm:leading-10"
                                    >
                                        @lang('saas::app.tenant.registration.personal')
                                    </h2>
    
                                    <!-- first-name -->
                                    <x-shop::form.control-group
                                        class="mb-2.5 max-sm:m-2.5"
                                    >
                                        <x-shop::form.control-group.label
                                            class="required"
                                        >
                                            @lang('saas::app.tenant.registration.first-name')
                                        </x-shop::form.control-group.label>
    
                                        <x-shop::form.control-group.control
                                            type="text"
                                            name="first_name"
                                            rules="required"
                                            :label="trans('saas::app.tenant.registration.first-name')"
                                            :placeholder="trans('saas::app.tenant.registration.first-name')"
                                            v-model="first_name"
                                        >
                                        </x-shop::form.control-group.control>
    
                                        <x-shop::form.control-group.error
                                            control-name="first_name"
                                        >
                                        </x-shop::form.control-group.error>
                                    </x-shop::form.control-group>
    
                                    <!-- last-name -->
                                    <x-shop::form.control-group
                                        class="mb-2.5 max-sm:m-2.5"
                                    >
                                        <x-shop::form.control-group.label
                                            class="required"
                                        >
                                            @lang('saas::app.tenant.registration.last-name')
                                        </x-shop::form.control-group.label>
    
                                        <x-shop::form.control-group.control
                                            type="text"
                                            name="last_name"
                                            rules="required"
                                            :label="trans('saas::app.tenant.registration.last-name')"
                                            :placeholder="trans('saas::app.tenant.registration.last-name')"
                                            v-model="last_name"
                                        >
                                        </x-shop::form.control-group.control>
    
                                        <x-shop::form.control-group.error
                                            control-name="last_name"
                                        >
                                        </x-shop::form.control-group.error>
                                    </x-shop::form.control-group>
    
                                    <!-- phone -->
                                    <x-shop::form.control-group
                                        class="mb-2.5 max-sm:m-2.5"
                                    >
                                        <x-shop::form.control-group.label
                                            class="required"
                                        >
                                            @lang('saas::app.tenant.registration.phone')
                                        </x-shop::form.control-group.label>
    
                                        <x-shop::form.control-group.control
                                            type="text"
                                            name="phone_no"
                                            rules="required|numeric"
                                            :label="trans('saas::app.tenant.registration.phone')"
                                            :placeholder="trans('saas::app.tenant.registration.phone')"
                                            v-model="phone_no"
                                        >
                                        </x-shop::form.control-group.control>
    
                                        <x-shop::form.control-group.error
                                            control-name="phone_no"
                                        >
                                        </x-shop::form.control-group.error>
                                    </x-shop::form.control-group>
    
                                    <div class="items-left flex max-sm:m-2.5">
                                        <!-- Save Button -->
                                        <button
                                            type="submit"
                                            class="primary-button px-40 py-4 max-sm:px-10 max-sm:py-3"
                                        >
                                            @lang('saas::app.tenant.registration.continue')
                                        </button>
                                    </div>
                                </form>
                            </x-shop::form>
    
                            <!-- step_three -->
                            <x-shop::form
                                v-slot="{ meta, errors, handleSubmit }"
                                as="div"
                                v-if="step_three"
                            >
                                <form
                                    class="w-[650px] rounded-xl border border-solid border-[#E9E9E9] p-12 max-sm:w-auto max-sm:p-0"
                                    data-vv-scope="step-three"
                                    v-if="step_three"
                                    @submit.prevent="handleSubmit($event, stepThree)"
                                >
                                    <h2
                                        class="font-dmserif text-4xl font-normal leading-[54.84px] text-navyBlue max-sm:m-2.5 max-sm:text-3xl max-sm:leading-10"
                                    >
                                        @lang('saas::app.tenant.registration.org-details')
                                    </h2>
    
                                    <!-- username -->
                                    <x-shop::form.control-group
                                        class="mb-2.5 max-sm:m-2.5"
                                    >
                                        <x-shop::form.control-group.label
                                            class="required"
                                        >
                                            @lang('User Name')
                                        </x-shop::form.control-group.label>
    
                                        <x-shop::form.control-group.control
                                            type="text"
                                            name="username"
                                            rules="required|alpha_num"
                                            :label="trans('saas::app.tenant.registration.username')"
                                            :placeholder="trans('saas::app.tenant.registration.username')"
                                            v-model="username"
                                        >
                                        </x-shop::form.control-group.control>
    
                                        <x-shop::form.control-group.error
                                            control-name="username"
                                        >
                                        </x-shop::form.control-group.error>
                                    </x-shop::form.control-group>
    
                                    <!-- org-name -->
                                    <x-shop::form.control-group
                                        class="mb-2.5 max-sm:m-2.5"
                                    >
                                        <x-shop::form.control-group.label
                                            class="required"
                                        >
                                            @lang('saas::app.tenant.registration.org-name')
                                        </x-shop::form.control-group.label>
    
                                        <x-shop::form.control-group.control
                                            type="text"
                                            name="name"
                                            rules="required"
                                            :label="trans('saas::app.tenant.registration.org-name')"
                                            :placeholder="trans('saas::app.tenant.registration.org-name')"
                                            v-model="name"
                                        >
                                        </x-shop::form.control-group.control>
    
                                        <x-shop::form.control-group.error
                                            control-name="name"
                                        >
                                        </x-shop::form.control-group.error>
                                    </x-shop::form.control-group>
    
                                    <div class="items-left flex max-sm:m-2.5">
                                        <!-- Save Button -->
                                        <button
                                            type="submit"
                                            class="primary-button px-40 py-4 max-sm:px-10 max-sm:py-3"
                                            :disabled="createdClicked"
                                        >
                                            @lang('saas::app.tenant.registration.continue')
                                        </button>
                                    </div>
                                </form>
                            </x-shop::form>
                        </div>
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-seller-registration', {

                template: '#v-seller-registration-template',
                inject: ['$validator'],

                data: () => ({
                    data_seed_url: @json(route('company.create.data')),
                    step_one: true,
                    step_two: false,
                    step_three: false,
                    email: null,
                    password: null,
                    password_confirmation: null,
                    first_name: null,
                    last_name: null,
                    phone_no: null,
                    name: null,
                    username: null,
                    createdClicked: false,
                    registrationData: {},
                    result: [],
                    isOneActive: false,
                    isTwoActive: false,
                    isThreeActive: false
                }),

                mounted() {
                    this.isOneActive = true;
                },

                methods: {
                    stepOne(params, { resetForm, resetField, setErrors }) {
                        var this_this = this;

                        if (
                            this_this.email 
                            && this_this.password 
                            && this_this.password_confirmation 
                        ) {
                            this_this.catchResponseOne();
                        }
                    },

                    stepTwo(params, { resetForm, resetField, setErrors }) {
                        var this_this = this;

                        if (
                            this_this.first_name 
                            && this_this.last_name 
                            && this_this.phone_no 
                        ) {
                            this_this.catchResponseTwo();
                        }
                    },

                    stepThree(params, { resetForm, resetField, setErrors }) {
                        var this_this = this;

                        if (
                            this_this.username 
                            && this_this.name 
                        ) {
                            this_this.catchResponseThree();
                        }
                    },

                    stepNav(step) {
                        if (step == 1) {
                            if (this.isThreeActive == true || this.isTwoActive == true){
                                this.step_three = false;
                                this.step_two = false;
                                this.step_one = true;

                                this.isThreeActive = false;
                                this.isTwoActive = false;
                                this.isOneActive = true;
                            }
                        } else if (step == 2) {
                            if (this.isThreeActive == true){
                                this.step_three = false;
                                this.step_one = false;
                                this.step_two = true;

                                this.isThreeActive = false;
                                this.isOneActive = false;
                                this.isTwoActive = true;
                            }
                        }
                    },

                    catchResponseOne () {
                        var o_this = this;

                        axios.post('{{ route('company.validate.step-one') }}', {
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.password_confirmation
                        }).then(function (response) {
                            o_this.step_two = true;
                            o_this.step_one = false;
                            o_this.isOneActive = false;
                            o_this.isTwoActive = true;

                            o_this.errors.clear();
                        }).catch(function (errors) {

                            if (errors.response.data.success == false) {
                                
                                if (errors.response.data.errors.email) {
                                    alert(errors.response.data.errors.email);
                                }

                                setErrors(errors.response.data.errors);
                            }

                            o_this.$root.addServerErrors('step-one');
                        });
                    },

                    catchResponseTwo () {
                        var o_this = this;

                        axios.post('{{ route('company.validate.step-two') }}', {
                            phone: this.phone_no
                        }).then(function (response) {
                            o_this.step_three = true;
                            o_this.step_two = false;
                            o_this.isTwoActive = false;
                            o_this.isThreeActive = true;

                            o_this.errors.clear();
                        }).catch(function (errors) {

                            if (errors.response.data.success == false) {
                                
                                if (errors.response.data.errors.phone) {
                                    alert(errors.response.data.errors.phone);
                                }

                                setErrors(errors.response.data.errors);
                            }
                            
                            o_this.$root.addServerErrors('step-two');
                        });
                    },

                    catchResponseThree () {
                        var self = this;
                        this.createdClicked = true;

                        axios.post('{{ route('company.validate.step-three') }}', {
                            username: this.username,
                            name: this.name,
                        }).then(function (response) {
                            
                            setTimeout(function () {
                                if (response.data.save_url) {
                                    self.sendDataToServer(response.data.save_url);
                                }
                            }, 500);
                        }).catch(function (errors) {
                            self.createdClicked = false;
                            
                            if (errors.response.data.success == false) {
                                
                                if (errors.response.data.errors.username) {
                                    alert(errors.response.data.errors.username);
                                }
                                if (errors.response.data.errors.name) {
                                    alert(errors.response.data.errors.name);
                                }

                                setErrors(errors.response.data.errors);
                            }

                            self.$root.addServerErrors('step-three');
                        });
                    },

                    handleErrorResponse (response, scope) {
                        serverErrors = response.data.errors;

                        this.$root.addServerErrors(scope);
                    },

                    sendDataToServer (saveURL) {
                        var self = this;
                        
                        return axios.post(saveURL, {
                            email: this.email,
                            first_name: this.first_name,
                            last_name: this.last_name,
                            phone: this.phone_no,
                            password: this.password,
                            password_confirmation: this.password_confirmation,
                            name: this.name,
                            username: this.username
                        }).then(function (response) {

                            window.location.href = response.data.redirect_url;
                        
                        }).catch(function (errors) {
                            serverErrors = errors.response.data.errors;

                            self.createdClicked = false;

                            for (i in serverErrors) {
                                window.flashMessages = [{'type': 'alert-error', 'message': serverErrors[i]}];
                            }

                            self.$root.addFlashMessages();
                            self.$root.addServerErrors('step-one');
                            self.$root.addServerErrors('step-two');
                            self.$root.addServerErrors('step-three');
                        });
                    }
                }
            });
        </script>
    @endPushOnce
</x-company::layouts>