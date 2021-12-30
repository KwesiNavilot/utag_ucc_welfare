@component('mail::message')
<h1>Hello Executive,</h1>

A member just requested for a {{ $request_type }} benefit. Further details of this event are below:

<pre>
    Member: {{ $member }}
    Request Type: {{ $request_type }}
</pre>

@component('mail::button', ['url' => $view])
View Request
@endcomponent

Regards,<br>
{{ config('app.name') }}

<p class="subcopy">
You received this email because you are an executive of UTAG-UCC on the <a href="http://welfare.utag-ucc.com">UTAG-UCC Welfare</a> portal.
</p>
@endcomponent
