@extends('admin.plantilla')

@section('header')
     <h1>
        Crear
        <small>Roles</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{route('admin.roles.index')}}"><i class="fa fa-list"></i> Roles</a></li>
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

                  <form action="{{route('admin.roles.store')}}" method="POST">
                   @csrf
                      <div class="form-group">
                          <label for="name">Nombre Role:</label>
                          <input class="form-control" type="text" name="name" id="nameRole" value="{{old('name')}}">
                      </div>

                      <div class="form-group">
                              <label for="email">Guard:</label>
                              <select name="guard_name" class="form-control">
                                  @foreach (config('auth.guards') as $guardName => $guard)
                                      
                                  <option {{old('guard_name')===$guardName ?'selected':''}} value="{{$guardName}}">{{$guardName}}</option>
                                  @endforeach
                              </select>
                      </div>
                      
                      
                      <div class="form-group col-md-6">
                        <label >Permisos</label>
                        @include('admin.permissions.checkboxes',['model'=>$role])
                      </div> 

                      <button type="submit" class="btn btn-primary btn-block">
                         <span class="glyphicon glyphicon-cog"></span>  Crear Role</button>
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