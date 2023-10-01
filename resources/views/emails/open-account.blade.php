@component('mail::message')
    {{ __('Una cuenta a tu nombre ha sido creada mediante el sistema AlertAR')}}

    {{ __('Para activar tu cuenta ingresa con esta direccion email y la siguiente contraseña temporal, cambiala lo antes posible') }}

    {{ $password }}

    @component('mail::button', ['url' => $loginLink])
        {{ __('Ingresar') }}
    @endcomponent
@endcomponent
