@extends('admin.plantilla')

@section('header')
     <h1>
        Posts
        <small>Crear publicación</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{route('admin.users.index')}}"><i class="fa fa-list"></i> Usuarios</a></li>
        <li><a href="{{route('admin.users.show',$user)}}"><i class="fa fa-user"></i> Datos/Usuario</a></li>
        <li class="active">Editar</li>
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
                    @include('admin.parciales.errors-messages')

                    <form action="{{route('admin.users.update',$user)}}" method="POST">
                    @method('PUT') @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" type="text" name="name" id="nameUser" value="{{old('name',$user->name)}}">
                        </div>

                        <div class="form-group">
                                <label for="email">Correo Electronico</label>
                                <input class="form-control" type="email" name="email" id="emailUser" value="{{old('email',$user->email)}}">
                        </div>

                        <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input class="form-control" type="password" name="password" id="passwordUser" placeholder="Contraseña" >
                                <span class="help-block">Dejar en blanco si no quieres cambiar la contraseña</span>
                        </div>

                        <div class="form-group">
                                <label for="password_confirmation">Repite la Contraseña</label>
                                <input class="form-control" type="password" name="password_confirmation" id="password-confirm-User" placeholder="Repite la contraseña">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                           <span class="glyphicon glyphicon-cog"></span>  Actualizar Usuario</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Roles
                    </h3>
                </div>
                <div class="box-body">
                    @role('Admin')
                    <form action="{{route('admin.users.roles.update',$user)}}" method="post">
                        @method('put') @csrf
                       @include('admin.roles.checkboxes')
                       <button type="submit" class="btn btn-primary btn-block">Actualizar roles</button>
                    </form>
                    @else 
                        <ul class="list-group">
                            @forelse ($user->roles as $role)
                                <li class="list-group-item">{{$role->name}}</li>
                            @empty
                            <li class="list-group-item">No tiene ningun role asignado</li>                          
                            @endforelse    
                        </ul>
                    @endrole       
                </div>
            </div>
            <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Permisos
                        </h3>
                    </div>
                    <div class="box-body">
                        @role('Admin')
                        <form action="{{route('admin.users.permissions.update',$user)}}" method="post">
                            @method('put') @csrf
                           @include('admin.permissions.checkboxes',['model'=>$user])
                           <button type="submit" class="btn btn-primary btn-block">Actualizar Permisos</button>
                        </form>
                        @else
                            <ul class="list-group">
                                @forelse ($user->permissions as $permission)
                                    <li class="list-group-item">{{$permission->name}}</li>
                                @empty
                                <li class="list-group-item">No tiene ningun permiso asignado</li>                          
                                @endforelse    
                            </ul>
                        @endrole
                                
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