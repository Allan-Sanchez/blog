@extends('admin.plantilla')

@section('header')
     <h1>
        Crear
        <small>Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{route('admin.users.index')}}"><i class="fa fa-list"></i> Usuarios</a></li>
        <li class="active">Crear</li>
      </ol>
@endsection

@section('contenido')
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Datos Personales</h3>
              </div>

              <div class="box-body">
                  @if ($errors->any())
                      <ul class="list-group">
                          @foreach ($errors->all() as $error)
                              <li class="list-group-item list-group-item-danger">
                                  {{$error}}
                              </li>
                          @endforeach 
                      </ul>
                  @endif

                  <form action="{{route('admin.users.store')}}" method="POST">
                   @csrf
                      <div class="form-group">
                          <label for="name">Nombre</label>
                          <input class="form-control" type="text" name="name" id="nameUser" value="{{old('name')}}">
                      </div>

                      <div class="form-group">
                              <label for="email">Correo Electronico</label>
                              <input class="form-control" type="email" name="email" id="emailUser" value="{{old('email')}}">
                      </div>
                      
                      <div class="form-group col-md-6">
                        <label>Roles</label>
                        @include('admin.roles.checkboxes')
                      </div>
                      
                      <div class="form-group col-md-6">
                        <label >Permisos</label>
                        @include('admin.permissions.checkboxes')
                      </div>

                      <span class="help-block">La contraseña sera enviada al nuevo usuario via email</span>


                      <button type="submit" class="btn btn-primary btn-block">
                         <span class="glyphicon glyphicon-cog"></span>  Crear Usuario</button>
                  </form>
              </div>
          </div>
      </div>
      </div>
@endsection

@push('styles')
<link rel="stylesheet" href="/adminlte/plugins/iCheck/all.css">
    
@endpush

@push('scripts')

<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
     //Flat red color scheme for iCheck
     $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
    })
</script>
@endpush