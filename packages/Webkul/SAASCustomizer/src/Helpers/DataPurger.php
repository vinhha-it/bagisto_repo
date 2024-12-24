<?php

namespace Webkul\SAASCustomizer\Helpers;

use Illuminate\Support\Facades\{DB, Log};
use Webkul\Attribute\Repositories\{AttributeRepository, AttributeFamilyRepository, AttributeGroupRepository};
use Webkul\Core\Repositories\{ChannelRepository, CoreConfigRepository, CurrencyRepository, LocaleRepository};
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\CMS\Repositories\PageRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;
use Webkul\Marketing\Repositories\EventRepository;
use Webkul\SAASCustomizer\Facades\Company;

/**
 * Class meant for preparing functional and sample data 
 * required for functioning of a new seller
 */
class DataPurger
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\AttributeRepository  $attributeRepository
     * @param  \Webkul\Attribute\Repositories\AttributeFamilyRepository  $attributeFamilyRepository
     * @param  \Webkul\Attribute\Repositories\AttributeGroupRepository  $attributeGroupRepository
     * @param  \Webkul\Core\Repositories\ChannelRepository  $channelRepository
     * @param  \Webkul\Core\Repositories\CoreConfigRepository  $coreConfigRepository
     * @param  \Webkul\Core\Repositories\CurrencyRepository  $currencyRepository
     * @param  \Webkul\Core\Repositories\LocaleRepository  $localeRepository
     * @param  \Webkul\Category\Repositories\CategoryRepository  $categoryRepository
     * @param  \Webkul\Customer\Repositories\CustomerGroupRepository  $customerGroupRepository
     * @param  \Webkul\CMS\Repositories\PageRepository  $pageRepository
     * @param  \Webkul\Inventory\Repositories\InventorySourceRepository  $inventorySourceRepository
     * @param  \Webkul\Theme\Repositories\ThemeCustomizationRepository  $themeCustomizationRepository
     * @param  \Webkul\Marketing\Repositories\EventRepository  $eventRepository
     * @return void
     */
    public function __construct(
        protected AttributeRepository $attributeRepository,
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected AttributeGroupRepository $attributeGroupRepository,
        protected LocaleRepository $localeRepository,
        protected CurrencyRepository $currencyRepository,
        protected ChannelRepository $channelRepository,
        protected CoreConfigRepository $coreConfigRepository,
        protected CategoryRepository $categoryRepository,
        protected CustomerGroupRepository $customerGroupRepository,
        protected PageRepository $pageRepository,
        protected InventorySourceRepository $inventorySourceRepository,
        protected ThemeCustomizationRepository $themeCustomizationRepository,
        protected EventRepository $eventRepository
    )
    {
    }

    /**
     * To prepare the country state data for
     * admin and customers country & state fields
     * auto population
     * 
     * @param mixed $tenantDomain
     */
    public function prepareCountryStateData($tenantDomain = null)
    {
        $countries = json_decode(file_get_contents(base_path().'/packages/Webkul/Installer/src/Data/countries.json'), true);

        DB::table('countries')->insert($countries);

        $states = json_decode(file_get_contents(base_path().'/packages/Webkul/Installer/src/Data/states.json'), true);

        DB::table('country_states')->insert($states);

        Log::info("Info:- prepareCountryStateData() created.");

        return true;
    }
    
    /**
     * Creates a Marketing event 
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareMarketingData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        $eventRepository = $this->eventRepository->updateOrCreate(
            ['name' => 'Birthday', 'company_id' => $companyRepository->id], 
            [
                'name'        => 'Birthday',
                'description' => 'Birthday',
                'company_id'    => $companyRepository->id
            ]
        );
        
        Log::info("Info:- prepareMarketingData() created for company ".$companyRepository->domain.".");

        return $eventRepository;
    }

    /**
     * Creates a default locale
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareLocaleData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        foreach (company()->getAllLocales() as $locale) {
            $this->localeRepository->updateOrCreate(
                ['code' => $locale->code, 'company_id' => $companyRepository->id], 
                [
                    'code'          => $locale->code,
                    'name'          => $locale->name,
                    'direction'     => $locale->direction,
                    'company_id'    => $companyRepository->id
                ]
            );
        }
        
        Log::info("Info:- prepareLocaleData() created for company ".$companyRepository->domain.".");

        return $this->localeRepository->findWhere(['company_id' => $companyRepository->id]);
    }

    /**
     * Prepares a default currency
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareCurrencyData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);
        
        foreach (company()->getAllCurrencies() as $currency) {
            $this->currencyRepository->updateOrCreate(
                ['code' => $currency->code, 'company_id' => $companyRepository->id], 
                [
                    'code'          => $currency->code,
                    'name'          => $currency->name,
                    'symbol'        => $currency->symbol,
                    'company_id'    => $companyRepository->id
                ]
            );
        }

        Log::info("Info:- prepareCurrencyData() created for company ".$companyRepository->domain.".");

        return $this->currencyRepository->findWhere(['company_id' => $companyRepository->id]);
    }

    /**
     * Prepares category data
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareCategoryData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        $categoryRepository = $this->categoryRepository->create(
            [
                'position'          => '1',
                'image'             => NULL,
                'status'            => '1',
                'parent_id'         => NULL,
                'name'              => 'Root',
                'slug'              => 'root',
                'description'       => 'Root',
                'meta_title'        => '',
                'meta_description'  => '',
                'meta_keywords'     => '',
                'locale'            => 'all',
                'company_id'        => $companyRepository->id
            ]
        );

        Log::info("Info:- prepareCategoryData() created for company ".$companyRepository->domain.".");

        return $categoryRepository;
    }

    /**
     * Prepares data for a default inventory
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareInventoryData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        $inventorySourceRepository = $this->inventorySourceRepository->updateOrCreate(
            ['code' => 'default', 'company_id' => $companyRepository->id], 
            [
                'code'              => 'default',
                'name'              => 'Default',
                'contact_name'      => 'Detroit Warehouse',
                'contact_email'     => 'warehouse@example.com',
                'contact_number'    => '123456789',
                'status'            => 1,
                'country'           => 'US',
                'state'             => 'MI',
                'street'            => '12th Street',
                'city'              => 'Detroit',
                'postcode'          => '48127',
                'company_id'        => $companyRepository->id
            ]
        );

        Log::info("Info:- prepareInventoryData() created for company ".$companyRepository->domain.".");

        return $inventorySourceRepository;
    }

    /**
     * Prepares a default channel
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareChannelData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);
        
        $locales = $this->prepareLocaleData($tenantDomain);

        $currencies = $this->prepareCurrencyData($tenantDomain);

        $inventorySourceRepository = $this->prepareInventoryData($tenantDomain);

        $channelRepository = $this->channelRepository->create(
            [
                'company_id'        => $companyRepository->id,
                'code'              => $companyRepository->username,
                'name'              => 'Default Channel',
                'description'       => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industries standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'inventory_sources' => [
                    0               => $inventorySourceRepository->id
                ],
                'root_category_id'  => NULL,
                'hostname'          => $companyRepository->domain,
                'locales'           => $locales->pluck('id')->toArray(),
                'default_locale_id' => $locales->where('code', 'en')->first()?->id ?? $locales->first()->id,
                'currencies'        => $currencies->pluck('id')->toArray(),
                'base_currency_id'  => $currencies->where('code', 'USD')->first()?->id ?? $currencies->first()->id,
                'theme'             => 'default',
                'home_seo'          => [
                    'meta_title'        => "Default Channel",
                    'meta_description'  => "Default Channel Description",
                    'meta_keywords'     => "Default Channel"
                ],
            ]
        );
        
        $categoryRepository = $this->prepareCategoryData($tenantDomain);

        if ( isset($channelRepository->id) ) {

            $channelRepository->root_category_id = $categoryRepository->id;
            $channelRepository->save();

            $companyRepository->channel_id = $channelRepository->id;
            $companyRepository->save();
        }

        Log::info("Info:- prepareChannelData() created for company ".$companyRepository->domain.".");

        return $channelRepository;
    }

    /**
     * Prepare data for the customer groups
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareCustomerGroupData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        $data = [
            'guest'     => [
                'code'              => 'guest',
                'name'              => 'Guest',
                'is_user_defined'   => 0,
                'company_id'        => $companyRepository->id
            ],
            'general'   => [
                'id'                => 1,
                'code'              => 'general',
                'name'              => 'General',
                'is_user_defined'   => 0,
                'company_id'        => $companyRepository->id
            ],
            'wholesale' => [
                'id'                => 2,
                'code'              => 'wholesale',
                'name'              => 'Wholesale',
                'is_user_defined'   => 0,
                'company_id'        => $companyRepository->id
            ]
        ];

        Log::info("Info:- prepareCustomerGroupData() created for company ".$companyRepository->domain.".");

        return [
            'guest'     => $this->customerGroupRepository->updateOrCreate(
                ['code' => 'guest', 'company_id' => $companyRepository->id], $data['guest']
            ),
            'default'     => $this->customerGroupRepository->updateOrCreate(
                ['code' => 'general', 'company_id' => $companyRepository->id], $data['general']
            ),
            'wholesale'     => $this->customerGroupRepository->updateOrCreate(
                ['code' => 'wholesale', 'company_id' => $companyRepository->id], $data['wholesale']
            )
        ];
    }

    /**
     * Prepare Attribute Data
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareAttributeData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        $this->attributeRepository->updateOrCreate(
            ['code' => 'sku', 'company_id' => $companyRepository->id],
            [
                'code'                => 'sku',
                'admin_name'          => 'SKU',
                'type'                => 'text',
                'validation'          => NULL,
                'position'            => 1,
                'is_required'         => 1,
                'is_unique'           => 1,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'SKU'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'product_number', 'company_id' => $companyRepository->id],
            [
                'code'                => 'product_number',
                'admin_name'          => 'Product Number',
                'type'                => 'text',
                'validation'          => NULL,
                'position'            => '2',
                'is_required'         => 0,
                'is_unique'           => 1,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Product Number'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'manage_stock', 'company_id' => $companyRepository->id],
            [
                'code'                => 'manage_stock',
                'admin_name'          => 'Manage Stock',
                'type'                => 'boolean',
                'default_value'       => 1,
                'validation'          => NULL,
                'position'            => 1,
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Manage Stock'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'name', 'company_id' => $companyRepository->id],
            [
                'code'                => 'name',
                'admin_name'          => 'Name',
                'type'                => 'text',
                'validation'          => NULL,
                'position'            => '3',
                'is_required'         => 1,
                'is_unique'           => 0,
                'value_per_locale'    => 1,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 1,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Name'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'url_key', 'company_id' => $companyRepository->id],
            [
                'code'                => 'url_key',
                'admin_name'          => 'URL Key',
                'type'                => 'text',
                'validation'          => NULL,
                'position'            => '4',
                'is_required'         => 1,
                'is_unique'           => 1,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'URL Key'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'tax_category_id', 'company_id' => $companyRepository->id],
            [
                'code'                => 'tax_category_id',
                'admin_name'          => 'Tax Category',
                'type'                => 'select',
                'validation'          => NULL,
                'position'            => '5',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Tax Category'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'new', 'company_id' => $companyRepository->id],
            [
                'code'                => 'new',
                'admin_name'          => 'New',
                'type'                => 'boolean',
                'validation'          => NULL,
                'position'            => '6',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'New'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'featured', 'company_id' => $companyRepository->id],
            [
                'code'                => 'featured',
                'admin_name'          => 'Featured',
                'type'                => 'boolean',
                'validation'          => NULL,
                'position'            => '7',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Featured'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'guest_checkout', 'company_id' => $companyRepository->id],
            [
                'code'                => 'guest_checkout',
                'admin_name'          => 'Guest Checkout',
                'type'                => 'boolean',
                'validation'          => NULL,
                'position'            => '8',
                'is_required'         => 1,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Guest Checkout'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'visible_individually', 'company_id' => $companyRepository->id],
            [
                'code'                => 'visible_individually',
                'admin_name'          => 'Visible Individually',
                'type'                => 'boolean',
                'validation'          => NULL,
                'position'            => '9',
                'is_required'         => 1,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Visible Individually'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'status', 'company_id' => $companyRepository->id],
            [
                'code'                => 'status',
                'admin_name'          => 'Status',
                'type'                => 'boolean',
                'validation'          => NULL,
                'position'            => '10',
                'is_required'         => 1,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Status'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'short_description', 'company_id' => $companyRepository->id],
            [
                'code'                => 'short_description',
                'admin_name'          => 'Short Description',
                'type'                => 'textarea',
                'validation'          => NULL,
                'position'            => '11',
                'is_required'         => 1,
                'is_unique'           => 0,
                'value_per_locale'    => 1,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Short Description'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'description', 'company_id' => $companyRepository->id],
            [
                'code'                => 'description',
                'admin_name'          => 'Description',
                'type'                => 'textarea',
                'validation'          => NULL,
                'position'            => '12',
                'is_required'         => 1,
                'is_unique'           => 0,
                'value_per_locale'    => 1,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 1,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Description'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'price', 'company_id' => $companyRepository->id],
            [
                'code'                => 'price',
                'admin_name'          => 'Price',
                'type'                => 'price',
                'validation'          => 'decimal',
                'position'            => '13',
                'is_required'         => 1,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 1,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 1,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Price'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'cost', 'company_id' => $companyRepository->id],
            [
                'code'                => 'cost',
                'admin_name'          => 'Cost',
                'type'                => 'price',
                'validation'          => 'decimal',
                'position'            => '14',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Cost'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'special_price', 'company_id' => $companyRepository->id],
            [
                'code'                => 'special_price',
                'admin_name'          => 'Special Price',
                'type'                => 'price',
                'validation'          => 'decimal',
                'position'            => '15',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Special Price'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'special_price_from', 'company_id' => $companyRepository->id],
            [
                'code'                => 'special_price_from',
                'admin_name'          => 'Special Price From',
                'type'                => 'date',
                'validation'          => NULL,
                'position'            => '16',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Special Price From'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'special_price_to', 'company_id' => $companyRepository->id],
            [
                'code'                => 'special_price_to',
                'admin_name'          => 'Special Price To',
                'type'                => 'date',
                'validation'          => NULL,
                'position'            => '17',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Special Price To'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'meta_title', 'company_id' => $companyRepository->id],
            [
                'code'                => 'meta_title',
                'admin_name'          => 'Meta Title',
                'type'                => 'textarea',
                'validation'          => NULL,
                'position'            => '18',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 1,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Meta Title'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'meta_keywords', 'company_id' => $companyRepository->id],
            [
                'code'                => 'meta_keywords',
                'admin_name'          => 'Meta Keywords',
                'type'                => 'textarea',
                'validation'          => NULL,
                'position'            => '20',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 1,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Meta Keywords'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'meta_description', 'company_id' => $companyRepository->id],
            [
                'code'                => 'meta_description',
                'admin_name'          => 'Meta Description',
                'type'                => 'textarea',
                'validation'          => NULL,
                'position'            => '21',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 1,
                'value_per_channel'   => 1,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Meta Description'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'length', 'company_id' => $companyRepository->id],
            [
                'code'                => 'length',
                'admin_name'          => 'Length',
                'type'                => 'text',
                'validation'          => 'decimal',
                'position'            => '22',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Length'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'width', 'company_id' => $companyRepository->id],
            [
                'code'                => 'width',
                'admin_name'          => 'Width',
                'type'                => 'text',
                'validation'          => 'decimal',
                'position'            => '23',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Width'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'height', 'company_id' => $companyRepository->id],
            [
                'code'                => 'height',
                'admin_name'          => 'Height',
                'type'                => 'text',
                'validation'          => 'decimal',
                'position'            => '24',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Height'],
            ]
        );

        $this->attributeRepository->updateOrCreate(
            ['code' => 'weight', 'company_id' => $companyRepository->id],
            [
                'code'                => 'weight',
                'admin_name'          => 'Weight',
                'type'                => 'text',
                'validation'          => 'decimal',
                'position'            => '25',
                'is_required'         => 1,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 0,
                'is_visible_on_front' => 0,
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Weight'],
            ]
        );

        $this->attributeRepository->create(
            [
                'code'                => 'color',
                'admin_name'          => 'Color',
                'type'                => 'select',
                'validation'          => NULL,
                'position'            => '26',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 1,
                'is_configurable'     => 1,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'swatch_type'         => 'color',
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Color'],
                'options'             => [
                    'option_0'          => ['admin_name' => 'Red', 'en' => ['label' => 'Red'], 'sort_order' => 1, 'swatch_value' => '#ff0000'],
                    'option_1'          => ['admin_name' => 'Green', 'en' => ['label' => 'Green'], 'sort_order' => '2', 'swatch_value' => '#00814B'],
                    'option_2'          => ['admin_name' => 'Yellow', 'en' => ['label' => 'Yellow'], 'sort_order' => '3', 'swatch_value' => '#F4DE17'],
                    'option_3'          => ['admin_name' => 'Black', 'en' => ['label' => 'Black'], 'sort_order' => '3', 'swatch_value' => '#000000'],
                    'option_4'          => ['admin_name' => 'White', 'en' => ['label' => 'White'], 'sort_order' => '4', 'swatch_value' => '#f3f3f3'],
                    'option_5'          => ['admin_name' => 'Blue', 'en' => ['label' => 'Blue'], 'sort_order' => '5', 'swatch_value' => '#261693'],
                    'option_6'          => ['admin_name' => 'Sky-Blue', 'en' => ['label' => 'Sky-Blue'], 'sort_order' => '6', 'swatch_value' => '#00C3FF'],
                ],
            ]
        );

        $this->attributeRepository->create(
            [
                'code'                => 'size',
                'admin_name'          => 'Size',
                'type'                => 'select',
                'validation'          => NULL,
                'position'            => '27',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 1,
                'is_configurable'     => 1,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'swatch_type'         => 'text',
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Size'],
                'options'             => [
                    'option_0'              => ['admin_name' => 'S', 'en' => ['label' => 'S'], 'sort_order' => '1'],
                    'option_1'              => ['admin_name' => 'M', 'en' => ['label' => 'M'], 'sort_order' => '2'],
                    'option_2'              => ['admin_name' => 'L', 'en' => ['label' => 'L'], 'sort_order' => '3'],
                    'option_3'              => ['admin_name' => 'XL', 'en' => ['label' => 'XL'], 'sort_order' => '4'],
                ],
            ]
        );

        $this->attributeRepository->create(
            [
                'code'                => 'brand',
                'admin_name'          => 'Brand',
                'type'                => 'select',
                'validation'          => NULL,
                'position'            => '28',
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'is_filterable'       => 1,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 1,
                'swatch_type'         => 'text',
                'is_comparable'       => 0,
                'company_id'          => $companyRepository->id,
                'en'                  => ['name' => 'Brand'],
                'options'             => [
                    'option_0'          => ['admin_name' => 'Nike', 'en' => ['label' => 'Nike'], 'sort_order' => 1],
                    'option_1'          => ['admin_name' => 'Adidas', 'en' => ['label' => 'Adidas'], 'sort_order' => 2],
                    'option_2'          => ['admin_name' => 'Puma', 'en' => ['label' => 'Puma'], 'sort_order' => '3'],
                    'option_3'          => ['admin_name' => 'Reebok', 'en' => ['label' => 'Reebok'], 'sort_order' => 2],
                ],
            ]
        );

        Log::info("Info:- prepareAttributeData() created for company ".$companyRepository->domain.".");

        $this->prepareAttributeFamilyData($tenantDomain);

        $this->prepareAttributeGroupData($tenantDomain);

        return true;
    }

    /**
     * To prepare the attribute family
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareAttributeFamilyData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        $attributeFamily = $this->attributeFamilyRepository->updateOrCreate(
            ['code' => 'default', 'company_id' => $companyRepository->id],
            [
                'code'            => 'default',
                'name'            => 'Default',
                'status'          => '0',
                'is_user_defined' => '1',
                'company_id'      => $companyRepository->id
            ]
        );

        Log::info("Info:- prepareAttributeFamilyData() created for company ".$companyRepository->domain.".");

        return $attributeFamily;
    }

    /**
     * To prepare the attribute group mappings
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareAttributeGroupData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        $attributeFamilyRepository = $this->attributeFamilyRepository->findOneWhere([
            'company_id'    => $companyRepository->id
        ]);

        $attributes = $this->attributeRepository->findByField('company_id', $companyRepository->id)->pluck('id', 'code')->toArray();

        $group1 = ['sku', 'product_number', 'name', 'url_key', 'tax_category_id', 'color', 'size', 'brand'];
        $group2 = ['short_description', 'description'];
        $group3 = ['meta_title', 'meta_keywords', 'meta_description'];
        $group4 = ['price', 'cost', 'special_price', 'special_price_from', 'special_price_to'];
        $group5 = ['length', 'width', 'height', 'weight'];
        $group6 = ['new', 'featured', 'visible_individually', 'status', 'guest_checkout'];
        $group7 = ['manage_stock'];

        // creating group 1
        $attributeGroupRepository = $this->attributeGroupRepository->updateOrCreate(
            ['name' => 'General', 'company_id' => $companyRepository->id],
            [
                'code'                => 'general',
                'name'                => 'General',
                'column'              => 1,
                'is_user_defined'     => 0,
                'position'            => 1,
                'attribute_family_id' => $attributeFamilyRepository->id,
                'company_id'          => $companyRepository->id
            ]
        );

        $i = 1;
        foreach($group1 as $code) {
            if (! empty($attributes[$code])) {
                DB::table('attribute_group_mappings')->insert([
                    [
                        'attribute_id'          => $attributes[$code],
                        'attribute_group_id'    => $attributeGroupRepository->id,
                        'position'              => $i
                    ]
                ]);
            }
            $i++;
        }

        // creating group 2
        $attributeGroupRepository = $this->attributeGroupRepository->updateOrCreate(
            ['name' => 'Description', 'company_id' => $companyRepository->id],
            [
                'code'                => 'description',
                'name'                => 'Description',
                'column'              => 1,
                'is_user_defined'     => 0,
                'position'            => 2,
                'attribute_family_id' => $attributeFamilyRepository->id,
                'company_id'          => $companyRepository->id
            ]
        );

        $i = 1;
        foreach($group2 as $code) {
            if (! empty($attributes[$code])) {
                DB::table('attribute_group_mappings')->insert([
                    [
                        'attribute_id'          => $attributes[$code],
                        'attribute_group_id'    => $attributeGroupRepository->id,
                        'position'              => $i
                    ]
                ]);
            }
            $i++;
        }

        // creating group 3
        $attributeGroupRepository = $this->attributeGroupRepository->updateOrCreate(
            ['name' => 'Meta Description', 'company_id' => $companyRepository->id],
            [
                'code'                => 'meta_description',
                'name'                => 'Meta Description',
                'column'              => 1,
                'is_user_defined'     => 0,
                'position'            => 3,
                'attribute_family_id' => $attributeFamilyRepository->id,
                'company_id'          => $companyRepository->id
            ]
        );

        $i = 1;
        foreach($group3 as $code) {
            if (! empty($attributes[$code])) {
                DB::table('attribute_group_mappings')->insert([
                    [
                        'attribute_id'          => $attributes[$code],
                        'attribute_group_id'    => $attributeGroupRepository->id,
                        'position'              => $i
                    ]
                ]);
            }
            $i++;
        }

        // creating group 4
        $attributeGroupRepository = $this->attributeGroupRepository->updateOrCreate(
            ['name' => 'Price', 'company_id' => $companyRepository->id], 
            [
                'code'                => 'price',
                'name'                => 'Price',
                'column'              => 2,
                'is_user_defined'     => 0,
                'position'            => 1,
                'attribute_family_id' => $attributeFamilyRepository->id,
                'company_id'          => $companyRepository->id
            ]
        );

        $i = 1;
        foreach($group4 as $code) {
            if (! empty($attributes[$code])) {
                DB::table('attribute_group_mappings')->insert([
                    [
                        'attribute_id'          => $attributes[$code],
                        'attribute_group_id'    => $attributeGroupRepository->id,
                        'position'              => $i
                    ]
                ]);
            }
            $i++;
        }

        // creating group 5
        $attributeGroupRepository = $this->attributeGroupRepository->updateOrCreate(
            ['name' => 'Shipping', 'company_id' => $companyRepository->id], 
            [
                'code'                => 'shipping',
                'name'                => 'Shipping',
                'column'              => 2,
                'is_user_defined'     => 0,
                'position'            => 2,
                'attribute_family_id' => $attributeFamilyRepository->id,
                'company_id'          => $companyRepository->id
            ]
        );

        $i = 1;
        foreach($group5 as $code) {
            if (! empty($attributes[$code])) {
                DB::table('attribute_group_mappings')->insert([
                    [
                        'attribute_id'          => $attributes[$code],
                        'attribute_group_id'    => $attributeGroupRepository->id,
                        'position'              => $i
                    ]
                ]);
            }
            $i++;
        }

        // creating group 6
        $attributeGroupRepository = $this->attributeGroupRepository->updateOrCreate(
            ['name' => 'Settings', 'company_id' => $companyRepository->id], 
            [
                'code'                => 'settings',
                'name'                => 'Settings',
                'column'              => 2,
                'is_user_defined'     => 0,
                'position'            => 3,
                'attribute_family_id' => $attributeFamilyRepository->id,
                'company_id'          => $companyRepository->id
            ]
        );

        $i = 1;
        foreach($group6 as $code) {
            if (! empty($attributes[$code])) {
                DB::table('attribute_group_mappings')->insert([
                    [
                        'attribute_id'          => $attributes[$code],
                        'attribute_group_id'    => $attributeGroupRepository->id,
                        'position'              => $i
                    ]
                ]);
            }
            $i++;
        }

        // creating group 7
        $attributeGroupRepository = $this->attributeGroupRepository->updateOrCreate(
            ['name' => 'Inventories', 'company_id' => $companyRepository->id], 
            [
                'code'                => 'inventories',
                'name'                => 'Inventories',
                'column'              => 2,
                'is_user_defined'     => 0,
                'position'            => 4,
                'attribute_family_id' => $attributeFamilyRepository->id,
                'company_id'          => $companyRepository->id
            ]
        );

        $i = 1;
        foreach($group7 as $code) {
            if (! empty($attributes[$code])) {
                DB::table('attribute_group_mappings')->insert([
                    [
                        'attribute_id'          => $attributes[$code],
                        'attribute_group_id'    => $attributeGroupRepository->id,
                        'position'              => $i
                    ]
                ]);
            }
            $i++;
        }

        Log::info("Info:- prepareAttributeGroupData() created for company ".$companyRepository->domain.".");

        return true;
    }

    /**
     * To prepare the cms pages data for the seller's shop
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareCMSPagesData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);
        
        $channelRepository = $this->channelRepository->findOneWhere([
            'company_id' => $companyRepository->id,
            'code'       => $companyRepository->username,
        ]);

        $this->pageRepository->create([
            'company_id'       => $companyRepository->id,
            'url_key'          => 'about-us',
            'html_content'     => '<div class="static-container">
                                <div class="mb-5">About us page content</div>
                                </div>',
            'page_title'       => 'About Us',
            'meta_title'       => 'about us',
            'meta_description' => 'about us',
            'meta_keywords'    => 'aboutus',
            'channels'         => [$channelRepository->id]
        ]);

        $this->pageRepository->create([
            'company_id'       => $companyRepository->id,
            'url_key'          => 'return-policy',
            'html_content'     => '<div class="static-container">
                               <div class="mb-5">Return policy page content</div>
                               </div>',
            'page_title'       => 'Return Policy',
            'meta_title'       => 'return policy',
            'meta_description' => 'return policy',
            'meta_keywords'    => 'return, policy',
            'channels'         => [$channelRepository->id]
        ]);

        $this->pageRepository->create([
            'company_id'       => $companyRepository->id,
            'url_key'          => 'refund-policy',
            'html_content'     => '<div class="static-container">
                               <div class="mb-5">Refund policy page content</div>
                               </div>',
            'page_title'       => 'Refund Policy',
            'meta_title'       => 'Refund policy',
            'meta_description' => 'Refund policy',
            'meta_keywords'    => 'refund, policy',
            'channels'         => [$channelRepository->id]
        ]);

        $this->pageRepository->create([
            'company_id'       => $companyRepository->id,
            'url_key'          => 'terms-conditions',
            'html_content'     => '<div class="static-container">
                               <div class="mb-5">Terms & conditions page content</div>
                               </div>',
            'page_title'       => 'Terms & Conditions',
            'meta_title'       => 'Terms & Conditions',
            'meta_description' => 'Terms & Conditions',
            'meta_keywords'    => 'term, conditions',
            'channels'         => [$channelRepository->id]
        ]);

        $this->pageRepository->create([
            'company_id'       => $companyRepository->id,
            'url_key'          => 'terms-of-use',
            'html_content'     => '<div class="static-container">
                               <div class="mb-5">Terms of use page content</div>
                               </div>',
            'page_title'       => 'Terms of use',
            'meta_title'       => 'Terms of use',
            'meta_description' => 'Terms of use',
            'meta_keywords'    => 'term, use',
            'channels'         => [$channelRepository->id]
        ]);

        $this->pageRepository->create([
            'company_id'       => $companyRepository->id,
            'url_key'          => 'contact-us',
            'html_content'     => '<div class="static-container">
                               <div class="mb-5">Contact us page content</div>
                               </div>',
            'page_title'       => 'Contact Us',
            'meta_title'       => 'Contact Us',
            'meta_description' => 'Contact Us',
            'meta_keywords'    => 'contact, us',
            'channels'         => [$channelRepository->id]
        ]);

        Log::info("Info:- prepareCMSPagesData() created for company ".$companyRepository->domain.".");

        return true;
    }

    /**
     * To prepare the Theme data for the tenant's shop
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareThemeData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);
        
        $channelRepository = $this->channelRepository->findOneWhere([
            'company_id' => $companyRepository->id,
            'code'       => $companyRepository->username,
        ]);

        $locales = $this->localeRepository->findByField('company_id', $companyRepository->id);

        $imageCarousel = $this->themeCustomizationRepository->create([
            'name'       => 'Image Carousel',
            'sort_order' => 1,
            'status'     => 1,
            'type'       => 'image_carousel',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($imageCarousel) {
            $imageCarousel->channel_id = $channelRepository->id;
            $imageCarousel->save();

            $imageCarouselTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($imageCarouselTranslations, [
                    'theme_customization_id' => $imageCarousel->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'images' => [
                            [
                                'image' => 'storage/theme/default/sliders/S8N4DvKOOiPEvJF80OUkjWgDCLdgjkZKGXfqTxhR.webp',
                                'title' => 'Get Ready For New Collection'
                            ],  [
                                'image' => 'storage/theme/default/sliders/xFS2LaWB26L0G7HKYUtYqoVzwS72YPhem9H5DU17.webp',
                                'title' => 'Get Ready For New Collection'
                            ],  [
                                'image' => 'storage/theme/default/sliders/aUQiLgqoUxd9uggAM7tKRvUtGzl19LhKHuBBtMWj.webp',
                                'title' => 'Get Ready For New Collection'
                            ],  [
                                'image' => 'storage/theme/default/sliders/cUGiZpq9o80GZnpDsXtdATJLbagN4DL7G9OXskOL.webp',
                                'title' => 'Get Ready For New Collection'
                            ]
                        ]
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($imageCarouselTranslations);
        }

        $offerInformation = $this->themeCustomizationRepository->create([
            'name'       => 'Offer Information',
            'sort_order' => 2,
            'status'     => 1,
            'type'       => 'static_content',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($offerInformation) {
            $offerInformation->channel_id = $channelRepository->id;
            $offerInformation->save();
            
            $offerInformationTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($offerInformationTranslations, [
                    'theme_customization_id' => $offerInformation->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'css' => '.home-offer h1 {display: block;font-weight: 500;text-align: center;font-size: 22px;font-family: DM Serif Display;background-color: #E8EDFE;padding-top: 20px;padding-bottom: 20px;}@media (max-width:768px) {.home-offer h1 {font-size:18px;}@media (max-width:525px) {.home-offer h1 {font-size:14px;}}',
                        'html' => '<div class="home-offer"><h1>Get UPTO 40% OFF on your 1st order SHOP NOW</h1></div>'
                    ]),
                ]);
            }
                
            DB::table('theme_customization_translations')
            ->insert($offerInformationTranslations);
        }

        $categoriesCollections = $this->themeCustomizationRepository->create([
            'name'       => 'Categories Collections',
            'sort_order' => 3,
            'status'     => 1,
            'type'       => 'category_carousel',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($categoriesCollections) {
            $categoriesCollections->channel_id = $channelRepository->id;
            $categoriesCollections->save();
            
            $categoriesCollectionsTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($categoriesCollectionsTranslations, [
                    'theme_customization_id' => $categoriesCollections->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'filters'               => [
                            'sort'                  => 'asc',
                            'limit'                 => '10',
                            'parent_id'             => '1',
                        ]
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($categoriesCollectionsTranslations);
        }

        $newProducts = $this->themeCustomizationRepository->create([
            'name'       => 'New Products',
            'sort_order' => 4,
            'status'     => 1,
            'type'       => 'product_carousel',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($newProducts) {
            $newProducts->channel_id = $channelRepository->id;
            $newProducts->save();
            
            $newProductsTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($newProductsTranslations, [
                    'theme_customization_id' => $newProducts->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'title'                 => 'New Products',
                        'filters'               => [
                            'sort'                  => 'created_at-desc',
                            'limit'                 => '12',
                            'new'                   => '1',
                        ]
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($newProductsTranslations);
        }

        $topCollections = $this->themeCustomizationRepository->create([
            'name'       => 'Top Collections',
            'sort_order' => 5,
            'status'     => 1,
            'type'       => 'static_content',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($topCollections) {
            $topCollections->channel_id = $channelRepository->id;
            $topCollections->save();
            
            $topCollectionsTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($topCollectionsTranslations, [
                    'theme_customization_id' => $topCollections->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'css' => '.top-collection-header {padding-left: 15px;padding-right: 15px;text-align: center;font-size: 70px;line-height: 90px;color: #060C3B;margin-top: 80px;}.top-collection-header h2 {max-width: 595px;margin-left: auto;margin-right: auto;font-family: DM Serif Display;}.top-collection-grid {display: flex;flex-wrap: wrap;gap: 32px;justify-content: center;margin-top: 60px;width: 100%;margin-right: auto;margin-left: auto;padding-right: 90px;padding-left: 90px;}.top-collection-card {position: relative;background: #f9fafb;}.top-collection-card img {border-radius: 16px;max-width: 100%;text-indent:-9999px;}.top-collection-card h3 {color: #060C3B;font-size: 30px;font-family: DM Serif Display;transform: translateX(-50%);width: max-content;left: 50%;bottom: 30px;position: absolute;margin: 0;font-weight: inherit;}@media not all and (min-width: 525px) {.top-collection-header {margin-top: 30px;}.top-collection-header {font-size: 32px;line-height: 1.5;}.top-collection-grid {gap: 15px;}}@media not all and (min-width: 1024px) {.top-collection-grid {padding-left: 30px;padding-right: 30px;}}@media (max-width: 640px) {.top-collection-grid {margin-top: 20px;}}',
                        'html' => '<div class="top-collection-container"><div class="top-collection-header"><h2>The game with our new additions!</h2></div><div class="container top-collection-grid"><div class="top-collection-card"><img src="" data-src="storage/theme/default/top_collections/3klZppKBFd5Sci44rn1kEQDGglmEBeYJscq5wbiz.webp" class="lazy" width="396" height="396" alt="The game with our new additions!"><h3>Our Collections</h3></div><div class="top-collection-card"><img src="" data-src="storage/theme/default/top_collections/PwNC5ZzJrdZV8qhOT7peYQqqBFptp025DnHRPLMe.webp" class="lazy" width="396" height="396" alt="The game with our new additions!"><h3>Our Collections</h3></div><div class="top-collection-card"><img src="" data-src="storage/theme/default/top_collections/JYh5ka7D1vW8nT5fSb38bVEpBCsTR4iDToR7Y4sM.webp" class="lazy" width="396" height="396" alt="The game with our new additions!"><h3>Our Collections</h3></div><div class="top-collection-card"><img src="" data-src="storage/theme/default/top_collections/B9z96AMNJ79YVkGEhhxlPd2B6pWThYeKuZHSriku.webp" class="lazy" width="396" height="396" alt="The game with our new additions!"><h3>Our Collections</h3></div><div class="top-collection-card"><img src="" data-src="storage/theme/default/top_collections/oPZ3oWQxIkNIJh8x2BHYBDdL4gJp9oa1lUJVUYa5.webp" class="lazy" width="396" height="396" alt="The game with our new additions!"><h3>Our Collections</h3></div><div class="top-collection-card"><img src="" data-src="storage/theme/default/top_collections/sgCIRHAHzDPmwqWnsAkMEuApv8pH0W1HCYUSuSJ3.webp" class="lazy" width="396" height="396" alt="The game with our new additions!"><h3>Our Collections</h3></div></div></div>'
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($topCollectionsTranslations);
        }

        $boldCollections = $this->themeCustomizationRepository->create([
            'name'       => 'Bold Collections',
            'sort_order' => 6,
            'status'     => 1,
            'type'       => 'static_content',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($boldCollections) {
            $boldCollections->channel_id = $channelRepository->id;
            $boldCollections->save();
            
            $boldCollectionsTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($boldCollectionsTranslations, [
                    'theme_customization_id' => $boldCollections->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'css' => '.section-gap {margin-top:80px;}.direction-ltr {direction:ltr;}.direction-rtl {direction:rtl;}.inline-col-wrapper {display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center;}.inline-col-wrapper .inline-col-image-wrapper {overflow:hidden;}.inline-col-wrapper .inline-col-image-wrapper img {max-width:100%;height:auto;border-radius:16px;text-indent:-9999px;}.inline-col-wrapper .inline-col-content-wrapper {display:flex;flex-wrap:wrap;gap:20px;max-width:464px;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title {max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description {margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins;}@media (max-width:991px) {.inline-col-wrapper {grid-template-columns:1fr;grid-gap:16px;}.inline-col-wrapper .inline-col-content-wrapper {gap:10px;}}@media (max-width:525px) {.inline-col-wrapper .inline-col-content-wrapper .inline-col-title {font-size:30px;line-height:normal;}}',
                        'html' => '<div class="container section-gap"><div class="inline-col-wrapper"><div class="inline-col-image-wrapper"><img src="" data-src="storage/theme/default/bold_collections/6IWqgAR770dUxoEpltxavdA37OeNoJ81tbuMt7pm.webp" class="lazy" width="632" height="510" alt="Get Ready for our new Bold Collections!"></div><div class="inline-col-content-wrapper"><h2 class="inline-col-title"> Get Ready for our new Bold Collections! </h2><p class="inline-col-description">Introducing Our New Bold Collections! Elevate your style with daring designs and vibrant statements. Explore striking patterns and bold colors that redefine your wardrobe. Get ready to embrace the extraordinary!</p><button class="primary-button">View All</button></div></div></div>'
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($boldCollectionsTranslations);
        }

        $featuredCollections = $this->themeCustomizationRepository->create([
            'name'       => 'Featured Collections',
            'sort_order' => 7,
            'status'     => 1,
            'type'       => 'product_carousel',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($featuredCollections) {
            $featuredCollections->channel_id = $channelRepository->id;
            $featuredCollections->save();
            
            $featuredCollectionsTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($featuredCollectionsTranslations, [
                    'theme_customization_id' => $featuredCollections->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'title'                 => 'Featured Collections',
                        'filters'               => [
                            'sort'                  => 'created_at-desc',
                            'limit'                 => '12',
                            'featured'              => '1',
                        ]
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($featuredCollectionsTranslations);
        }

        $gameContainer = $this->themeCustomizationRepository->create([
            'name'       => 'Game Container',
            'sort_order' => 8,
            'status'     => 1,
            'type'       => 'static_content',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($gameContainer) {
            $gameContainer->channel_id = $channelRepository->id;
            $gameContainer->save();
            
            $gameContainerTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($gameContainerTranslations, [
                    'theme_customization_id' => $gameContainer->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'css' => '.section-title, .section-title h2 {font-weight:400;font-family:DM Serif Display;}.section-title {margin-top:80px;padding-left:15px;padding-right:15px;text-align:center;line-height:90px;}.section-title h2 {font-size:70px;color:#060c3b;max-width:595px;margin:auto;}.collection-card-wrapper {display:flex;flex-wrap:wrap;justify-content:center;gap:30px;}.collection-card-wrapper .single-collection-card {position:relative;}
                        collection-card-wrapper .single-collection-card img {border-radius:16px;background-color:#f5f5f5;max-width:100%;height:auto;text-indent:-9999px;}.collection-card-wrapper .single-collection-card .overlay-text {font-size:50px;font-weight:400;max-width:234px;font-style:italic;color:#060c3b;font-family:DM Serif Display;position:absolute;bottom:30px;left:30px;margin:0;}@media (max-width:1024px) {.section-title {padding:0 30px;}}@media (max-width:991px) {.collection-card-wrapper {flex-wrap:wrap;}}@media (max-width:525px) {.collection-card-wrapper .single-collection-card img {max-width:calc(100vw - 30px);}.collection-card-wrapper .single-collection-card .overlay-text {font-size:30px;}.container {padding:0 30px;margin-top:20px;}.section-title {margin-top:30px;}.section-title h2 {font-size:30px;line-height:normal;}}',
                        'html' => '<div class="section-title"><h2>The game with our new additions!</h2></div><div class="container section-gap"><div class="collection-card-wrapper"><div class="single-collection-card"><img src="" data-src="storage/theme/default/game_container/HRwNHjx0YW8UcQGNekAaDYwI2f3D525szeiaaRiV.webp" class="lazy" width="615" height="600" alt="The game with our new additions!"><h3 class="overlay-text">Our Collections</h3></div><div class="single-collection-card"><img src="" data-src="storage/theme/default/game_container/GTGE6RZ1qFJhyjiaLCMmChbQzZjne9wwQ85Prt8m.webp" class="lazy" width="615" height="600" alt="The game with our new additions!"><h3 class="overlay-text"> Our Collections </h3></div></div></div>'
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($gameContainerTranslations);
        }

        $allProducts = $this->themeCustomizationRepository->create([
            'name'       => 'All Products',
            'sort_order' => 9,
            'status'     => 1,
            'type'       => 'product_carousel',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($allProducts) {
            $allProducts->channel_id = $channelRepository->id;
            $allProducts->save();
            
            $allProductsTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($allProductsTranslations, [
                    'theme_customization_id' => $allProducts->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'title'                 => 'All Products',
                        'filters'               => [
                            'sort'                  => 'created_at-desc',
                            'limit'                 => '12',
                        ]
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($allProductsTranslations);
        }

        $boldContainerSecond = $this->themeCustomizationRepository->create([
            'name'       => 'Bold Collections',
            'sort_order' => 10,
            'status'     => 1,
            'type'       => 'static_content',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($boldContainerSecond) {
            $boldContainerSecond->channel_id = $channelRepository->id;
            $boldContainerSecond->save();
            
            $boldContainerSecondTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($boldContainerSecondTranslations, [
                    'theme_customization_id' => $boldContainerSecond->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        'css' => '.section-gap {margin-top:80px;}.direction-ltr {direction:ltr;}.direction-rtl {direction:rtl;}.inline-col-wrapper {display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center;}.inline-col-wrapper .inline-col-image-wrapper {overflow:hidden;}.inline-col-wrapper .inline-col-image-wrapper img {max-width:100%;height:auto;border-radius:16px;text-indent:-9999px;}.inline-col-wrapper .inline-col-content-wrapper {display:flex;flex-wrap:wrap;gap:20px;max-width:464px;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title {max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0;}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description {margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins;}@media (max-width:991px) {.inline-col-wrapper {grid-template-columns:1fr;grid-gap:16px;}.inline-col-wrapper .inline-col-content-wrapper {gap:10px;}}
                        @media (max-width:525px) {.inline-col-wrapper .inline-col-content-wrapper .inline-col-title {font-size:30px;line-height:normal;}}',
                        'html' => '<div class="container section-gap"><div class="inline-col-wrapper direction-rtl"><div class="inline-col-image-wrapper"><img src="" data-src="storage/theme/default/bold_collections/kI2VD794Tu2jXuQOotbBp4qRO4ByU26YK48iooet.webp" class="lazy" width="632" height="510" alt="Get Ready for our new Bold Collections!"></div><div class="inline-col-content-wrapper direction-ltr"><h2 class="inline-col-title"> Get Ready for our new Bold Collections! </h2><p class="inline-col-description">Introducing Our New Bold Collections! Elevate your style with daring designs and vibrant statements. Explore striking patterns and bold colors that redefine your wardrobe. Get ready to embrace the extraordinary!</p><button class="primary-button">View All</button></div></div></div>'
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($boldContainerSecondTranslations);
        }

        $footerLinks = $this->themeCustomizationRepository->create([
            'name'       => 'Footer Links',
            'sort_order' => 11,
            'status'     => 1,
            'type'       => 'footer_links',
            'channel_id' => $channelRepository->id,
            'company_id' => $companyRepository->id,
        ]);
        
        if ($footerLinks) {
            $footerLinks->channel_id = $channelRepository->id;
            $footerLinks->save();
            
            $footerLinksTranslations = [];
            
            foreach ($locales as $locale) {
                array_push($footerLinksTranslations, [
                    'theme_customization_id' => $footerLinks->id,
                    'company_id'             => $companyRepository->id,
                    'locale'                 => $locale->code,
                    'options'                => json_encode([
                        "column_1" => [
                            [
                                "url" => "http://localhost/page/about-us",
                                "title" => "About Us",
                                "sort_order" => 1
                            ],  [
                                "url" => "http://localhost/page/contact-us",
                                "title" => "Contact Us",
                                "sort_order" => 2
                            ],  [
                                "url" => "http://localhost/page/customer-service",
                                "title" => "Customer Service",
                                "sort_order" => 3
                            ],  [
                                "url" => "http://localhost/page/whats-new",
                                "title" => "What's New",
                                "sort_order" => 4
                            ],  [
                                "url" => "http://localhost/page/terms-of-use",
                                "title" => "Terms of Use",
                                "sort_order" => 5
                            ],  [
                                "url" => "http://localhost/page/terms-conditions",
                                "title" => "Terms & Conditions",
                                "sort_order" => 6
                            ]
                        ],
                        "column_2" => [
                            [
                                "url" => "http://localhost/page/privacy-policy",
                                "title" => "Privacy Policy",
                                "sort_order" => 1
                            ],  [
                                "url" => "http://localhost/page/payment-policy",
                                "title" => "Payment Policy",
                                "sort_order" => 2
                            ],  [
                                "url" => "http://localhost/page/shipping-policy",
                                "title" => "Shipping Policy",
                                "sort_order" => 3
                            ],  [
                                "url" => "http://localhost/page/refund-policy",
                                "title" => "Refund Policy",
                                "sort_order" => 4
                            ],  [
                                "url" => "http://localhost/page/return-policy",
                                "title" => "Return Policy",
                                "sort_order" => 5
                            ]
                        ]
                    ]),
                ]);
            }

            DB::table('theme_customization_translations')
            ->insert($footerLinksTranslations);
        }

        Log::info("Info:- prepareThemeData() created for company ".$companyRepository->domain.".");
    }

    /**
     * Prepares a default Config data
     * 
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function prepareConfigData($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        $localeRepository = $this->localeRepository->findOneByField('company_id', $companyRepository->id);

        $data = [
            'channel'   => $companyRepository->username,
            'locale'    => $localeRepository->code,
            'emails'    => [
                'general'   => [
                    'notifications' => [
                        'emails.general.notifications.verification'         => 1,
                        'emails.general.notifications.registration'         => 1,
                        'emails.general.notifications.customer'             => 1,
                        'emails.general.notifications.new-order'            => 1,
                        'emails.general.notifications.new-admin'            => 1,
                        'emails.general.notifications.new-invoice'          => 1,
                        'emails.general.notifications.new-refund'           => 1,
                        'emails.general.notifications.new-shipment'         => 1,
                        'emails.general.notifications.new-inventory-source' => 1,
                        'emails.general.notifications.cancel-order'         => 1,
                    ]
                ]
            ],
            'catalog'   => [
                'products'  => [
                    'review'            => [
                        'guest_review'          => 0,
                    ],
                    'cache-small-image' => [
                        'width'                 => 120,
                        'height'                => 120,
                    ],
                    'cache-medium-image' => [
                        'width'                 => 225,
                        'height'                => 225,
                    ],
                    'cache-large-image' => [
                        'width'                 => 480,
                        'height'                => 480,
                    ],
                ]
            ],

            'sales'   => [
                'checkout'  => [
                    'shopping_cart' => [
                        'allow_guest_checkout' => 1,
                    ],
                ],
            ],
            
            'general'  => [
                'general'   => [
                    'email_setting' => [
                        'general.general.email_setting.sender_name' => 'Bagisto Shop',
                        'general.general.email_setting.shop_email_from' => $companyRepository->username.'@bagshop.com',
                        'general.general.email_setting.admin_name' => 'Bagisto Admin',
                        'general.general.email_setting.admin_email' => $companyRepository->username.'@bagadmin.com',
                    ]
                ],

                'content'   => [
                    'shop' => [
                        'compare_option'    => [
                            'general.content.shop.compare_option'   => 1,
                        ],
                        'wishlist_option'   => [
                            'general.content.shop.wishlist_option'   => 1,
                        ],
                        'image_search'  => [
                            'general.content.shop.image_search'   => 1,
                        ]
                    ]
                ]
            ],
            'customer' => [
                'settings' => [
                    'newsletter' => [
                        'subscription' => [
                            'customer.settings.newsletter.subscription' => 1,
                        ],
                    ],
                    'social_login' => [
                        'enable_facebook' => [
                            'customer.settings.social_login.enable_facebook' => 1,
                        ],
                        'enable_twitter' => [
                            'customer.settings.social_login.enable_twitter' => 1,
                        ],
                        'enable_google' => [
                            'customer.settings.social_login.enable_google' => 1,
                        ],
                        'enable_linkedin' => [
                            'customer.settings.social_login.enable_linkedin' => 1,
                        ],
                        'enable_github' => [
                            'customer.settings.social_login.enable_github' => 1,
                        ],
                    ]
                ],
                'social_login' => [
                    'facebook' => [
                        'FACEBOOK_CALLBACK_URL' => 'http://'.$companyRepository->domain.'/customer/social-login/facebook/callback',
                    ],
                    'twitter' => [
                        'TWITTER_CALLBACK_URL' => 'http://'.$companyRepository->domain.'/customer/social-login/twitter/callback',
                    ],
                    'google' => [
                        'GOOGLE_CALLBACK_URL' => 'http://'.$companyRepository->domain.'/customer/social-login/google/callback',
                    ],
                    'linkedin' => [
                        'LINKEDIN_CALLBACK_URL' => 'http://'.$companyRepository->domain.'/customer/social-login/linkedin/callback',
                    ],
                    'github' => [
                        'GITHUB_CALLBACK_URL' => 'http://'.$companyRepository->domain.'/customer/social-login/github/callback',
                    ],
                ],
            ]
        ];
        
        Log::info("Info:- prepareConfigData() created for company ".$companyRepository->domain.".");

        return $this->coreConfigRepository->create($data);
    }

    /**
     * It will store a check in the companies
     * that all the necessary data had been
     * inserted successfully or not
     *
     * @param string|null $tenantDomain
     * @return void|mixed
     */
    public function setInstallationCompleteParam($tenantDomain = null)
    {
        $companyRepository = $this->getCurrentCompany($tenantDomain);

        $companyRepository->more_info = json_encode([
            'company_created'   => true,
            'seeded'            => true
        ]);

        $companyRepository->save();

        Log::info("Info:- setInstallationCompleteParam() complated for company ".$companyRepository->domain.".");

        return $companyRepository;
    }

    /**
     * Get the current company.
     * 
     * @param string|null $tenantDomain
     * @return mixed
     */
    public function getCurrentCompany($tenantDomain = null)
    {
        static $currentCompany;

        if ($currentCompany) {
            return $currentCompany;
        }
        
        $currentCompany = Company::getCurrent($tenantDomain);

        return $currentCompany;
    }
}