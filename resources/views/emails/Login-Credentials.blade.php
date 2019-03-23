@component('mail::message')
# Tus Credencias para acceder a {{config('app.name')}}

Utiliza estos credenciales para acceder al sistema.

@component('mail::table')
    |Nombre de usuario |Contraseña|
    |:-----------------|:-----------|
    |{{$user->email}}|{{$password}}|    
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
