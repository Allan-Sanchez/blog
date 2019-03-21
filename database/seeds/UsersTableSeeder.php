<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $writeRole = Role::create(['name' => 'Writer']);

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
