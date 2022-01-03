@component('mail::message')
# A Message Through The Contact-Us Form

<h4 style="margin-bottom: 0;">Sender's Details</h4>
Name: {{ $name }}<br>
Email: {{ $email }}<br>
Subject: {{ $subject }}

<h4 style="margin-bottom: 0;">Message</h4>
{{ $message }}

<p></p>
Regards,<br>
{{ config('app.name') }}
@endcomponent
