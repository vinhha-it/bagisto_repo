@component('shop::emails.layouts.master')
    <div style="text-align: center;">
        <a href="{{ config('app.url') }}">
            @if (core()->getConfigData('general.design.admin_logo.logo_image'))
                <img src="{{ \Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image')) }}" alt="{{ config('app.name') }}" style="height: 40px; width: 110px;"/>
            @else
                <img src="{{ asset('vendor/webkul/ui/assets/images/logo.png') }}" alt="{{ config('app.name') }}"/>
            @endif
        </a>
    </div>

    <div style="padding: 30px;">
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('shop::app.mail.forget-password.dear', ['name' => $company->user->name]) }},
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!! __('saas_subscription::app.admin.plans.assigned-plan-description', ['domain' => $company->domain]) !!}.
            </p>

            @if ($plan)
                <span>{!! __('saas_subscription::app.admin.plans.for-plan', ['name' => $plan->name]) !!}</span>
                <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                    <ul>
                        <li class="my-2"> {!! __('saas_subscription::app.admin.plans.allowed-products') !!}  : <b>{{$plan->allowed_products}}</b></li>
                        <li> {!! __('saas_subscription::app.admin.plans.allowed-categories') !!} : <b>{{$plan->allowed_categories}}</b></li>
                        <li> {!! __('saas_subscription::app.admin.plans.allowed-attributes') !!}  : <b>{{$plan->allowed_attributes}}</b></li>
                        <li> {!! __('saas_subscription::app.admin.plans.allowed-attribute-families') !!} : <b>{{$plan->allowed_attribute_families}}</b></li>
                        <li> {!! __('saas_subscription::app.admin.plans.allowed-channels') !!} : <b>{{$plan->allowed_channels}}</b></li>
                        <li> {!! __('saas_subscription::app.admin.plans.allowed-orders') !!} : <b>{{$plan->allowed_orders}}</b></li>
                    </ul>
                </p>
            @endif

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('shop::app.mail.forget-password.thanks') }}
            </p>
        </div>
    </div>
@endcomponent