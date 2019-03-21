<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        **	@desavilitar la revision de las llaves foreneas 
        */
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        // AVILITAMOS NUEVA MENTE LA REVISION DE LAS LLAVES FORANEAS
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
