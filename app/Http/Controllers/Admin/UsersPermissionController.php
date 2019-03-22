<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersPermissionController extends Controller
{
    public function update(Request $request,User $user)
    {
        // return $user->permissions;
        $user->permissions()->detach();//elimina los datos mediante las relaciones

        if ($request->filled('permissions')) {//verifica que el campo permissions este lleno
            $user->givePermissionTo($request->permissions);
        }

        return back()->withFlash('Los permisos han sido actualizados');
    }
}
