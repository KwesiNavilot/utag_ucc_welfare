@component('mail::message')
Hello there!

You are receiving this email because we received a password reset request for your account.

@component('mail::button', ['url' => $link ])
Reset Password
@endcomponent

This password reset link will expire in 60 minutes.

If you did not request a password reset, no further action is required.

Regards,<br>
{{ config('app.name') }}

<p class="subcopy">
If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: <span class="break-all"><a href="{{ $link }}">{{ $link }}</a><span>
<br><br>
You received this email because you are an executive of UTAG-UCC on the <a href="http://welfare.utag-ucc.com">UTAG-UCC Welfare</a> portal.
</p>
@endcomponent
