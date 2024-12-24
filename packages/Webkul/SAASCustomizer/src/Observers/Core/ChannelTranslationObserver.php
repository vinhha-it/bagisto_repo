<?php

namespace Webkul\SAASCustomizer\Observers\Core;

use Webkul\SAASCustomizer\Models\Core\ChannelTranslation;
use Webkul\SAASCustomizer\Facades\Company;

class ChannelTranslationObserver
{
    public function creating(ChannelTranslation $model)
    {
        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            if (! isset($model->company_id)) {
                $model->company_id = $company->id;
            }
        }
    }

    public function updating(ChannelTranslation $channelTranslation)
    {   
        $channel = $channelTranslation->channel;

        $company = Company::getCurrent();

        if (! auth()->guard('super-admin')->check() && isset($company->id)) {
            
            if (($channel->hostname != $company->domain) && ($company->channel_id == $channel->id)) {
                session()->flash('warning', trans('saas::app.tenant.custom-errors.channel-hostname'));

                throw new \Exception('illegal-action');
            }
        }
    }
}