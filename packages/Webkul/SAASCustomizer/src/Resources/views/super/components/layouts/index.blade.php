<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ company()->getCurrentLocale()->direction }}" class="{{ (request()->cookie('saas_dark_mode') ?? 0) ? 'dark' : '' }}">
    <head>
        <title>{{ $title ?? '' }}</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url()->to('/') }}">
        <meta name="currency" content="{{ company()->getBaseCurrency()->toJson() }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

        @stack('meta')

        @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'], 'admin')

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <link
            href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap"
            rel="stylesheet"
        />

        @if ($favicon = company()->getSuperConfigData('general.design.super.favicon_image', company()->getCurrentChannelCode()))
            <link 
                type="image/x-icon"
                href="{{ Storage::url($favicon) }}" 
                rel="shortcut icon"
                sizes="16x16"
            >
        @else
            <link 
                type="image/x-icon"
                href="{{ bagisto_asset('images/favicon.ico', 'admin') }}" 
                rel="shortcut icon"
                sizes="16x16"
            />
        @endif
        
        @stack('styles')

        {!! view_render_event('bagisto.saas.layout.head') !!}
    </head>

    <body class="h-full dark:bg-gray-950">
        {!! view_render_event('bagisto.saas.layout.body.before') !!}

        <div id="app" class="h-full">
            {{-- Flash Message Blade Component --}}
            <x-admin::flash-group />

            {{-- Confirm Modal Blade Component --}}
            <x-admin::modal.confirm />

            {!! view_render_event('bagisto.saas.layout.content.before') !!}

            {{-- Page Header Blade Component --}}
            <x-saas::layouts.header />

            <div
                class="flex gap-4 group/container {{ (request()->cookie('saas_sidebar_collapsed') ?? 0) ? 'sidebar-collapsed' : '' }}"
                ref="appLayout"
            >
                {{-- Page Sidebar Blade Component --}}
                <x-saas::layouts.sidebar />

                <div class="max-w-full flex-1 bg-white px-4 pb-6 pt-3 transition-all duration-300 max-lg:!px-4 ltr:pl-[286px] group-[.sidebar-collapsed]/container:ltr:pl-[85px] rtl:pr-[286px] group-[.sidebar-collapsed]/container:rtl:pr-[85px] dark:bg-gray-950">
                    {{-- Added dynamic tabs for third level menus  --}}
                    @if (! request()->routeIs('super.configuration.index'))
                        <x-saas::layouts.tabs />
                    @endif

                    {{-- Page Content Blade Component --}}
                    {{ $slot }}
                </div>
            </div>

            {!! view_render_event('bagisto.saas.layout.content.after') !!}
        </div>

        {!! view_render_event('bagisto.saas.layout.body.after') !!}

        @stack('scripts')

        {!! view_render_event('bagisto.saas.layout.vue-app-mount.before') !!}

        <script>
            /**
             * Load event, the purpose of using the event is to mount the application
             * after all of our `Vue` components which is present in blade file have
             * been registered in the app. No matter what `app.mount()` should be
             * called in the last.
             */
            window.addEventListener("load", function(event) {
                app.mount("#app");
            });
        </script>

        {!! view_render_event('bagisto.saas.layout.vue-app-mount.after') !!}
    </body>
</html>
