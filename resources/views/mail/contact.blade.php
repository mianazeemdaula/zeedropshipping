<x-mail::message>
    ### {{ $data['name'] }} has sent you a message
    {{ $data['email'] }}


    {{ $data['message'] }}

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
