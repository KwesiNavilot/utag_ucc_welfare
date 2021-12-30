@component('mail::message')
<h1>Hello {{$name}},</h1>

You just requested for a {{ $request_type }} benefit. Your request is currently pending and will be attended to as soon as possible.
You will be notified of any change in status regarding this request.

If this wasn't you and you believe your account may have been compromised, then you need to take a few steps to make sure your account is secure.
To start, <a href="{{ $resetlink }}">reset your password</a> now.

Regards,<br>
{{ __('Your')}} {{ config('app.name') }} {{ __('Team')}}

<p class="subcopy">
You received this email because you are a member of UTAG-UCC on the <a href="http://welfare.utag-ucc.com">UTAG-UCC Welfare</a> portal. Got any grievances, ideas or suggestions? Please, <a href="http://welfare.utag-ucc.com/home#contact">contact us</a> now.
</p>
@endcomponent
