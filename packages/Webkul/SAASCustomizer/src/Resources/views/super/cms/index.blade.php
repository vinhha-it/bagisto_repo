<x-saas::layouts>
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('saas::app.super.cms.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas::app.super.cms.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Dropdown -->
            <x-admin::dropdown position="bottom-right">
                <x-slot:toggle>
                    <span class="icon-setting flex cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800"></span>
                </x-slot:toggle>

                <x-slot:content class="z-10 w-[174px] max-w-full rounded border bg-white !p-2 shadow-[0px_8px_10px_0px_rgba(0,_0,_0,_0.2)] dark:border-gray-800 dark:bg-gray-900">
                    <div class="grid gap-0.5">
                        <!-- Current Channel -->
                        <div class="cursor-pointer items-center p-1.5 transition-all hover:rounded-md hover:bg-gray-100 dark:hover:bg-gray-950">
                            <p class="font-semibold leading-6 text-gray-600 dark:text-gray-300">
                                Channel - {{ company()->getCurrentChannel()->name }}
                            </p>
                        </div>

                        <!-- Current Locale -->
                        <div class="cursor-pointer items-center p-1.5 transition-all hover:rounded-md hover:bg-gray-100 dark:hover:bg-gray-950">
                            <p class="font-semibold leading-6 text-gray-600 dark:text-gray-300">
                                Language - {{ company()->getCurrentLocale()->name }}
                            </p>
                        </div>
                    </div>
                </x-slot:content>
            </x-admin::dropdown>

            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('super.cms.index') }}"></x-admin::datagrid.export>

            {{-- Create New Pages Button --}}
            @if (companyBouncer()->hasPermission('cms.create'))
                <a
                    href="{{ route('super.cms.create') }}"
                    class="primary-button"
                >
                    @lang('saas::app.super.cms.index.create-btn')
                </a>
            @endif
        </div>
    </div>

    {!! view_render_event('bagisto.super.cms.pages.list.before') !!}

    <x-saas::datagrid src="{{ route('super.cms.index') }}" />
    
    {!! view_render_event('bagisto.super.cms.pages.list.after') !!}

</x-saas::layouts>
