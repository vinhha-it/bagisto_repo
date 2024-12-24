<x-saas::layouts.anonymous>
    {{-- Page Title --}}
    <x-slot:title>
        @lang('saas::app.super.agents.sessions.title')
    </x-slot:title>

    <div class="flex h-[100vh] items-center justify-center">
        <div class="flex flex-col items-center gap-5">
            {{-- Logo --}}
            @if (company()->getSuperConfigData('general.design.super.logo_image'))
                <img 
                    class="h-10 w-[110px]"
                    src="{{ \Storage::url(company()->getSuperConfigData('general.design.super.logo_image')) }}"
                    alt="{{ config('app.name') }}"
                />
            @else
                <img 
                    class="w-max" 
                    src="{{ bagisto_asset('images/logo.svg', 'admin') }}" 
                    alt="{{ config('app.name') }}"
                />
            @endif

            <div class="box-shadow flex min-w-[300px] flex-col rounded-md bg-white dark:bg-gray-900">
                {{-- Login Form --}}
                <x-admin::form :action="route('super.session.store')">
                    <div class="p-4">
                        <p class="text-xl font-bold text-gray-800 dark:text-white">
                            @lang('saas::app.super.agents.sessions.title')
                        </p>
                    </div>

                    <div class="border-y p-4 dark:border-gray-800">
                        <div class="mb-2.5">
                            {{-- Email --}}
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.agents.sessions.email')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control 
                                    type="email" 
                                    name="email" 
                                    id="email"
                                    class="w-[254px] max-w-full" 
                                    rules="required|email" 
                                    :label="trans('saas::app.super.agents.sessions.email')"
                                    :placeholder="trans('saas::app.super.agents.sessions.email')"
                                    >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error 
                                    control-name="email"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </div>

                        {{-- Password --}}
                        <div class="relative w-full">
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.agents.sessions.password')
                                </x-admin::form.control-group.label>
                        
                                <x-admin::form.control-group.control 
                                    type="password" 
                                    name="password" 
                                    id="password"
                                    class="w-[254px] max-w-full ltr:pr-10 rtl:pl-10" 
                                    rules="required|min:6" 
                                    :label="trans('saas::app.super.agents.sessions.password')"
                                    :placeholder="trans('saas::app.super.agents.sessions.password')"
                                >
                                </x-admin::form.control-group.control>
                        
                                <span 
                                    class="icon-view absolute top-10 -translate-y-2/4 cursor-pointer text-2xl ltr:right-2 rtl:left-2"
                                    onclick="switchVisibility()"
                                    id="visibilityIcon"
                                >
                                </span>
                        
                                <x-admin::form.control-group.error 
                                    control-name="password"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4">
                        {{-- Forgot Password Link --}}
                        <a 
                            class="cursor-pointer text-xs font-semibold leading-6 text-blue-600"
                            href="{{ route('super.forget_password.create') }}"
                        >
                            @lang('saas::app.super.agents.sessions.forget-password-link')
                        </a>

                        {{-- Form Submit Button --}}
                        <button
                            class="cursor-pointer rounded-md border border-blue-700 bg-blue-600 px-3.5 py-1.5 font-semibold text-gray-50">
                            @lang('saas::app.super.agents.sessions.submit-btn')
                        </button>
                    </div>
                </x-admin::form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function switchVisibility() {
                let passwordField = document.getElementById("password");
                let visibilityIcon = document.getElementById("visibilityIcon");

                passwordField.type = passwordField.type === "password" ? "text" : "password";
                visibilityIcon.classList.toggle("icon-view-close");
            }
        </script>
    @endpush
</x-saas::layouts.anonymous>