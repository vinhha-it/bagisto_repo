@component('shop::emails.layouts.master')

    <div>
        <div style="text-align: center;">
            <a href="{{ config('app.url') }}">
                @include ('shop::emails.layouts.logo')
            </a>
        </div>
        
        <div style="padding: 30px;">
            <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
                <p style="font-weight: bold;font-size: 20px;color: #242424;line-height: 24px;">
                    {{ __('saas::app.tenant.emails.new-company-register-tenant.dear', ['tenant_name' => $company->name]) }},
                </p>

                <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                    {!! __('saas::app.tenant.emails.new-company-register-tenant.greeting') !!}
                </p>
            </div>

            <div style="font-size: 16px;color: #5E5E5E;line-height: 30px;margin-bottom: 20px !important;">
                {{ __('saas::app.tenant.emails.new-company-register-tenant.summary') }}
            </div>

            <div  style="margin-top: 40px; text-align: center">
                <a href="{{ route('admin.session.create') }}" style="font-size: 16px;
                color: #FFFFFF; text-align: center; background: #0031F0; padding: 10px 100px;text-decoration: none;">
                    {!! __('saas::app.tenant.emails.new-company-register-tenant.visit-shop') !!}
                </a>
            </div>

            <p style="margin-top: 20px;font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!!
                    __('shop::app.mail.order.help', [
                        'support_email' => '<a style="color:#0041FF" href="mailto:'.config('mail.admin.address').'">'.config('mail.admin.address'). '</a>'
                        ])
                !!}
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('saas::app.tenant.emails.new-company-register-tenant.thanks') }}
            </p>
        </div>
    </div>

@endcomponent