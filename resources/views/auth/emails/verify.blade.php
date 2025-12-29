{{-- resources/views/emails/verify.blade.php --}}
@component('mail::message')
# Hello {{ $name }},

Your verification code is:

@component('mail::panel')
**{{ $otp }}**
@endcomponent

Please enter this code on the verification page to confirm your email.

Thanks,<br>
**Citrus Talent Team**
@endcomponent
