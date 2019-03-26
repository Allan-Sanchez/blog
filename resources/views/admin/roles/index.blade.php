@extends('admin.plantilla')

@section('header')
     <h1>
        Roles
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Roles</li>
      </ol>
@endsection

@section('contenido')
    
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Lista de Roles</h3>
      <!-- Button trigger modal -->
      <a href="{{route('admin.roles.create')}}" class="btn btn-primary pull-right" >
        <i class="fa fa-plus" aria-hidden="true"></i>
        Crear Role
      </a>
    </div>  
    <!-- /.box-header -->
    <div class="box-body">
      <table id="roles-table" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Guard</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->guard_name }}</td>
                <td>
                    <div class="">
                    <a class="btn btn-sm btn-default" href="{{route('admin.roles.show',$role)}}"  role="button"><i class="fa fa-eye" aria-hidden="true"></i></i></a>
                        <a class="btn btn-sm btn-info" href="{{route('admin.roles.edit',$role)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <form action="{{route('admin.roles.destroy',$role)}}" method="POST" style="display:inline">
                          @csrf  @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro de querer eliminar este role.')">
                            <i class="fa fa-times" aria-hidden="true"></i></button>
                        </form>
                    </div>
                 </td>
             </tr>
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->


@endsection


@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="/adminlte/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="/adminlte/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
      $('#roles-table').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script> 

  
@endpush