<?php

namespace Webkul\SAASCustomizer\Traits;

use Webkul\Ui\DataGrid\Traits\ProvideDataGridPlus as BaseProvideDataGridPlus;

trait ProvideDataGridPlus
{
    use BaseProvideDataGridPlus {
        getCurrentExtraFilterValue as protected traitgetCurrentExtraFilterValue;
    }
    /**
     * Get current extra filter values.
     *
     * @return array
     */
    public function getCurrentExtraFilterValue()
    {
        $company = (company()->getCurrent() == 'super-company') ?? false;

        /* all locales */
        $locales = $company ? company()->getAllLocales() : core()->getAllLocales();
        
        /* request and fallback handling */
        $locale = core()->getRequestedLocaleCode();
        $channel = $company ? company()->getCurrentChannelCode() : core()->getRequestedChannelCode();
        $customer_group = core()->getRequestedCustomerGroupCode();

        /* handling cases for new locale if not present in current channel */
        if ($channel !== 'all') {
            $repository = $company ? app('Webkul\SAASCustomizer\Repositories\Super\ChannelRepository') : app('Webkul\Core\Repositories\ChannelRepository');

            $channelLocales = $repository->findOneByField('code', $channel)->locales()->orderBy('name')->get();

            if ($channelLocales->contains('code', $locale)) {
                $locales = $channelLocales;
            } else {
                $channel = 'all';
            }
        }

        /* current values */
        return [
            'locales'        => $locales,
            'locale'         => $locale,
            'channel'        => $channel,
            'customer_group' => $customer_group,
        ];
    }
}