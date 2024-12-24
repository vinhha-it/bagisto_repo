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

        @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'], 'admin')

        {{--  @bagistoVite(['src/Resources/assets/css/app.css'], 'saas')  --}}
        
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

    <body>
        {!! view_render_event('bagisto.saas.layout.body.before') !!}

        <div id="app">
            {{-- Flash Message Blade Component --}}
            <x-admin::flash-group />
            
            {!! view_render_event('bagisto.saas.layout.content.before') !!}

                {{-- Page Content Blade Component --}}
                {{ $slot }}
                
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
