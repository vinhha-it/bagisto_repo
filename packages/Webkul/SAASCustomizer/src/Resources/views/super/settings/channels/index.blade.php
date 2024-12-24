<x-saas::layouts>

    {{-- Page Title --}}
    <x-slot:title>
        @lang('saas::app.super.settings.channels.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas::app.super.settings.channels.index.title')
        </p>
    </div>

    {!! view_render_event('bagisto.super.settings.channels.list.before') !!}
    
    <x-saas::datagrid src="{{ route('super.settings.channels.index') }}" />

    {!! view_render_event('bagisto.super.settings.channels.list.after') !!}

</x-saas::layouts>