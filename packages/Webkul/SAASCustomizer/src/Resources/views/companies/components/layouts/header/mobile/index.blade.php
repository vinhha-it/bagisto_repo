{{--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
--}}
@php
    $showCompare = false;

    $showWishlist = false;
@endphp

<div class="gap-3 flex-wrap px-4 pt-6 hidden max-lg:flex max-lg:mb-4">
    <div class="w-full flex justify-between items-center">
        {{-- Left Navigation --}}
        <div class="flex items-center gap-x-1.5">
            <x-shop::drawer
                position="left"
                width="80%"
            >
                <x-slot:toggle>
                    <span class="icon-hamburger text-2xl cursor-pointer"></span>
                </x-slot:toggle>

                <x-slot:header>
                    <div class="flex justify-between items-center">
                        <a 
                            href="{{ route('saas.home.index') }}"
                            aria-label="Bagisto"
                        >
                            <img
                                src="{{ company()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg', 'shop') }}"
                                alt="Bagisto"
                                width="131"
                                height="29"
                            >
                        </a>
                    </div>
                </x-slot:header>

                <x-slot:content>
                    {{-- Account Profile Hero Section --}}
                    <div class="grid grid-cols-[auto_1fr] gap-3 items-center mb-4p-2.5 border border-[#E9E9E9] rounded-xl">
                        <div class="">
                            <img
                                src="{{ bagisto_asset('images/user-placeholder.png', 'shop') }}"
                                class="w-[60px] h-[60px] rounded-full"
                            >
                        </div>
                        
                        <a
                            href="{{ route('company.create.index') }}"
                            class="flex text-base font-medium"
                        >
                            @lang('saas::app.tenant.layouts.header.register-btn')

                            <i class="icon-double-arrow text-2xl ml-2.5"></i>
                        </a>
                    </div>

                </x-slot:content>

                <x-slot:footer></x-slot:footer>
            </x-shop::drawer>

            <a
                href="{{ route('saas.home.index') }}"
                class="max-h-[30px]"
                aria-label="Bagisto"
            >
                <img
                    src="{{ company()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg', 'shop') }}"
                    alt="Bagisto"
                    width="131"
                    height="29"
                >
            </a>
        </div>
    </div>
</div>
