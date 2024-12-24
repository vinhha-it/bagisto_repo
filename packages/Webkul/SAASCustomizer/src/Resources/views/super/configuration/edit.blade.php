@php
    $channels = company()->getAllChannels();

    $currentChannel = company()->getRequestedChannel();

    $currentLocale = company()->getRequestedSuperAdminLocale();

    $activeConfiguration = super_system_config()->getActiveConfigurationItem();
@endphp

<x-saas::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        {{ $title = $activeConfiguration->getName() }}
    </x-slot:title>

    <!-- Configuration form fields -->
    <x-admin::form 
        action=""
        enctype="multipart/form-data"
    >
        <!-- Header Section -->
        <div class="mt-4 flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                {{ $title }}
            </p>

            <!-- Submit Button -->
            <div class="flex items-center gap-x-2.5">
                <button 
                    type="submit"
                    class="primary-button"
                >
                    @lang('saas::app.super.configuration.index.save-btn')
                </button>
            </div>
        </div>

        <div class="items-centermt-7 flex justify-between gap-4 max-md:flex-wrap">
            <div class="flex items-center gap-x-1">
                <!-- Channel Switcher -->
                <x-admin::dropdown :class="$channels->count() <= 1 ? 'hidden' : ''">
                    <!-- Dropdown Toggler -->
                    <x-slot:toggle>
                        <button
                            type="button"
                            class="transparent-button px-1 py-1.5 hover:bg-gray-200 focus:bg-gray-200 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                        >
                            <span class="icon-store text-2xl"></span>
                            
                            {{ $currentChannel->name }}

                            <input type="hidden" name="channel" value="{{ $currentChannel->code }}"/>

                            <span class="icon-sort-down text-2xl"></span>
                        </button>
                    </x-slot:toggle>

                    <!-- Dropdown Content -->
                    <x-slot:content class="!p-0">
                        @foreach ($channels as $channel)
                            <a
                                href="?{{ Arr::query(['channel' => $channel->code, 'locale' => $currentLocale->code]) }}"
                                class="flex cursor-pointer gap-2.5 px-5 py-2 text-base hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950"
                            >
                                {{ $channel->name }}
                            </a>
                        @endforeach
                    </x-slot:content>
                </x-admin::dropdown>

                <!-- Locale Switcher -->
                <x-admin::dropdown :position="company()->getRequestedLocale()->direction == 'rtl' ? 'bottom-right' : 'bottom-left'">
                    <!-- Dropdown Toggler -->
                    <x-slot:toggle>
                        <button
                            type="button"
                            class="transparent-button px-1 py-1.5 hover:bg-gray-200 focus:bg-gray-200 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                        >
                            <span class="icon-language text-2xl"></span>

                            {{ $currentLocale->name }}
                            
                            <input type="hidden" name="locale" value="{{ $currentLocale->code }}"/>

                            <span class="icon-sort-down text-2xl"></span>
                        </button>
                    </x-slot:toggle>

                    <!-- Dropdown Content -->
                    <x-slot:content class="!p-0">
                        @foreach ($currentChannel->locales as $locale)
                            <a
                                href="?{{ Arr::query(['channel' => $currentChannel->code, 'locale' => $locale->code]) }}"
                                class="flex gap-2.5 px-5 py-2 text-base cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-950 dark:text-white {{ $locale->code == $currentLocale->code ? 'bg-gray-100 dark:bg-gray-950' : ''}}"
                            >
                                {{ $locale->name }}
                            </a>
                        @endforeach
                    </x-slot:content>
                </x-admin::dropdown>
            </div>
        </div>

        @if (! empty($children = $activeConfiguration->getChildren()))
            <div class="mt-6 grid grid-cols-[1fr_2fr] gap-2.5 max-xl:flex-wrap">
                @foreach ($children as $child)
                    <div>
                        <p class="text-base font-semibold text-gray-600 dark:text-gray-300">
                            {{ $child->getName() }}
                        </p>

                        <p class="mt-1 text-gray-600 dark:text-gray-300">
                            {{ $child->getInfo() }}
                        </p>
                    </div>

                    <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                        @foreach ($child->getFields() as $field)
                            @if (
                                $field->getType() == 'blade'
                                && view()->exists($path = $field->getPath())
                            )
                                {!! view($path, compact('field', 'child'))->render() !!}
                            @else 
                                @include ('saas::super.configuration.field-type')
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif
    </x-admin::form>
</x-admin::layouts>
