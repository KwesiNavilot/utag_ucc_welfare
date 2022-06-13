@component('mail::message')
<h1>Hello {{$name}},</h1>

This is to let you know that you have have successfully created your account on the UTAG-UCC Welfare Portal. Through the portal, you can request for membership benefits and interact
with the executives and fellow members. To do this, you have to activate your account by logging in and updating your details.

<strong>Please note that until you activate your account, you can't apply for any benefits.</strong>

@component('mail::button', ['url' => $activate])
Activate Account
@endcomponent

Regards,<br>
{{ __('Your')}} {{ config('app.name') }} {{ __('Team')}}

<p class="subcopy">
You received this email because you are a member of UTAG-UCC on the <a href="{{ route('home') }}">UTAG-UCC Welfare</a> portal. Got any grievances, ideas or suggestions? Please, <a href="{{ route('home') }}#contact">contact us</a> now.
</p>
@endcomponent
