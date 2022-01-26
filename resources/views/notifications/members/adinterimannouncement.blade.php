@component('mail::message')
<h1>Dear Member,</h1>

With utmost sorrow, we are regretful to announce the demise of {{ $name }}'s {{ $relative }}.

Details of the funeral and burial will be announced very soon. At this time, we ask that friends and members do not share this
message on public spaces, especially on social media.

Regards,<br>
{{ __('Your')}} {{ config('app.name') }} {{ __('Team')}}

<p class="subcopy">
You received this email because you are a member of UTAG-UCC on the <a href="{{ route('home') }}">UTAG-UCC Welfare</a> portal. Got any grievances, ideas or suggestions? Please, <a href="{{ route('home') }}#contact">contact us</a> now.
</p>
@endcomponent
