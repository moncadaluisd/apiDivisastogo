@component('mail::message')
# Hola {{ $user->username }}

Verifica tu cuenta para empezar a usar la plataforma dando click en el siguiente boton:

@component('mail::button', ['url' => 'https://divisastogo.com/verify/' .  $user->email_token ])
Cambia la clave
@endcomponent

Gracias,<br>
DivisasTogo
@endcomponent
