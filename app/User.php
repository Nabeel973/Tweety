<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class User extends Authenticatable
{
    use Notifiable,Followable,Images;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','avatar','background','description'
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

    /**
     * function for showing timeline
     *
     */
    public function timeLine()
    {
        $friends=$this->follows()->pluck('id'); //so that it may return only the followers from the collection
        //adds the tweets of the current user
        return Tweet::whereIn('user_id',$friends)->orWhere('user_id',$this->id)->withLikes()->latest()->paginate(50);
    }
    /**
     * function for showing timeline
     *
     */

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }
    /**
     * function for showing timeline
     *
     */

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function path($append='')
    {
        $path=route('profile',$this->username);
        return  $append ? "{$path}/{$append}":$path;
    }
}
