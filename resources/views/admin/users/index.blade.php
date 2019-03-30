@extends('admin.plantilla')

@section('header')
     <h1>
        Usuarios
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
      </ol>
@endsection

@section('contenido')
    
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Lista de Usuarios</h3>
      <!-- Button trigger modal -->
      @can('create', $users->first())
        <a href="{{route('admin.users.create')}}" class="btn btn-primary pull-right" >
          <i class="fa fa-plus" aria-hidden="true"></i>
          Crear Usuario
        </a>
      @endcan
    </div>  
    <!-- /.box-header -->
    <div class="box-body">
      <table id="posts-table" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                <td>
                    <div class="">
                      @can('view', $user)
                        <a class="btn btn-sm btn-default" href="{{route('admin.users.show',$user)}}"  role="button"><i class="fa fa-eye" aria-hidden="true"></i></i></a>
                      @endcan

                      @can('update', $user)
                        <a class="btn btn-sm btn-info" href="{{route('admin.users.edit',$user)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      @endcan

                      @can('delete', $user)
                        <form action="{{route('admin.users.destroy',$user)}}" method="POST" style="display:inline">
                          @csrf  @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro de querer eliminar esta usuario.')">
                            <i class="fa fa-times" aria-hidden="true"></i></button>
                        </form>                        
                      @endcan
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
      $('#users-table').DataTable({
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