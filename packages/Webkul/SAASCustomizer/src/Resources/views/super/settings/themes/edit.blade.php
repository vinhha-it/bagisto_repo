<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.settings.themes.edit.title')
    </x-slot:title>
   
    @php
        $channels = company()->getAllChannels();

        $currentChannel = company()->getRequestedChannel();

        $currentLocale = company()->getRequestedSuperAdminLocale();
    @endphp

    <x-admin::form 
        :action="route('super.settings.themes.update', $theme->id)"
        enctype="multipart/form-data"
        v-slot="{ errors }"
    >
        <div class="flex items-center justify-between">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('saas::app.super.settings.themes.edit.title')
            </p>
            
            <div class="flex items-center gap-x-2.5">
                <div class="flex items-center gap-x-2.5">
                    <a 
                        href="{{ route('super.settings.themes.index') }}"
                        class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                    > 
                        @lang('saas::app.super.settings.themes.edit.back')
                    </a>
                </div>
                
                <button 
                    type="submit"
                    class="primary-button"
                >
                    @lang('saas::app.super.settings.themes.edit.save-btn')
                </button>
            </div>
        </div>

        <!-- Channel and Locale Switcher -->
        <div class="mt-7 flex items-center justify-between gap-4 max-md:flex-wrap">
            <div class="flex items-center gap-x-1">
                <!-- Locale Switcher -->
                <x-admin::dropdown 
                    :position="company()->getRequestedLocale()->direction == 'rtl' ? 'bottom-right' : 'bottom-left'"
                    :class="$currentChannel->locales->count() <= 1 ? 'hidden' : ''"
                >
                    <!-- Dropdown Toggler -->
                    <x-slot:toggle>
                        <button
                            type="button"
                            class="transparent-button px-1 py-1.5 hover:bg-gray-200 focus:bg-gray-200 dark:text-white dark:hover:bg-gray-800 dark:focus:bg-gray-800"
                        >
                            <span class="icon-language text-2xl"></span>

                            {{ $currentLocale->name }}
                            
                            <input
                                type="hidden"
                                name="locale"
                                value="{{ $currentLocale->code }}"
                            />

                            <span class="icon-sort-down text-2xl"></span>
                        </button>
                    </x-slot:toggle>

                    <!-- Dropdown Content -->
                    <x-slot:content class="!p-0">
                        @foreach ($currentChannel->locales as $locale)
                            <a
                                href="?{{ Arr::query(['channel' => $currentChannel->code, 'locale' => $locale->code]) }}"
                                class="flex gap-2.5 px-5 py-2 text-base  cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-950 dark:text-white {{ $locale->code == $currentLocale->code ? 'bg-gray-100 dark:bg-gray-950' : ''}}"
                            >
                                {{ $locale->name }}
                            </a>
                        @endforeach
                    </x-slot:content>
                </x-admin::dropdown>
            </div>
        </div>

        <v-theme-customizer :errors="errors"></v-theme-customizer>
    </x-admin::form>

    @pushOnce('scripts')
        <!-- Customizer Parent Template-->
        <script type="text/x-template" id="v-theme-customizer-template">
            <div>
                <component
                    :errors="errors"
                    :is="componentName"
                    ref="dynamicComponentThemeRef"
                >
                </component>
            </div>
        </script>
        
        <!-- Image-Carousel Template -->
        @includeWhen($theme->type === 'image_carousel', 'saas::super.settings.themes.edit.image-carousel')

        <!-- Static-Content Template -->
        @includeWhen($theme->type === 'static_content', 'saas::super.settings.themes.edit.static-content')

        <!-- Footer Template -->
        @includeWhen($theme->type === 'footer_links', 'saas::super.settings.themes.edit.footer-links')

        <!-- Services-content Template -->
        @includeWhen($theme->type === 'services_content', 'saas::super.settings.themes.edit.services-content')


        <!-- Parent Theme Customizer Component -->
        <script type="module">
            app.component('v-theme-customizer', {
                template: '#v-theme-customizer-template',

                props: ['errors'],

                data() {
                    return {
                        componentName: 'v-image-carousel',

                        themeType: {
                            static_content: 'v-static-content',
                            image_carousel: 'v-image-carousel',
                            footer_links: 'v-footer-links',
                            services_content: 'v-services-content'
                        } 
                    };
                },

                created(){
                    this.componentName = this.themeType["{{ $theme->type }}"];
                },
            });
        </script>
    @endPushOnce
</x-saas::layouts>
                            