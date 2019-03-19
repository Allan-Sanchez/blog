<?php

use Carbon\Carbon;
use App\{Post,Category,Tag};

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Storage::deleteDirectory('public');
        Post::truncate();
        Category::truncate();//para limpiar la tabla
        Tag::truncate();//para limpiar la tabla

        $category = new Category;
        $category->name="categoria 1";
        $category->save();

        $category = new Category;
        $category->name="categoria 2";
        $category->save();

        $post = new Post;

        $post->title= "Mi primer Post";
        $post->url= str_slug("Mi primer Post") ;
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur magnam ullam labore nostrum pariatur!</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id =1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 1']));
        $post = new Post;

        $post->title= "Mi segundo Post";
        $post->url= str_slug("Mi segundo Post") ;
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur magnam ullam labore nostrum pariatur!</p>";
        $post->published_at = Carbon::now()->subDays(3);//subDays substraer dias
        $post->category_id = 1;
        $post->user_id =1;
        $post->save();
        $post->tags()->attach(Tag::create(['name' => 'etiqueta 2']));


        $post = new Post;

        $post->title= "Mi tercer Post";
        $post->url= str_slug("Mi tercer Post") ;
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur magnam ullam labore nostrum pariatur!</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 2;
        $post->user_id =2;
        $post->save();
        $post->tags()->attach(Tag::create(['name' => 'etiqueta 3']));


        $post = new Post;

        $post->title= "Mi cuarto Post";
        $post->url= str_slug("Mi cuarto Post") ;
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur magnam ullam labore nostrum pariatur!</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->user_id =2;
        $post->save();
        $post->tags()->attach(Tag::create(['name' => 'etiqueta 4']));


        
    }
}
