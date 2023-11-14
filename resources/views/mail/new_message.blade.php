<x-mail::message>
Hai un nuovo messaggio da {{ $name }}

> {{$message}}

<x-mail::button :url="'mailto:' . $email">
Rispondi
</x-mail::button>
</x-mail::message>
