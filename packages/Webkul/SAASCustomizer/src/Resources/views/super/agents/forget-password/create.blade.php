<x-saas::layouts.anonymous>
    {{-- Page Title --}}
    <x-slot:title>
        @lang('saas::app.super.agents.forget-password.create.page-title')
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
                {{-- Forget Password Form --}}
                <x-admin::form :action="route('super.forget_password.store')">
                    <div class="p-4">
                        <p class="text-xl font-bold text-gray-800 dark:text-white">
                            @lang('saas::app.super.agents.forget-password.create.title')
                        </p>
                    </div>

                    <div class="border-y p-4 dark:border-gray-800">
                        <div class="mb-2.5">
                            {{-- Registered Email --}}
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.agents.forget-password.create.email')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="email"
                                    name="email" 
                                    :value="old('email')"
                                    id="email"
                                    class="w-[254px] max-w-full" 
                                    rules="required|email" 
                                    :label="trans('saas::app.super.agents.forget-password.create.email')"
                                    :placeholder="trans('saas::app.super.agents.forget-password.create.email')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="email"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4">
                        {{-- Back to Sign In link --}}
                        <a 
                            class="cursor-pointer text-xs font-semibold leading-6 text-blue-600"
                            href="{{ route('super.session.create') }}"
                        >
                            @lang('saas::app.super.agents.forget-password.create.sign-in-link')
                        </a>

                        {{-- Form Submit Button --}}
                        <button 
                            class="cursor-pointer rounded-md border border-blue-700 bg-blue-600 px-3.5 py-1.5 font-semibold text-gray-50">
                            @lang('saas::app.super.agents.forget-password.create.submit-btn')
                        </button>
                    </div>
                </x-admin::form>
            </div>
        </div>
    </div>
</x-admin::layouts.anonymous>