<?php

namespace Webkul\SAASCustomizer;

use Illuminate\Support\Facades\Config;
use Webkul\Core\Tree;
use Webkul\Core\Repositories\ChannelRepository as BaseChannelRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\SAASCustomizer\Contracts\SuperChannel;
use Webkul\SAASCustomizer\Repositories\Super\ChannelRepository;
use Webkul\SAASCustomizer\Repositories\Super\LocaleRepository;
use Webkul\SAASCustomizer\Repositories\Super\CurrencyRepository;
use Webkul\SAASCustomizer\Repositories\Super\ExchangeRateRepository;
use Webkul\SAASCustomizer\Repositories\Super\SuperConfigRepository;
use Webkul\SAASCustomizer\Repositories\Super\CompanyRepository;

class Company
{
    /**
     * The Bagisto Saas version.
     *
     * @var string
     */
    const SAAS_VERSION = '2.2.3';

    /**
     * Current Channel.
     *
     * @var \Webkul\Core\Models\Channel
     */
    protected $currentChannel;

    /**
     * Default Channel.
     *
     * @var \Webkul\Core\Models\Channel
     */
    protected $defaultChannel;

    /**
     * Currency.
     *
     * @var \Webkul\Core\Models\Currency
     */
    protected $currentCurrency;

    /**
     * Base Currency.
     *
     * @var \Webkul\Core\Models\Currency
     */
    protected $baseCurrency;

    /**
     * Current Locale.
     *
     * @var \Webkul\Core\Models\Locale
     */
    protected $currentLocale;

    /**
     * Guest Customer Group
     *
     * @var \Webkul\Customer\Models\CustomerGroup
     */
    protected $guestCustomerGroup;

    /**
     * Exchange rates
     *
     * @var array
     */
    protected $exchangeRates = [];

    /**
     * Exchange rates
     *
     * @var array
     */
    protected $taxCategoriesById = [];

    /**
     * Stores singleton instances
     *
     * @var array
     */
    protected $singletonInstances = [];

    /**
     * saas extensions collection
     *
     * @var array
     */
    protected $saasExtensions;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\ChannelRepository  $baseChannelRepository
     * @param  \Webkul\Customer\Repositories\CustomerGroupRepository  $customerGroupRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\ChannelRepository  $channelRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\LocaleRepository  $localeRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\CurrencyRepository  $currencyRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\ExchangeRateRepository  $exchangeRateRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\SuperConfigRepository  $superConfigRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\CompanyRepository  $companyRepository
     * @return void
     */
    public function __construct(
        protected BaseChannelRepository $baseChannelRepository,
        protected CustomerGroupRepository $customerGroupRepository,
        protected ChannelRepository $channelRepository,
        protected LocaleRepository $localeRepository,
        protected CurrencyRepository $currencyRepository,
        protected ExchangeRateRepository $exchangeRateRepository,
        protected SuperConfigRepository $superConfigRepository,
        protected CompanyRepository $companyRepository,
    ) {
        $this->saasExtensions = config('saas-extensions');
    }

    /**
     * Get the version number of the Bagisto Saas package.
     *
     * @return string
     */
    public function version()
    {
        return static::SAAS_VERSION;
    }

    public function isAllowed()
    {
        $primaryServerName = config('app.url');

        if (isset($_SERVER['HTTP_HOST']))
            $currentURL = $_SERVER['HTTP_HOST'];
        else
            $currentURL = $primaryServerName;

        $primaryServerNameWithoutProtocol = null;

        if (str_contains($primaryServerName, 'http://')) {
            $primaryServerNameWithoutProtocol = explode('http://', $primaryServerName)[1];
        } else if (str_contains($primaryServerName, 'https://')) {
            $primaryServerNameWithoutProtocol = explode('https://', $primaryServerName)[1];
        }

        if (str_contains($primaryServerNameWithoutProtocol, '/')) {
            $primaryServerNameWithoutProtocol = explode('/', $primaryServerNameWithoutProtocol)[0];
        }

        if ($currentURL == $primaryServerNameWithoutProtocol) {
            return true;
        } else {
            return false;
        }
    }

    protected function getAllRegisteredDomains()
    {
        return $this->companyRepository->all();
    }

    public function getCurrent($tenantDomain = null)
    {
        static $company;

        $path = 'saas';

        if (isset($company) && ! $tenantDomain ) {
            return $company;
        }

        $primaryServerName = config('app.url');

        $currentURL = $tenantDomain ? $tenantDomain : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $primaryServerName);

        if (str_contains($primaryServerName, 'http://')) {
            $primaryServerNameWithoutProtocol = explode('http://', $primaryServerName)[1];
        } else if (str_contains($primaryServerName, 'https://')) {
            $primaryServerNameWithoutProtocol = explode('https://', $primaryServerName)[1];
        }

        if (str_contains($currentURL, 'http://')) {
            $currentURL = explode('http://', $currentURL)[1];
        } else if (str_contains($currentURL, 'https://')) {
            $currentURL = explode('https://', $currentURL)[1];
        }

        if (str_contains($primaryServerNameWithoutProtocol, '/')) {
            $primaryServerNameWithoutProtocol = explode('/', $primaryServerNameWithoutProtocol)[0];
        }

        if ($currentURL == $primaryServerNameWithoutProtocol) {
            $company = 'super-company';

            return $company;
        } else {
            $company = $this->companyRepository->findWhere(['domain' => $currentURL]);

            if ($company->isEmpty()) {
                $cname = explode("www.", $currentURL);

                if (count($cname) > 1) {
                    $company = $this->companyRepository->where('cname', $cname[1])->orWhere('cname', $currentURL)->get();
                } else {
                    $company = $this->companyRepository->findWhere(['cname' => $currentURL]);
                }

                if ($company->isEmpty()) {
                    $baseChannel = $this->baseChannelRepository->findOneByField('hostname', $currentURL);
                    if ( isset($baseChannel->id) ) {
                        $company = $this->companyRepository->findOrFail($baseChannel->company_id);
                    } else {

                        return $this->response($path, 400, trans('saas::app.tenant.custom-errors.domain-not-found'), 'domain-not-found');
                    }
                } else {
                    $company = $company->first();

                    if ($company->is_active == 0) {
                        return $this->response($path, 400, trans('saas::app.tenant.custom-errors.domain-not-found'), 'company-blocked-by-administrator');
                    }
                }
            } else {
                $company = $company->first();

                if (! $company->is_active) {
                    return $this->response($path, 400, trans('saas::app.tenant.custom-errors.domain-not-found'), 'company-blocked-by-administrator');
                }
            }

            return $company;
        }
    }

    public function getCurrentDomain()
    {
        $sub_domain_url = '';
        $primaryServerName = config('app.url');

        if (isset($_SERVER['SERVER_NAME']))
            $currentURL = $_SERVER['SERVER_NAME'];
        else
            $currentURL = $primaryServerName;


        if (str_contains($primaryServerName, 'http://')) {
            $sub_domain_url = 'http://'.$currentURL;
        } else if (str_contains($primaryServerName, 'https://')) {
            $sub_domain_url = 'https://'.$currentURL;
        }

        if ( $sub_domain_url ) {
            return $sub_domain_url;
        } else {
            return $primaryServerName;
        }
    }

    private function response($path, $statusCode, $message = null, $type = null)
    {
        if (request()->expectsJson()) {
            return response()->json([
                    'error' => isset($this->jsonErrorMessages[$statusCode])
                        ? $this->jsonErrorMessages[$statusCode]
                        : trans('saas::app.tenant.registration.something-wrong-1')
                ], $statusCode);
        }

        if ($type == null) {
            return response()->view("{$path}::errors.{$statusCode}", ['message' => $message, 'status' => $statusCode], $statusCode);
        } else {
            return response()->view("{$path}::errors.{$type}", ['message' => $message, 'status' => $statusCode], $statusCode);
        }
    }

    /**
     * Returns if there are companies
     * already created
     */
    public function count()
    {
        return $this->companyRepository->findWhere([['id', '>', '0']])->count();
    }

    public function getPrimaryUrl()
    {
        $primaryServerNameWithoutProtocol = null;

        if (str_contains(config('app.url'), 'http://')) {
            $primaryServerNameWithoutProtocol = explode('http://', config('app.url'))[1];
        } else if (str_contains(config('app.url'), 'https://')) {
            $primaryServerNameWithoutProtocol = explode('https://', config('app.url'))[1];
        }

        return $primaryServerNameWithoutProtocol;
    }

    /**
     * Returns all channels.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllChannels()
    {
        return $this->channelRepository->all();
    }

    /**
     * Returns current channel models.
     *
     * @return \Webkul\SAASCustomizer\Contracts\SuperChannel
     */
    public function getCurrentChannel()
    {
        if ($this->currentChannel) {
            return $this->currentChannel;
        }

        $this->currentChannel = $this->channelRepository->findWhereIn('hostname', [
            request()->getHttpHost(),
            'http://'.request()->getHttpHost(),
            'https://'.request()->getHttpHost(),
        ])->first();

        if (! $this->currentChannel) {
            $this->currentChannel = $this->channelRepository->first();
        }

        return $this->currentChannel;
    }

    /**
     * Returns current channel code.
     *
     * @return \Webkul\SAASCustomizer\Contracts\SuperChannel
     */
    public function getCurrentChannelCode(): string
    {
        return $this->getCurrentChannel()?->code;
    }

    /**
     * Returns default channel models.
     *
     * @return \Webkul\SAASCustomizer\Contracts\SuperChannel
     */
    public function getDefaultChannel(): SuperChannel
    {
        if ($this->defaultChannel) {
            return $this->defaultChannel;
        }

        $this->defaultChannel = $this->channelRepository->findOneByField('code', config('app.channel'));

        if ($this->defaultChannel) {
            return $this->defaultChannel;
        }

        return $this->defaultChannel = $this->channelRepository->first();
    }

    /**
     * Returns the default channel code configured in `config/app.php`.
     *
     * @return string
     */
    public function getDefaultChannelCode(): string
    {
        return $this->getDefaultChannel()?->code;
    }

    /**
     * Returns default channel locale code.
     */
    public function getDefaultChannelLocaleCode(): string
    {
        return $this->getDefaultChannel()->default_locale->code;
    }

    /**
     * Get channel code from request.
     *
     * @return string
     */
    public function getRequestedChannel()
    {
        $code = request()->query('channel');

        if ($code) {
            return $this->channelRepository->findOneByField('code', $code);
        }

        return $this->getCurrentChannel();
    }

    /**
     * Get channel code from request.
     *
     * @param  bool  $fallback  optional
     * @return string
     */
    public function getRequestedChannelCode($fallback = true)
    {
        $channelCode = request()->get('channel');

        if (! $fallback) {
            return $channelCode;
        }

        return $channelCode ?: ($this->getCurrentChannelCode() ?: $this->getDefaultChannelCode());
    }

    /**
     * Returns the channel name.
     *
     * @return string
     */
    public function getChannelName($channel): string
    {
        return $channel->name ?? $channel->translate(app()->getLocale())->name ?? $channel->translate(config('app.fallback_locale'))->name;
    }

    /**
     * Return all locales.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllLocales()
    {
        return $this->localeRepository->all()->sortBy('name');
    }

    /**
     * Returns Super admin current locale.
     *
     * @return \Webkul\SAASCustomizer\Contracts\Locale
     */
    public function getSuperAdminCurrentLocale()
    {
        if ($this->currentLocale) {
            return $this->currentLocale;
        }

        $this->currentLocale = $this->localeRepository->findOneByField('code', env('APP_LOCALE'));

        if (! $this->currentLocale) {
            $this->currentLocale = $this->localeRepository->findOneByField('code', config('app.fallback_locale'));
        }

        return $this->currentLocale;
    }

    /**
     * Returns company current locale.
     *
     * @return \Webkul\SAASCustomizer\Contracts\Locale
     */
    public function getCurrentLocale()
    {
        if ($this->currentLocale) {
            return $this->currentLocale;
        }

        $this->currentLocale = $this->localeRepository->findOneByField('code', app()->getLocale());

        if (! $this->currentLocale) {
            $this->currentLocale = $this->localeRepository->findOneByField('code', config('app.fallback_locale'));
        }

        return $this->currentLocale;
    }

    /**
     * Get locale from request.
     *
     * @return string
     */
    public function getRequestedSuperAdminLocale()
    {
        $code = request()->query('locale');

        if ($code) {
            return $this->localeRepository->findOneByField('code', $code);
        }

        return $this->getSuperAdminCurrentLocale();
    }

    /**
     * Get locale from request.
     *
     * @return string
     */
    public function getRequestedLocale()
    {
        $code = request()->query('locale');

        if ($code) {
            return $this->localeRepository->findOneByField('code', $code);
        }

        return $this->getCurrentLocale();
    }

    /**
     * Get locale code from request. Here if you want to use admin locale,
     * you can pass it as an argument.
     *
     * @param  string  $localeKey  optional
     * @param  bool  $fallback  optional
     * @return string
     */
    public function getRequestedLocaleCode($localeKey = 'company-locale', $fallback = true)
    {
        $localeCode = request()->get($localeKey);

        if (! $fallback) {
            return $localeCode;
        }

        return $localeCode ?: app()->getLocale();
    }

    /**
     * Check requested locale code in requested channel. If not found,
     * then set channel default locale code.
     *
     * @return string
     */
    public function getRequestedLocaleCodeInRequestedChannel()
    {
        $requestedLocaleCode = $this->getRequestedLocaleCode();

        $requestedChannel = $this->getRequestedChannel();

        if ($requestedChannel->locales->contains('code', $requestedLocaleCode)) {
            return $requestedLocaleCode;
        }

        return $requestedChannel->default_locale->code;
    }

    /**
     * Return all locales which are present in requested channel.
     *
     * @return array
     */
    public function getAllLocalesInRequestedChannel()
    {
        $requestedChannel = $this->getRequestedChannel();

        return [
            'channel' => $requestedChannel,
            'locales' => $requestedChannel->locales->sortBy('name'),
        ];
    }

    /**
     * Returns all currencies.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllCurrencies()
    {
        return $this->currencyRepository->all();
    }

    /**
     * Returns base channel's currency model.
     *
     * @return \Webkul\SAASCustomizer\Contracts\Currency
     */
    public function getBaseCurrency()
    {
        if ($this->baseCurrency) {
            return $this->baseCurrency;
        }

        $this->baseCurrency = $this->currencyRepository->findOneByField('code', config('app.currency'));

        if (! $this->baseCurrency) {
            $this->baseCurrency = $this->currencyRepository->first();
        }

        return $this->baseCurrency;
    }

    /**
     * Returns base channel's currency code.
     *
     * @return string
     */
    public function getBaseCurrencyCode()
    {
        return $this->getBaseCurrency()?->code;
    }

    /**
     * Returns base channel's currency model.
     *
     * @return \Webkul\SAASCustomizer\Contracts\Currency
     */
    public function getChannelBaseCurrency()
    {
        return $this->getCurrentChannel()->base_currency;
    }

    /**
     * Returns base channel's currency code.
     *
     * @return string
     */
    public function getChannelBaseCurrencyCode()
    {
        return $this->getChannelBaseCurrency()?->code;
    }

    /**
     * Returns current channel's currency model.
     *
     * Will fallback to base currency if not set.
     *
     * @return \Webkul\SAASCustomizer\Contracts\Currency
     */
    public function getCurrentCurrency()
    {
        if ($this->currentCurrency) {
            return $this->currentCurrency;
        }

        return $this->currentCurrency = $this->getChannelBaseCurrency();
    }

    /**
     * Returns current channel's currency code.
     *
     * @return string
     */
    public function getCurrentCurrencyCode()
    {
        return $this->getCurrentCurrency()?->code;
    }

    /**
     * Get super admin's config field.
     *
     * @param  string  $fieldName
     * @return array
     */
    public function getSuperConfigField($fieldName)
    {
        foreach (config('company') as $coreData) {
            if (! isset($coreData['fields'])) {
                continue;
            }

            foreach ($coreData['fields'] as $field) {
                $name = $coreData['key'].'.'.$field['name'];

                if ($name == $fieldName) {
                    return $field;
                }
            }
        }
    }

    /**
     * Retrieve information from payment configuration.
     *
     * @param  string  $field
     * @param  int|string|null  $channelId
     * @param  string|null  $locale
     * @return mixed
     */
    public function getSuperConfigData($field, $channel = null, $locale = null)
    {
        if (empty($channel)) {
            $channel = $this->getRequestedChannelCode();
        }

        if (empty($locale)) {
            $locale = $this->getRequestedLocaleCode();
        }

        $coreConfig = $this->getCoreConfig($field, $channel, $locale);

        if (! $coreConfig) {
            return $this->getDefaultConfig($field);
        }

        return $coreConfig->value;
    }

    /**
     * Get core config values.
     *
     * @param  mixed  $field
     * @param  mixed  $channel
     * @param  mixed  $locale
     * @return mixed
     */
    protected function getCoreConfig($field, $channel, $locale)
    {
        $fields = $this->getSuperConfigField($field);

        if (! empty($fields['channel_based'])) {
            if (! empty($fields['locale_based'])) {
                $coreConfigValue = $this->superConfigRepository->findOneWhere([
                    'code'         => $field,
                    'channel_code' => $channel,
                    'locale_code'  => $locale,
                ]);
            } else {
                $coreConfigValue = $this->superConfigRepository->findOneWhere([
                    'code'         => $field,
                    'channel_code' => $channel,
                ]);
            }
        } else {
            if (! empty($fields['locale_based'])) {
                $coreConfigValue = $this->superConfigRepository->findOneWhere([
                    'code'        => $field,
                    'locale_code' => $locale,
                ]);
            } else {
                $coreConfigValue = $this->superConfigRepository->findOneWhere([
                    'code' => $field,
                ]);
            }
        }

        return $coreConfigValue;
    }

    /**
     * Get default config.
     *
     * @param  string  $field
     * @return mixed
     */
    protected function getDefaultConfig($field)
    {
        $configFieldInfo = $this->getSuperConfigField($field);

        $fields = explode('.', $field);

        array_shift($fields);

        $field = implode('.', $fields);

        return Config::get($field, $configFieldInfo['default'] ?? null);
    }

    /**
     * Method to sort through the acl items and put them in order.
     *
     * @param  array  $items
     * @return array
     */
    public function sortItems($items)
    {
        foreach ($items as &$item) {
            if (count($item['children'])) {
                $item['children'] = $this->sortItems($item['children']);
            }
        }

        usort($items, function ($a, $b) {
            if ($a['sort'] == $b['sort']) {
                return 0;
            }

            return ($a['sort'] < $b['sort']) ? -1 : 1;
        });

        return $this->convertToAssociativeArray($items);
    }

    /**
     * Convert to associative array.
     *
     * @param  array  $items
     * @return array
     */
    public function convertToAssociativeArray($items)
    {
        foreach ($items as $key1 => $level1) {
            unset($items[$key1]);

            $items[$level1['key']] = $level1;

            if (! count($level1['children'])) {
                continue;
            }

            foreach ($level1['children'] as $key2 => $level2) {
                $temp2 = explode('.', $level2['key']);

                $finalKey2 = end($temp2);

                unset($items[$level1['key']]['children'][$key2]);

                $items[$level1['key']]['children'][$finalKey2] = $level2;

                if (! count($level2['children'])) {
                    continue;
                }

                foreach ($level2['children'] as $key3 => $level3) {
                    $temp3 = explode('.', $level3['key']);

                    $finalKey3 = end($temp3);

                    unset($items[$level1['key']]['children'][$finalKey2]['children'][$key3]);

                    $items[$level1['key']]['children'][$finalKey2]['children'][$finalKey3] = $level3;
                }
            }
        }

        return $items;
    }

    /**
     * Get Super Admin's Side Menu.
     *
     * @return array
     */
    public function getMenuItems()
    {
        $tree = Tree::create();

        $permissionType = auth()->guard('super-admin')->user()->role->permission_type;

        $allowedPermissions = auth()->guard('super-admin')->user()->role->permissions;

        foreach (config('menu.super-admin') as $index => $item) {
            if (! companyBouncer()->hasPermission($item['key'])) {
                continue;
            }

            if (
                $index + 1 < count(config('menu.super-admin'))
                && $permissionType != 'all'
            ) {
                $permission = config('menu.super-admin')[$index + 1];

                if (
                    substr_count($permission['key'], '.') == 2
                    && substr_count($item['key'], '.') == 1
                ) {
                    foreach ($allowedPermissions as $key => $value) {
                        if ($item['key'] != $value) {
                            continue;
                        }

                        $neededItem = $allowedPermissions[$key + 1];

                        foreach (config('menu.super-admin') as $key1 => $menu) {
                            if ($menu['key'] == $neededItem) {
                                $item['route'] = $menu['route'];
                            }
                        }
                    }
                }
            }

            $tree->add($item, 'menu');
        }

        $tree->items = $this->sortItems($tree->items);

        return $tree;
    }
    
    /**
     * Get all customer group names.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllCustomerGroups()
    {
        $customerGroupNames = [];

        $customerGroups = $this->customerGroupRepository->with('company')->all();

        foreach ($customerGroups as $customerGroup) {
            array_push($customerGroupNames, [
                'label'    => $customerGroup->name.' - '.$customerGroup->company->domain,
                'value'    => $customerGroup->id,
            ]);
        }

        return $customerGroupNames;
    }
}
