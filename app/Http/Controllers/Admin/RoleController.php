<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new Role);
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',new Role);
        $role = new Role;
        $permissions = Permission::pluck('name','id');
        return view('admin.roles.create',compact('role','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRoleRequest $request)
    {
        $this->authorize('create',new Role);
        $role = Role::create($request->validated());

        if ($request->has('permissions')) {
            # code...
            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.index')->withFlash('El rol fue creado correctamente');

    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update',$role);
        $permissions = Permission::pluck('name','id');
        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRoleRequest $request,Role $role)
    {
        $this->authorize('update',$role);
        $role->update($request->validated());
        
        $role->permissions()->detach();


        if ($request->has('permissions')) {
            # code...
            $role->givePermissionTo($request->permissions);
        }
        return redirect()->route('admin.roles.edit',$role)->withFlash('El rol fue editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete',$role);
      
        $role->delete();

        return redirect()->route('admin.roles.index')->withFlash('Role eliminado correctamente');
    }
}
