<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //mutador
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /*
    **	@Scope 
    */
    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view',$this)) {//can(view) hace referencia asi puede ver el la policy
            return $query;
        }else{
            return $query->where('id',auth()->id());
        }
    }

    /*
    **	@Relaciones 
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /*
    **	@metodo normales creador por autor 
    */
    public function getRoleDisplayName()
    {
        return $this->roles->pluck('display_name')->implode(', ');
    }
}
