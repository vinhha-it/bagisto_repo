{!! view_render_event('bagisto.saas.companies.layout.footer.before') !!}

{{--
    The category repository is injected directly here because there is no way
    to retrieve it from the view composer, as this is an anonymous component.
--}}
@inject('companyThemeRepository', 'Webkul\SAASCustomizer\Repositories\Company\ThemeRepository')

{{--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
--}}
@php
    $customization = $companyThemeRepository->findOneWhere([
        'type'       => 'footer_links',
        'status'     => 1,
        'channel_id' => company()->getCurrentChannel()->id,
    ]);
    
    $defaultLocaleCode = company()->getCurrentChannel()->locales()->orderBy('name')->where('code', app()->getLocale())->value('code');

    $socialConnects = [
        [
            'code'      => 'facebook',
            'url'       => 'https://www.facebook.com/',
            'user_name' => company()->getSuperConfigData('general.agent.social_connect.facebook'),
        ], [
            'code'      => 'twitter',
            'url'       => 'https://twitter.com/',
            'user_name' => company()->getSuperConfigData('general.agent.social_connect.twitter'),
        ], [
            'code'      => 'linkedin',
            'url'       => 'https://www.linkedin.com/',
            'user_name' => company()->getSuperConfigData('general.agent.social_connect.linkedin'),
        ], [
            'code'      => 'email',
            'url'       => 'mailto:',
            'user_name' => company()->getSuperConfigData('general.agent.super.email'),
        ],
    ];
@endphp

<footer class="mt-9 bg-lightOrange max-sm:mt-8">
    @if ($customization)
        <div class="flex gap-x-6 gap-y-8 justify-between p-16 max-1060:flex-wrap max-1060:flex-col-reverse max-sm:px-4">
            <div class="flex gap-24 items-start flex-wrap max-1180:gap-6 max-1060:justify-between">
                @if ($customization->options)
                    @foreach ($customization->options as $footerLinkSection)
                        <ul class="grid gap-5 text-sm">
                            @php
                                usort($footerLinkSection, function ($a, $b) {
                                    return $a['sort_order'] - $b['sort_order'];
                                });
                            @endphp
                            
                            @foreach ($footerLinkSection as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">
                                        {{ $link['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>    
                    @endforeach
                @endif
            </div>
            
            {{-- Social Links --}}
            <div class="flex flex-col gap-2.5">
                <p class="">
                    <x-shop::form.control-group.label class="!mt-0">
                        @lang('saas::app.tenant.layouts.footer.connect-with-us')
                    </x-shop::form.control-group.label>
                </p>
                
                <div class="flex gap-6">
                    {!! view_render_event('bagisto.saas.companies.layout.footer.share.before') !!}
            
                    <div>
                        <ul class="flex gap-3">
                            @foreach($socialConnects as $social)

                                <li class="transition-all hover:opacity-[0.8]">
                                    <a 
                                        href="{{ $social['url'].$social['user_name'] }}"
                                        target="_blank"
                                        aria-label="{{ ucfirst($social['code']) }}"
                                    >
                                        @php
                                            $socialTemplate = 'social_share::icons.'.$social['code'];
                                        @endphp

                                        @include($socialTemplate)
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            
                    {!! view_render_event('bagisto.saas.companies.layout.footer.share.after') !!}
                </div>
            </div>
            
            {{-- Company Locale & Currency --}}
            <div class="grid gap-2.5">

                <v-locale-switcher></v-locale-switcher>

                <v-currency-switcher></v-currency-switcher>
            </div>

        </div>
    @endif

    <div class="flex justify-center px-16 py-3 bg-[#F1EADF] max-sm:px-8">
        <p class="text-sm text-[#4D4D4D]">
            @if (company()->getSuperConfigData('general.content.footer.footer_toggle'))
                {!! company()->getSuperConfigData('general.content.footer.footer_content') !!}
            @else
                @lang('saas::app.tenant.layouts.footer.footer-text')
            @endif
        </p>
    </div>
</footer>

{!! view_render_event('bagisto.saas.companies.layout.footer.after') !!}

@pushOnce('scripts')

    <script type="text/x-template" id="v-locale-switcher-template">
        <div>
            <x-shop::form class="mt-2.5 rounded max-sm:mt-8">
                <x-shop::form.control-group
                    class=" w-[160px] !mb-4"
                >
                    <x-shop::form.control-group.label class="!mt-0">
                        @lang('saas::app.tenant.layouts.footer.text-locale')
                    </x-shop::form.control-group.label>

                    <x-shop::form.control-group.control
                        type="select"
                        name="locale"
                        class="py-2 mb-2"
                        :label="trans('saas::app.tenant.layouts.footer.text-locale')"
                        :placeholder="trans('saas::app.tenant.layouts.footer.text-locale')"
                        v-model="defaultLocale"
                        @change="change($event)"
                    >
                        <option
                            v-for="locale in locales"
                            :value="locale.code"
                            :selected="locale.code == defaultLocale"
                            v-text="locale.name"
                        >
                        </option>
                    </x-shop::form.control-group.control>

                    <x-shop::form.control-group.error
                        control-name="locale"
                    >
                    </x-shop::form.control-group.error>
                </x-shop::form.control-group>
            </x-shop::form>
        </div>
    </script>

    <script type="text/x-template" id="v-currency-switcher-template">
        <div>
            <x-shop::form class="mt-2.5 rounded max-sm:mt-8">
                <x-shop::form.control-group
                    class=" w-[160px] !mb-4"
                >
                    <x-shop::form.control-group.label class="!mt-0">
                        @lang('saas::app.tenant.layouts.footer.text-currency')
                    </x-shop::form.control-group.label>

                    <x-company::form.control-group.control
                        type="select"
                        name="currency"
                        class="py-2 mb-2"
                        :label="trans('saas::app.tenant.layouts.footer.text-currency')"
                        :placeholder="trans('saas::app.tenant.layouts.footer.text-currency')"
                        v-model="defaultCurrency"
                        @change="change($event)"
                    >
                        <option
                            v-for="currency in currencies"
                            :value="currency.code"
                            :selected="currency.code == defaultCurrency"
                            v-text="currency.name"
                        >
                        </option>
                    </x-company::form.control-group.control>

                    <x-shop::form.control-group.error
                        control-name="currency"
                    >
                    </x-shop::form.control-group.error>
                </x-shop::form.control-group>
            </x-shop::form>
        </div>
    </script>

    <script type="module">
        app.component('v-locale-switcher', {
            template: '#v-locale-switcher-template',

            data() {
                return {
                    locales: @json(company()->getCurrentChannel()->locales()->orderBy('name')->get()),
                    
                    defaultLocale: '{{ $defaultLocaleCode }}',
                };
            },

            methods: {
                change: function(event) {
                    let url = new URL(window.location.href);

                    url.searchParams.set('company-locale', event.target.value);

                    window.location.href = url.href;
                }
            }
        });
        
        app.component('v-currency-switcher', {
            template: '#v-currency-switcher-template',

            data() {
                return {
                    currencies: @json(company()->getCurrentChannel()->currencies),

                    defaultCurrency: '{{ company()->getCurrentCurrencyCode() }}',
                };
            },

            methods: {
                change: function(event) {
                    let url = new URL(window.location.href);

                    url.searchParams.set('company-currency', event.target.value);

                    window.location.href = url.href;
                }
            }
        });
    </script>
@endPushOnce
