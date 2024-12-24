<?php

namespace Webkul\MarketplaceSaaS\Observers;

use Webkul\MarketplaceSaaS\Models\MpProductDownloadableSampleTranslation;

class MpProductDownloadableSampleTranslationObserver
{
    public function creating(MpProductDownloadableSampleTranslation $model)
    {
        $company  = company()->getCurrent();

        if (!auth()->guard('super-admin')->check() && isset($company->id)) {
            $model->company_id = company()->getCurrent()->id;
        }
    }
}
