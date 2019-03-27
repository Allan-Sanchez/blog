@foreach ($permissions as $id=>$name)
<div class="">
    <label>
        <input name="permissions[]" class="flat-red" type="checkbox" value="{{$name}}"
            
            {{  $model->permissions->contains($id)  || 
                collect(old('permissions'))->contains($name)?'checked':''
            }}>
        {{$name}}
    </label>
</div>
@endforeach
