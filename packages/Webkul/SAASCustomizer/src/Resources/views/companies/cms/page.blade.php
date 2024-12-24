<!-- SEO Meta Content -->
@push('meta')
    <meta name="title" content="{{ $page->meta_title }}" />

    <meta name="description" content="{{ $page->meta_description }}" />

    <meta name="keywords" content="{{ $page->meta_keywords }}" />
@endPush

<!-- Page Layout -->
<x-company::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ $page->meta_title }}
    </x-slot>

    <!-- Page Content -->
    <div class="container mt-8 px-16 max-lg:px-8">
        {!! Blade::render($page->html_content) !!}
    </div>
</x-company::layouts>