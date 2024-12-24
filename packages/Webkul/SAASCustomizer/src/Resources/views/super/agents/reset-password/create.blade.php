<x-saas::layouts.anonymous>
    {{-- Page Title --}}
    <x-slot:title>
        @lang('saas::app.super.agents.reset-password.title')
    </x-slot:title>

    <div class="flex h-[100vh] items-center justify-center">
        <div class="flex flex-col items-center gap-5">
            {{-- Logo --}}
            @if (company()->getSuperConfigData('general.design.super.logo_image'))
                <img 
                    class="w-max"
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
                <x-admin::form :action="route('super.reset_password.store')">
                    <div class="p-4">
                        <p class="text-xl font-bold text-gray-800 dark:text-white">
                            @lang('saas::app.super.agents.reset-password.title')
                        </p>
                    </div>

                    <x-admin::form.control-group.control
                        type="hidden"
                        name="token"
                        :value="$token"       
                    >
                    </x-admin::form.control-group.control>

                    <div class="border-y p-4 dark:border-gray-800">
                        <div class="mb-2.5">
                            {{-- Register Email --}}
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.agents.reset-password.email')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="email"
                                    name="email" 
                                    id="email"
                                    class="w-[254px] max-w-full" 
                                    rules="required|email" 
                                    :label="trans('saas::app.super.agents.reset-password.email')"
                                    :placeholder="trans('saas::app.super.agents.reset-password.email')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="email"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </div>
                        
                        <div class="mb-2.5">
                            {{-- Password --}}
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.agents.reset-password.password')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="password"
                                    name="password" 
                                    id="password"
                                    class="w-[254px] max-w-full" 
                                    ref="password"
                                    rules="required|min:6" 
                                    :label="trans('saas::app.super.agents.reset-password.password')"
                                    :placeholder="trans('saas::app.super.agents.reset-password.password')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="password"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </div>

                        <div class="mb-2.5">
                            {{-- Confirm Password --}}
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.agents.reset-password.confirm-password')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="w-[254px] max-w-full" 
                                    ref="password"
                                    rules="confirmed:@password" 
                                    :label="trans('saas::app.super.agents.reset-password.confirm-password')"
                                    :placeholder="trans('saas::app.super.agents.reset-password.confirm-password')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="password_confirmation"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4">
                        {{-- Back to Sign In Page--}}
                        <a 
                            class="cursor-pointer text-xs font-semibold leading-6 text-blue-600"
                            href="{{ route('super.session.create') }}"
                        >
                            @lang('saas::app.super.agents.reset-password.back-link-title')
                        </a>

                        {{-- Form Submit Button --}}
                        <button 
                            class="cursor-pointer rounded-md border border-blue-700 bg-blue-600 px-3.5 py-1.5 font-semibold text-gray-50">
                            @lang('saas::app.super.agents.reset-password.submit-btn')
                        </button>
                    </div>
                </x-admin::form>
            </div>
        </div>
    </div>
</x-admin::layouts.anonymous>