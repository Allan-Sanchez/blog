@csrf
<div class="form-group">
    <label for="role">Identificador:</label>
    @if ($role->exists) 
        <input class="form-control" type="text" value="{{$role->name}}" disabled>
    @else
    <input class="form-control" type="text" name="name" value="{{old('name',$role->name)}}">
    @endif
</div>

<div class="form-group">
    <label for="display_name">Nombre Role:</label>
    <input class="form-control" type="text" name="display_name" id="nameRole"
        value="{{old('display_name',$role->display_name)}}">
</div>

<div class="form-group col-md-6">
    <label>Permisos</label>
    @include('admin.permissions.checkboxes',['model'=>$role])
</div>
