@component('mail::message')
<h1>Hello {{$name}},</h1>

This is to let you know that your {{ $request_type }} benefit request has been approved. You will be contacted soon with further clarifications

@component('mail::button', ['url' => $view])
View Request
@endcomponent

Regards,<br>
{{ __('Your')}} {{ config('app.name') }} {{ __('Team')}}

<p class="subcopy">
You received this email because you are a member of UTAG-UCC on the <a href="http://welfare.utag-ucc.com">UTAG-UCC Welfare</a> portal. Got any grievances, ideas or suggestions? Please, <a href="http://welfare.utag-ucc.com/home#contact">contact us</a> now.
</p>
@endcomponent
