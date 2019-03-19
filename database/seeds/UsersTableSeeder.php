<?php

use Illuminate\Database\Seeder;
use App\User;
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
        User::truncate();

        $user = new User;
        $user->name = 'Allan';
        $user->email ='admin@gmail.com';
        $user->password=bcrypt('admin123');
        $user->save();

        $user = new User;
        $user->name = 'ejemplo';
        $user->email ='ejemplo@gmail.com';
        $user->password=bcrypt('ejemplo123');
        $user->save();
    }

}
