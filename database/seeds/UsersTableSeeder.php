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

        $admin = new User;
        $admin->name = 'Allan';
        $admin->email ='admin@gmail.com';
        $admin->password=bcrypt('admin123');
        $admin->save();
        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'ejemplo';
        $writer->email ='ejemplo@gmail.com';
        $writer->password=bcrypt('ejemplo123');
        $writer->save();
        $writer->assignRole($writeRole);
    }

}
