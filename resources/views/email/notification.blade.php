@component('mail::message')
# Hola {{ $username }}

{{ $title }}

<br>

{{ $description }}
@component('mail::button', ['url' => 'https://divisastogo.com' .$url])
{{ $button }}
@endcomponent

Gracias,<br>
DivisasTogo
@endcomponent
