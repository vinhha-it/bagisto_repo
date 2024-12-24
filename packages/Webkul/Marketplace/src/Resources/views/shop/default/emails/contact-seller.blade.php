@component('shop::emails.layout')
    <div style="margin-bottom: 34px;">
        <p style="font-weight: bold;font-size: 20px;color: #121A26;line-height: 24px;margin-bottom: 24px">
            @lang('marketplace::app.emails.dear', ['customer_name' => $seller->name]), 👋
        </p>

        <p style="font-size: 16px;color: #384860;line-height: 24px;">
            @lang('marketplace::app.emails.contact-seller.greeting')
        </p>
    </div>

    <p style="font-size: 16px;color: #384860;line-height: 24px;">
        @lang('marketplace::app.emails.contact-seller.info', ['name' => $data['name']])
    </p>

    <p style="font-size: 16px;color: #384860;line-height: 24px;">
        @lang('marketplace::app.emails.contact-seller.topic', ['subject' => $data['subject']])
    </p>

    <p style="font-size: 16px;color: #384860;line-height: 24px;margin-bottom: 40px">
        @lang('marketplace::app.emails.contact-seller.query', ['query' => $data['query']])
    </p>
@endcomponent