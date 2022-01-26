@component('mail::message')
{!! $message !!}

Regards,<br>
{{ __('Your')}} {{ config('app.name') }} {{ __('Team')}}

<p class="subcopy">
You received this email because you are a member of UTAG-UCC on the <a href="{{ route('home') }}">UTAG-UCC Welfare</a> portal. Got any grievances, ideas or suggestions? Please, <a href="{{ route('home') }}#contact">contact us</a> now.
</p>
@endcomponent
