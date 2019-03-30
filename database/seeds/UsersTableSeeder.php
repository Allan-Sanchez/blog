<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin','display_name'=> 'Administrador']);
        $writeRole = Role::create(['name' => 'Writer','display_name'=> 'Escritor']);

        $viewPostsPermission = Permission::create(['name' => 'view posts','display_name'=> 'Ver Publicaciones']);
        $createPostsPermission = Permission::create(['name' => 'create posts','display_name'=> 'Crear Publicaciones']);
        $updatePostsPermission = Permission::create(['name' => 'update posts','display_name'=> 'Actualizar Publicaciones']);
        $deletePostsPermission = Permission::create(['name' => 'delete posts','display_name'=> 'Eliminar Publicaciones']);

        $viewUsersPermission = Permission::create(['name' => 'view users','display_name'=> 'Ver Usuarios']);
        $createUsersPermission = Permission::create(['name' => 'create users','display_name'=> 'Crear Usuarios']);
        $updateUsersPermission = Permission::create(['name' => 'update users','display_name'=> 'Actualizar Usuarios']);
        $deleteUsersPermission = Permission::create(['name' => 'delete users','display_name'=> 'Eliminar Usuarios']);

        $viewRolesPermission = Permission::create(['name' => 'view roles','display_name'=> 'Ver Roles']);
        $createRolesPermission = Permission::create(['name' => 'create roles','display_name'=> 'Crear Roles']);
        $updateRolesPermission = Permission::create(['name' => 'update roles','display_name'=> 'Actualizar Roles']);
        $deleteRolesPermission = Permission::create(['name' => 'delete roles','display_name'=> 'Eliminar Roles']);

        $createRolesPermission = Permission::create(['name' => 'create permissions','display_name'=> 'Crear Permiso']);
        $updateRolesPermission = Permission::create(['name' => 'update permissions','display_name'=> 'Actualizar Permiso']);


        $admin = new User;
        $admin->name = 'Allan';
        $admin->email ='admin@gmail.com';
        $admin->password='admin123';
        $admin->save();
        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'ejemplo';
        $writer->email ='ejemplo@gmail.com';
        $writer->password='ejemplo123';
        $writer->save();
        $writer->assignRole($writeRole);
    }

}
