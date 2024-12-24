@props([
    'hasHeader'  => true,
    'hasFooter'  => true,
])

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ company()->getCurrentLocale()->direction }}">
    <head>
        <title>{{ $title ?? '' }}</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url()->to('/') }}">
        <meta name="currency-code" content="{{ company()->getCurrentCurrencyCode() }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

        @stack('meta')

        <link
            rel="icon"
            sizes="16x16"
            href="{{ company()->getCurrentChannel()->favicon_url ?? bagisto_asset('images/favicon.ico', 'company') }}"
        />

        @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'], 'shop')

        @bagistoVite(['src/Resources/assets/css/app.css'], 'company')

        <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" as="style">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">

        <link rel="preload" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" as="style">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap">

        @stack('styles')

        {!! view_render_event('bagisto.saas.companies.layout.head') !!}
    </head>

    <body>
        {!! view_render_event('bagisto.saas.companies.layout.body.before') !!}

        <div id="app">
            {{-- Flash Message Blade Component --}}
            <x-shop::flash-group />

            {{-- Confirm Modal Blade Component --}}
            <x-shop::modal.confirm />

            {{-- Page Header Blade Component --}}
            @if ($hasHeader)
                <x-company::layouts.header />
            @endif

            {!! view_render_event('bagisto.saas.companies.layout.content.before') !!}

            {{-- Page Content Blade Component --}}
            {{ $slot }}

            {!! view_render_event('bagisto.saas.companies.layout.content.after') !!}

            {{-- Page Footer Blade Component --}}
            @if ($hasFooter)
                <x-company::layouts.footer />
            @endif
        </div>

        {!! view_render_event('bagisto.saas.companies.layout.body.after') !!}

        @stack('scripts')

        {!! view_render_event('bagisto.saas.companies.layout.vue-app-mount.before') !!}

        <script>
            /**
             * Load event, the purpose of using the event is to mount the application
             * after all of our `Vue` components which is present in blade file have
             * been registered in the app. No matter what `app.mount()` should be
             * called in the last.
             */
            window.addEventListener("load", function (event) {
                app.mount("#app");
            });
        </script>

        {!! view_render_event('bagisto.saas.companies.layout.vue-app-mount.after') !!}
    </body>
</html>
