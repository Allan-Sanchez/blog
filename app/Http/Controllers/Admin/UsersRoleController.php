<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersRoleController extends Controller
{

    
    public function update(Request $request,User $user)
    {   
        $user->roles()->detach();
        
        if ($request->filled('NewRoles')) {
            $user->assignRole($request->NewRoles);
        }
        
        return back()->withFlash('Los roles han sido actualizados');
    }

}
