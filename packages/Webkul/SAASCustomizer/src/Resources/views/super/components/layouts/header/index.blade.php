@php
    $superAdmin = auth()->guard('super-admin')->user();
    $locales = company()->getAllLocales();
    $currentLocales = company()->getCurrentLocale();
    $currentChannel = company()->getCurrentChannel();
@endphp

<header class="sticky top-0 z-[10001] flex items-center justify-between border-b bg-white px-4 py-2.5 dark:border-gray-800 dark:bg-gray-900">
    <div class="flex items-center gap-1.5">
        <!-- Hamburger Menu -->
        <i
            class="icon-menu hidden cursor-pointer rounded-md p-1.5 text-2xl hover:bg-gray-100 max-lg:block dark:hover:bg-gray-950"
            @click="$refs.sidebarMenuDrawer.open()"
        >
        </i>

        <!-- Logo -->
        <a
            href="{{ route('super.tenants.companies.index') }}" 
            class="-mt-1 place-self-start"            
        >
            @if ($logo = company()->getSuperConfigData('general.design.super.logo_image', company()->getCurrentChannelCode()))
                <img
                    class="h-10" 
                    src="{{ Storage::url($logo) }}" 
                    alt="{{ config('app.name') }}"
                />
            @else
                @if (! request()->cookie('saas_dark_mode'))
                    <img 
                        class="h-10"
                        id="logo-image"
                        src="{{ bagisto_asset('images/logo.svg', 'admin') }}"
                        alt="{{ config('app.name') }}"
                    />
                @else
                    <img 
                        class="h-10"
                        id="logo-image"
                        src="{{ bagisto_asset('images/dark-logo.svg', 'admin') }}"
                        alt="{{ config('app.name') }}"
                    />
                @endif
            @endif
        </a>
    </div>
    
    <x-admin::drawer
        position="left"
        width="270px"
        ref="sidebarMenuDrawer"
    >
    <!-- Drawer Header -->
    <x-slot:header>
        <div class="flex items-center justify-between">
            @if ($logo = core()->getConfigData('general.design.admin_logo.logo_image'))
                <img
                    class="h-10"
                    src="{{ Storage::url($logo) }}"
                    alt="{{ config('app.name') }}"
                />
            @else
                <img
                    src="{{ request()->cookie('dark_mode') ? bagisto_asset('images/dark-logo.svg', 'shop') : bagisto_asset('images/logo.svg', 'shop') }}"
                    id="logo-image"
                    alt="{{ config('app.name') }}"
                />
            @endif
        </div>
    </x-slot>

    <!-- Drawer Content -->
    <x-slot:content class="p-4">
        <div class="journal-scroll h-[calc(100vh-100px)] overflow-auto">
            <nav class="grid w-full gap-2">
                <!-- Navigation Menu -->
                @foreach (menu()->getItems('super-admin') as $menuItem)
                    <div class="relative group/item">
                        <a
                            href="{{ $menuItem->getUrl() }}"
                            class="flex gap-2.5 p-1.5 items-center cursor-pointer hover:rounded-lg {{ $menuItem->isActive() == 'active' ? 'bg-blue-600 rounded-lg' : ' hover:bg-gray-100 hover:dark:bg-gray-950' }} peer"
                        >
                            <span class="{{ $menuItem->getIcon() }} text-2xl {{ $menuItem->isActive() ? 'text-white' : ''}}"></span>
                            
                            <p class="text-gray-600 dark:text-gray-300 font-semibold whitespace-nowrap group-[.sidebar-collapsed]/container:hidden {{ $menuItem->isActive() ? 'text-white' : ''}}">
                                {{ $menuItem->getName() }}
                            </p>
                        </a>


                        @if ($menuItem->haveChildren())
                            <div class="{{ $menuItem->isActive() ? ' !grid bg-gray-100 dark:bg-gray-950' : '' }} hidden min-w-[180px] ltr:pl-10 rtl:pr-10 pb-2 rounded-b-lg z-[100]">
                                @foreach ($menuItem->getChildren() as $subMenuItem)
                                    <a
                                        href="{{ $subMenuItem->getUrl() }}"
                                        class="text-sm text-{{ $subMenuItem->isActive() ? 'blue':'gray' }}-600 dark:text-{{ $subMenuItem->isActive() ? 'blue':'gray' }}-300 whitespace-nowrap py-1 group-[.sidebar-collapsed]/container:px-5 group-[.sidebar-collapsed]/container:py-2.5 group-[.inactive]/item:px-5 group-[.inactive]/item:py-2.5 hover:text-blue-600 dark:hover:bg-gray-950"
                                    >
                                        {{ $subMenuItem->getName() }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </nav>
        </div>
    </x-slot>
    </x-admin::drawer>

    <div class="flex items-center gap-2.5">
        <!-- Super Locale Dropdown -->
        <x-admin::dropdown position="bottom-{{ $currentLocales->direction === 'ltr' ? 'right' : 'left' }}">
            <x-slot:toggle>
                <!-- Dropdown Toggler -->
                <div class="flex cursor-pointer items-center gap-2.5">
                    <img 
                        src="{{ $currentLocales->logo_path 
                            ? Storage::url('super-locales/'.$currentLocales->code.'.png') 
                            : bagisto_asset('images/default-language.svg', 'shop') 
                        }}"
                        class="w-full h-4"
                        alt="Default locale"
                        width="24"
                        height="16"
                    />

                    <span class="dark:text-white">
                        {{ $currentChannel->locales()->orderBy('name')->where('code', app()->getLocale())->value('name') }}
                    </span>

                    <span class="text-2xl icon-arrow-down"></span>
                </div>
            </x-slot:toggle>
        
            <!-- Dropdown Content -->
            <x-slot:content class="!p-0">
                <v-locale-switcher></v-locale-switcher>
            </x-slot:content>
        </x-admin::dropdown>

        <!-- Dark mode Switcher -->
        <v-dark>
            <div class="flex">
                <span
                    class="{{ request()->cookie('saas_dark_mode') ? 'icon-light' : 'icon-dark' }} p-1.5 rounded-md text-2xl cursor-pointer transition-all hover:bg-gray-100 dark:hover:bg-gray-950"
                ></span>
            </div>
        </v-dark>

        <!-- Visit Company Front -->
        <a 
            href="{{ route('saas.home.index') }}" 
            target="_blank"
            class="flex"
        >
            <span 
                class="icon-store cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-100 dark:hover:bg-gray-950"
                title="@lang('saas::app.components.layouts.header.visit-shop')"
            >
            </span>
        </a>

        <!-- Agent Profile Dropdown -->
        <x-admin::dropdown position="bottom-{{ $currentLocales->direction === 'ltr' ? 'right' : 'left' }}" class="cursor-pointer">
            <x-slot:toggle>
                <div class="flex cursor-pointer items-center gap-2.5">
                    @if ($superAdmin->image)
                        <button class="flex overflow-hidden rounded-full cursor-pointer h-9 w-9 hover:opacity-80 focus:opacity-80">
                            <img
                                src="{{ $superAdmin->image_url }}"
                                class="w-full"
                            />
                        </button>
                    @else
                        <button class="flex items-center justify-center text-sm font-semibold leading-6 text-white transition-all bg-blue-400 rounded-full cursor-pointer h-9 w-9 hover:bg-blue-500 focus:bg-blue-500">
                            {{ substr($superAdmin->first_name, 0, 1).substr($superAdmin->last_name, 0, 1) }}
                        </button>
                    @endif

                    <div class="flex flex-col items-center justify-center text-sm font-semibold text-gray-800 ltr:ml-1.5 rtl:mr-1.5 dark:text-white">
                        <span>{{ $superAdmin->name }}</span>

                        <span class="text-xs font-normal text-gray-600 dark:text-gray-300">
                            {{ $superAdmin->role['name'] }}
                        </span>
                    </div>
                    
                    <span class="flex items-center justify-center text-2xl icon-arrow-down"></span>
                </div>
            </x-slot:toggle>

            <!-- Agent Dropdown -->
            <x-slot:content class="!p-0">
                <div class="flex items-center gap-1.5 border border-b-gray-300 px-5 py-2.5 dark:border-gray-800">
                    <img
                        src="{{ url('cache/logo/bagisto.png') }}"
                        width="24"
                        height="24"
                    />

                    <!-- Saas Version -->
                    <p class="text-gray-400">
                        @lang('saas::app.components.layouts.header.app-version', ['version' => 'v'.company()->version()])
                    </p>
                </div>

                <div class="grid gap-1 pb-2.5">
                    <a
                        class="px-5 py-2 text-base text-gray-800 cursor-pointer hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950"
                        href="{{ route('super.agents.account.edit', $superAdmin->id) }}"
                    >
                        @lang('saas::app.components.layouts.header.my-account')
                    </a>

                    {{--Admin logout--}}
                    <x-admin::form
                        method="DELETE"
                        action="{{ route('super.session.destroy') }}"
                        id="agentLogout"
                    >
                    </x-admin::form>

                    <a
                        class="px-5 py-2 text-base text-gray-800 cursor-pointer hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950"
                        href="{{ route('super.session.destroy') }}"
                        onclick="event.preventDefault(); document.getElementById('agentLogout').submit();"
                    >
                        @lang('saas::app.components.layouts.header.logout')
                    </a>
                </div>
            </x-slot:content>
        </x-admin::dropdown>
    </div>
</header>


@pushOnce('scripts')
    <script type="text/x-template" id="v-locale-switcher-template">
        <div class="mt-2.5 grid max-h-[400px] gap-1 overflow-y-auto pb-2.5">
            <span
                class="flex cursor-pointer items-center gap-2.5 px-5 py-2 text-base text-gray-800 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950"
                v-for="locale in locales"
                :class="{'bg-gray-100 dark:bg-gray-950': locale.code == '{{ app()->getLocale() }}'}"
                @click="change(locale)"                  
            >
                <img
                    :src="locale.logo_url || '{{ bagisto_asset('images/default-language.svg', 'shop') }}'"
                    width="24"
                    height="16"
                />

                @{{ locale.name }}
            </span>
        </div>
    </script>

    <script type="text/x-template" id="v-dark-template">
        <div class="flex">
            <span
                class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-100 dark:hover:bg-gray-950"
                :class="[isDarkMode ? 'icon-light' : 'icon-dark']"
                @click="toggle"
            ></span>
        </div>
    </script>

    <script type="module">
        app.component('v-locale-switcher', {
            template: '#v-locale-switcher-template',

            data() {
                return {
                    locales: @json($currentChannel->locales()->orderBy('name')->get()),

                    storagePath: '{{ Storage::url("super-locales/") }}',
                };
            },

            methods: {
                change(locale) {
                    let url = new URL(window.location.href);

                    url.searchParams.set('super-locale', locale.code);

                    window.location.href = url.href;
                }
            }
        });

        app.component('v-dark', {
            template: '#v-dark-template',

            data() {
                return {
                    isDarkMode: {{ request()->cookie('saas_dark_mode') ?? 0 }},

                    logo: "{{ bagisto_asset('images/logo.svg', 'admin') }}",

                    dark_logo: "{{ bagisto_asset('images/dark-logo.svg', 'admin') }}",
                };
            },

            methods: {
                toggle() {
                    this.isDarkMode = parseInt(this.isDarkModeCookie()) ? 0 : 1;

                    var expiryDate = new Date();

                    expiryDate.setMonth(expiryDate.getMonth() + 1);

                    document.cookie = 'saas_dark_mode=' + this.isDarkMode + '; path=/; expires=' + expiryDate.toGMTString();

                    document.documentElement.classList.toggle('dark', this.isDarkMode === 1);

                    if (this.isDarkMode) {
                        this.$emitter.emit('change-theme', 'dark');

                        document.getElementById('logo-image').src = this.dark_logo;
                    } else {
                        this.$emitter.emit('change-theme', 'light');

                        document.getElementById('logo-image').src = this.logo;
                    }
                },

                isDarkModeCookie() {
                    const cookies = document.cookie.split(';');

                    for (const cookie of cookies) {
                        const [name, value] = cookie.trim().split('=');

                        if (name === 'saas_dark_mode') {
                            return value;
                        }
                    }

                    return 0;
                },
            },
        });
    </script>
@endpushOnce