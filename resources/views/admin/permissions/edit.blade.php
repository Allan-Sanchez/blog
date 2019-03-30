@extends('admin.plantilla')

@section('header')
     <h1>
        Editar
        <small>Roles</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{route('admin.permissions.index')}}"><i class="fa fa-list"></i> Roles</a></li>
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
                  @include('admin.parciales.errors-messages')

                  <form action="{{route('admin.permissions.update',$permission)}}" method="POST">
                    @method('put') @csrf
                        <div class="form-group">
                            <label for="name">Identificador Permiso:</label>
                            <input class="form-control" type="text" disabled
                                value="{{$permission->name}}">
                        </div>

                        <div class="form-group">
                            <label for="display_name">Nombre Permiso:</label>
                            <input class="form-control" type="text" name="display_name"
                                value="{{old('display_name',$permission->display_name)}}">
                        </div>
                      <button type="submit" class="btn btn-primary btn-block">
                         <span class="glyphicon glyphicon-cog"></span>  Actualizar Permiso</button>
                  </form>
              </div>
          </div>
      </div>
      </div>
@endsection