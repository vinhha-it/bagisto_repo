<div class="flex flex-wrap max-lg:hidden">
    <div class="w-full flex justify-between min-h-[78px] px-16 border border-t-0 border-b border-l-0 border-r-0 max-1180:px-8">
        {{--
            This section will provide categories for the first, second, and third levels. If
            additional levels are required, users can customize them according to their needs.
        --}}
        {{-- Left Nagivation Section --}}
        <div class="flex items-center gap-x-10 max-[1180px]:gap-x-5">
            <a
                href="{{ route('saas.home.index') }}"
                aria-label="Bagisto"
            >
                <img
                    src="{{ company()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg', 'shop') }}"
                    width="131"
                    height="29"
                    alt="Bagisto"
                >
            </a>
        </div>
    
        {{-- Right Nagivation Section --}}
        <div class="flex gap-x-9 items-center max-lg:gap-x-8 max-[1100px]:gap-x-6">
            
            {{-- Right Navigation Links --}}
            <div class="flex gap-x-9 mt-1.5 max-lg:gap-x-8 max-[1100px]:gap-x-6">
                @if (\Route::currentRouteName() != 'company.create.index')
                    <a href="{{ route('company.create.index') }}" aria-label="@lang('saas::app.tenant.layouts.header.register-btn')">
                        <div class="block w-max mx-auto m-auto py-4 px-8 bg-white border border-navyBlue rounded-2xl text-navyBlue text-basefont-medium text-center cursor-pointer">
                            @lang('saas::app.tenant.layouts.header.register-btn')
                        </div> 
                    </a>
                @endif
            </div>
        </div>
    </div>
   
</div>