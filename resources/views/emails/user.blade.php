@component('mail::message')
# Welcome to Our POS System

## This is an Activation Email

@component('mail::button', ['url' => ''])
Activate Your Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
