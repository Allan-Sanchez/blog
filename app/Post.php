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

    public function setTitleAttribute($title)
    {
        # code...
        $this->attributes["title"] = $title;
        $this->attributes["url"] = str_slug($title);
    }

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
