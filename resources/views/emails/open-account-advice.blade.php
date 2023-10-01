@component('mail::message')
    {{ __('Su historial clinico se ha dado de alta en el sistema de salud AlertAR')}}

    {{ __('El establecimiento medico que hizo este registro fue: ') }}

    {{ $organization }}

    {{ __('Recuerde hacer valer sus derechos segun la Ley Nacional 26.529 y la Ley nacional 25.326') }}
@endcomponent
