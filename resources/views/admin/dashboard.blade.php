@extends('admin.plantilla')


@section('contenido')
    
        <h1>Dashboard</h1>

        <p>El usuario es: {{ auth()->user()->email }}</p>
@endsection