{!! view_render_event('bagisto.saas.companies.layout.features.before') !!}
<!--
    The ThemeCustomizationRepository repository is injected directly here because there is no way
    to retrieve it from the view composer, as this is an anonymous component.
-->
@inject('themeRepository', 'Webkul\SAASCustomizer\Repositories\Company\ThemeRepository')

@php
    $customization = $themeRepository->findOneWhere([
        'type'       => 'services_content',
        'status'     => 1,
        'channel_id' => company()->getCurrentChannel()->id,
    ]);
@endphp

<!-- Features -->
@if ($customization)
    <div class="container mt-5 max-lg:px-8 max-sm:mt-8">
        <div class="flex gap-2.5 justify-center max-lg:flex-wrap">
            @foreach ($customization->options['services'] as $service)
                <div class="flex items-center gap-5">
                    <span class="{{$service['service_icon']}} flex items-center justify-center w-[60px] h-[60px] bg-white border border-black rounded-full text-[42px] text-navyBluep-2.5"></span>

                    <div class="">
                        <p class="text-xl font-normal text-black leading-7 font-dmserif">{{ $service['title'] }}</p>

                        <p class="text-sm font-medium mt-2.5 text-[#7D7D7D] leading-6 max-w-[217px]">
                            {{ $service['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

{!! view_render_event('bagisto.saas.companies.layout.features.after') !!}
