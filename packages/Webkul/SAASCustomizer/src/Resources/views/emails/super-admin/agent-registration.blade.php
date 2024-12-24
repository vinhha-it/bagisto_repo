@component('shop::emails.layouts.master')
    <div>
        <div style="text-align: center;">
            <a href="{{ route('super.session.create') }}">
                @if (company()->getSuperConfigData('general.design.super.logo_image'))
                    <img src="{{ \Illuminate\Support\Facades\Storage::url(company()->getSuperConfigData('general.design.super.logo_image')) }}" alt="{{ config('app.name') }}" style="height: 40px; width: 110px;"/>
                @else
                    <img src="{{ asset('vendor/webkul/ui/assets/images/logo.png') }}" alt="{{ config('app.name') }}"/>
                @endif
            </a>
        </div>

        <div  style="font-size:16px; color:#242424; font-weight:600; margin-top: 60px; margin-bottom: 15px">
            {{ __('saas::app.super-user.mail.dear', ['agent_name' => $agent['first_name'].' '.$agent['last_name']]) }},

        </div>

        <div>{!! __('saas::app.super-user.mail.summary') !!}</div>

        <p>
            <b> {!! __('saas::app.super-user.mail.saas-url') !!} </b> - {{ route('super.session.create') }} <br>
            <b> {!! __('saas::app.super-user.mail.email') !!} </b> - {{ $agent['email'] }} <br>
            <b> {!! __('saas::app.super-user.mail.password') !!} </b> - {{ $agent['password']}}
        </p>

        <p style="text-align: center;padding: 20px 0;">
            <a href="{{ route('super.session.create') }}" style="padding: 10px 20px;background: #0041FF;color: #ffffff;text-transform: uppercase;text-decoration: none; font-size: 16px">
                {{ __('saas::app.super-user.mail.sign-in') }}
            </a>
        </p>

        <p style="margin-top: 20px;font-size: 16px;color: #5E5E5E;line-height: 24px;">
            {!!
                __('shop::app.mail.order.help', [
                    'support_email' => '<a style="color:#0041FF" href="mailto:'.config('mail.admin.address').'">'.config('mail.admin.address'). '</a>'
                    ])
            !!}
        </p>

        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            {{ __('saas::app.super-user.mail.thanks') }}
        </p>
    </div>
@endcomponent