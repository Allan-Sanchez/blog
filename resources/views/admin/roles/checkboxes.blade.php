@foreach ($roles as $role)
<div class="">
    <label>
        <input name="NewRoles[]" class="flat-red" type="checkbox" value="{{$role->name}}"
            {{$user->roles->contains($role->id)?'checked':''}}>
                {{$role->name}}
        <br>
        <small class="text-muted">{{$role->permissions->pluck('name')->implode(', ')}}</small>
    </label>
</div>
@endforeach
