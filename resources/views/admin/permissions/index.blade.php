@extends('admin.plantilla')

@section('header')
     <h1>
        Permisos
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Permisos</li>
      </ol>
@endsection

@section('contenido')
    
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Lista de Permisos</h3>
    </div>  
    <!-- /.box-header -->
    <div class="box-body">
      <table id="permissions-table" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Identificador</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->display_name }}</td>
                <td>
                  @can('update', $permission)
                    
                  <div class="">
                      <a class="btn btn-sm btn-info" href="{{route('admin.permissions.edit',$permission)}}" permission="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  </div>
                  @endcan
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
      $('#permissions-table').DataTable({
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