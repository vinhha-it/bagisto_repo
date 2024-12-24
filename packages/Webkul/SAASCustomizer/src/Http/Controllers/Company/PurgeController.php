<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Company;

use Illuminate\Support\Facades\Event;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Helpers\DataPurger;
use Webkul\SAASCustomizer\Facades\Company;

class PurgeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Helpers\DataPurger $dataSeedHelper
     * @return void
     */
    public function __construct(protected DataPurger $dataSeedHelper)
    {
    }

    /**
     * To create the default entries for created company.
     *
     * @return \Illuminate\Http\Response
     */
    public function seedDatabase()
    {
        Event::dispatch('saas.company.register.before');

        /**
         * Check company already created and seeded.
         */
        if ($company = Company::getCurrent()) {
            if ($company == 'super-company') {
                return redirect()->route('saas.home.index');
            }

            $moreInfo = json_decode($company->more_info, true);

            if (
                ! empty($moreInfo['seeded'])
                && ! empty($moreInfo['company_created'])
            ) {
                return redirect(company()->getCurrentDomain());
            }
        }

        /**
         * Need to get executed only first time.
         */
        if (Company::count() == 1) {

            try {
                $this->dataSeedHelper->prepareCountryStateData();
            } catch (\Exception $e) {}
        }

        $this->dataSeedHelper->prepareChannelData();

        $this->dataSeedHelper->prepareCustomerGroupData();

        $this->dataSeedHelper->prepareAttributeData();

        $this->dataSeedHelper->prepareCMSPagesData();

        $this->dataSeedHelper->prepareThemeData();

        $this->dataSeedHelper->prepareConfigData();

        $this->dataSeedHelper->prepareMarketingData();

        Event::dispatch('new.company.registered');

        $this->dataSeedHelper->setInstallationCompleteParam();

        Event::dispatch('saas.company.register.after');

        session()->flash('success', trans('saas::app.tenant.registration.store-created'));

        return redirect()->route('shop.home.index');
    }
}
