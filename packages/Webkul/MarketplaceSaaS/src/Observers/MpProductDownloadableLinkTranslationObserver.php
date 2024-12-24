<?php

namespace Webkul\MarketplaceSaaS\Observers;

use Webkul\MarketplaceSaaS\Models\MpProductDownloadableLinkTranslation;

class MpProductDownloadableLinkTranslationObserver
{
    public function creating(MpProductDownloadableLinkTranslation $model)
    {
        $company  = company()->getCurrent();

        if (!auth()->guard('super-admin')->check() && isset($company->id)) {
            $model->company_id = company()->getCurrent()->id;
        }
    }
}
