<?php

namespace Webkul\SAASCustomizer;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Webkul\Core\Concerns\CurrencyFormatter;
use Webkul\Core\Models\Channel;
use Webkul\Core\Core as BaseCore;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\Core\Repositories\CountryRepository;
use Webkul\Core\Repositories\CountryStateRepository;
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\Core\Repositories\ExchangeRateRepository;
use Webkul\Core\Repositories\LocaleRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\Tax\Repositories\TaxCategoryRepository;
use Webkul\SAASCustomizer\Company;

class Core extends BaseCore
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(
        protected ChannelRepository $channelRepository,
        protected CurrencyRepository $currencyRepository,
        protected ExchangeRateRepository $exchangeRateRepository,
        protected CountryRepository $countryRepository,
        protected CountryStateRepository $countryStateRepository,
        protected LocaleRepository $localeRepository,
        protected CustomerGroupRepository $customerGroupRepository,
        protected TaxCategoryRepository $taxCategoryRepository,
        protected Company $company
    ) {}

    /**
     * Returns current channel models.
     *
     * @return \Webkul\Core\Contracts\Channel
     */
    public function getCurrentChannel(?string $hostname = null)
    {
        if (! $hostname) {
            $hostname = request()->getHttpHost();
        }

        if ($this->currentChannel) {
            return $this->currentChannel;
        }

        $this->currentChannel = $this->channelRepository->findWhereIn('hostname', [
            $hostname,
            'http://'.$hostname,
            'https://'.$hostname,
        ])->first();

        if (! $this->currentChannel) {
            $this->currentChannel = $this->company->getCurrentChannel();
        }

        return $this->currentChannel;
    }
}