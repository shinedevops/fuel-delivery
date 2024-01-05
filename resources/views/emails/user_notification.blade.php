@component('mail::message')
    # Welcome to Our Platform

    Hello {{ $username }},

    Thank you for using our application! Click the button below to log in to your account.

    @component('mail::button', ['url' => url("/visit/{$user_id}")])
        Accept And Login
    @endcomponent

    Your temporary password is: {{ $password }}

    Please log in using this temporary password and change it in your account settings.

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
