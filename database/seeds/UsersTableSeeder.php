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

        $adminRole = Role::create(['name' => 'Admin']);
        $writeRole = Role::create(['name' => 'Writer']);

        $viewPostsPermission = Permission::create(['name' => 'view posts']);
        $createPostsPermission = Permission::create(['name' => 'create posts']);
        $updatePostsPermission = Permission::create(['name' => 'update posts']);
        $deletePostsPermission = Permission::create(['name' => 'delete posts']);

        $viewUsersPermission = Permission::create(['name' => 'view users']);
        $createUsersPermission = Permission::create(['name' => 'create users']);
        $updateUsersPermission = Permission::create(['name' => 'update users']);
        $deleteUsersPermission = Permission::create(['name' => 'delete users']);

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
