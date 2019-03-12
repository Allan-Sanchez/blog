@extends('admin.plantilla')

@section('header')
     <h1>
        Posts
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>
@endsection

@section('contenido')
    
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Lista de publicaciones</h3>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create-published">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Crear Publicación
      </button>
    </div>  
    <!-- /.box-header -->
    <div class="box-body">
      <table id="posts-table" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Extracto</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->excerpt }}</td>
                <td>
                    <div class="">
                    <a class="btn btn-sm btn-default" href="{{route('posts.show',$post)}}" target="_blank" role="button"><i class="fa fa-eye" aria-hidden="true"></i></i></a>
                        <a class="btn btn-sm btn-info" href="{{route('admin.posts.edit',$post)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <form action="{{route('admin.posts.destroy',$post)}}" method="POST" style="display:inline">
                          @csrf  @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro de querer eliminar esta publicacion.')">
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
      $('#posts-table').DataTable({
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