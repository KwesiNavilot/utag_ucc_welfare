@component('mail::message')
{!! $message !!}

Regards,<br>
{{ __('Your')}} {{ config('app.name') }} {{ __('Team')}}

<p class="subcopy">
You received this email because you are a member of UTAG-UCC on the <a href="http://welfare.utag-ucc.com">UTAG-UCC Welfare</a> portal. Got any grievances, ideas or suggestions? Please, <a href="http://welfare.utag-ucc.com/home#contact">contact us</a> now.
</p>
@endcomponent
