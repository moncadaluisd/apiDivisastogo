@component('mail::message')
# Hola {{ $user->username }}

Alguien solicitó el cambio de password de tu cuenta. Puedes hacerlo:

@component('mail::button', ['url' => 'https://divisastogo.com/reset/' . $user->remember_token ])
Cambia la clave
@endcomponent

Gracias,<br>
DivisasTogo
@endcomponent
