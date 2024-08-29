<x-mail::message>
# Your account status has been updated

Your account status has been updated to **{{ $status }}**.

<x-mail::button :url=$url>
Check your account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
