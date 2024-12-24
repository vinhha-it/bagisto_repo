<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.settings.roles.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas::app.super.settings.roles.index.title')
        </p>
        
        <div class="flex items-center gap-x-2.5">
            <!-- Add Super Agent Role Button -->
            @if (companyBouncer()->hasPermission('settings.roles.create')) 
                <a 
                    href="{{ route('super.settings.roles.create') }}"
                    class="primary-button"
                >
                    @lang('saas::app.super.settings.roles.index.create-btn')
                </a>
            @endif
        </div>
    </div>

    {!! view_render_event('bagisto.super.settings.roles.list.before') !!}
    
    <x-saas::datagrid src="{{ route('super.settings.roles.index') }}" />

    {!! view_render_event('bagisto.super.settings.roles.list.after') !!}

</x-saas::layouts>