<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    //
    protected $fillable = ['title','iframe','body','excerpt','published_at', 'category_id'];
    // protected $guarded = [];

    protected $dates = ['published_at'];//para usar lo metodos de carbon

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            
            $post->tags()->detach();//quita todas las etiquetas asignadas a este post

            // $post->photos->each(function($photo){
            //     $photo->delete();
            // });

            $post->photos->each->delete();
        });
    }


    /*
    **	@vamos a sobre escritbir el metodo para ya no traaer el id sino el titlo 
    */
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopePublished($query)
    {
        
        $query->whereNotNull('published_at')
        ->where('published_at','<=',Carbon::now())
        ->latest('published_at');
    }

    public function isPublished()
    {
        # code...
        return !is_null($this->published_at) && $this->published_at < today();
    }



    public static function create(array $attributes = [])
    {
        # code...
        $post = static::query()->create($attributes);//de vuelve el post resien creado
        
        // primera forma
        // $url = str_slug($attributes['title']);

        //  if (static::where('url',$url)->exists()) {
             
        //      $url = " {$url}-{$post->id}";
        //  }
        // $post->url = $url;

        // $post->save();
        
        // segunda forma
        $post->generarUrl();

        return $post;
    }
    public function generarUrl()
    {
        $url = str_slug($this->title);

        if ($this::whereUrl($url)->exists()) {
             
             $url = " {$url}-{$this->id}";
         }
        $this->url = $url;

        $this->save();
    }

    // public function setTitleAttribute($title)
    // {
    //     # code...
    //     $this->attributes["title"] = $title;
        
    //     $url = str_slug($title);
    //     $duplicateUrlCount = Post::where('url','LIKE',"{$url}%")->count();

    //     if ($duplicateUrlCount) {
    //         # code...
    //         $url .= "-" . ++$duplicateUrlCount;
    //     }
        
    //     $this->attributes["url"] = $url;
    // }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at): null;
    }

    public function setCategoryIdAttribute($category_id)
    {
        $this->attributes['category_id']= Category::find($category_id)
        ? $category_id : Category::create(['name' => $category_id])->id;
    }

    public function syncTags($tags)
    {
        # code...
        $tagIds = collect($tags)->map(function ($tag){
                
            return  Tag::find($tag) ? $tag : Tag::create(['name' => $tag ])->id; 
        });

        return $this->tags()->sync($tagIds);
    }

}
