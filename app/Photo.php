<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    //
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($photo){
            
            $photoPath = str_replace('storage','public',$photo->url);//str_replace busca y reemplaza una cadena de caracteres

            Storage::delete($photoPath);
        });
    }
}
