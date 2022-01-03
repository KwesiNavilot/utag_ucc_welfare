@component('mail::message')
<h1>Hello {{$name}},</h1>

Thank you for reaching out to us. Your message is well received, and you will be contacted as soon as possible.

If you did not send this message, kindly ignore this mail.

Regards,<br>
{{ __('Your')}} {{ config('app.name') }} {{ __('Team')}}

<p class="subcopy">
You received this email because you sent a message through the Contact Us form on the <a href="http://welfare.utag-ucc.com">UTAG-UCC Welfare</a> portal. Got any grievances, ideas or suggestions? Please, <a href="http://welfare.utag-ucc.com/home#contact">contact us</a> now.
</p>
@endcomponent
