@extends('admin.plantilla')

@section('header')
     <h1>
        Editar
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

                  <form action="{{route('admin.roles.update',$role)}}" method="POST">
                    @method('put')
                      @include('admin.roles.form')
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