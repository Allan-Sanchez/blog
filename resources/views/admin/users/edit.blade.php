@extends('admin.plantilla')

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
    </div>    
@endsection