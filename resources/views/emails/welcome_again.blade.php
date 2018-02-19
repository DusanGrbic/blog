@component('mail::message')
# Welcome, {{ $user->name }}!

The body of your message.
- one
- two
- three

@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing Laracasts
@endcomponent

@component('mail::panel', ['url' => ''])
Est aspernatur quasi perspiciatis qui quam et sed ipsum.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
