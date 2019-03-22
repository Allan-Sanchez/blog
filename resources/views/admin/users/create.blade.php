@extends('admin.plantilla')

@section('header')
     <h1>
        Usuarios
        <small>Crear Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{route('admin.users.index')}}"><i class="fa fa-list"></i> Usuarios</a></li>
        <li class="active">Crear</li>
      </ol>
@endsection

@section('contenido')
    modulo de crear usuario
@endsection