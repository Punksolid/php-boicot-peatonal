<x-mail::message>
# Gracias por suscribirte a la causa.

Para verificar tu correo electrónico, haz clic en el botón de abajo.

<x-mail::button :url="$verification_url">
Verificar Email
</x-mail::button>

Gracias.<br>
{{ config('app.name') }}
</x-mail::message>
