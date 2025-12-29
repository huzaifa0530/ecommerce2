<x-mail::message>
# Hello {{ $name }},

Thank you for registering with **Citrus Talent**!

Your verification code is:

# {{ $otp }}

Please enter this 5-digit code on the verification page to confirm your email.

<x-mail::button :url="''">
Verify Email
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
