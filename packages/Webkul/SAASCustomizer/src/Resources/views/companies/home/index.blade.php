@php
    $channel = company()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta name="title" content="{{ $channel->home_seo['meta_title'] ?? '' }}" />

    <meta name="description" content="{{ $channel->home_seo['meta_description'] ?? '' }}" />

    <meta name="keywords" content="{{ $channel->home_seo['meta_keywords'] ?? '' }}" />
@endPush

<x-company::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{  $channel->home_seo['meta_title'] ?? '' }}
    </x-slot>
    
    <!-- Loop over the theme customization -->
    @foreach ($customizations as $customization)
        @php
            if (isset($customization->options['images'])) {
                $data = collect($customization->options['images'])->map(function($option) {
                    return [
                        ...$option,
                        'image' => Storage::url(str_replace('storage', '', $option['image'])),
                    ];
                })->toArray();

                $data = ['images' => $data];
            } else {
                $data = $customization->options;
            }
        @endphp

        <!-- Static content -->
        @switch ($customization->type)
            @case ($customization::IMAGE_CAROUSEL)
            <!-- Image Carousel -->
                @if ($data)
                    <x-shop::carousel :options="$data"></x-shop::carousel>
                @endif

                <!-- Page Features Blade Component -->
                <x-company::layouts.features />

                @break
            @case ($customization::STATIC_CONTENT)
                <!-- push style -->
                @if (! empty($data['css']))
                    @push ('styles')
                        <style>
                            {{ $data['css'] }}
                        </style>
                    @endpush
                @endif

                <!-- render html -->
                @if (! empty($data['html']))
                    {!! $data['html'] !!}
                @endif

                @break
        @endswitch
    @endforeach
</x-company::layouts>
