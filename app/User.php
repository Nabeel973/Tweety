<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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


    public function timeLine()
    {
        //return Tweet::where('user_id',$this->id)->latest()->get(); shows only timeline for the current login user

        //show user's tweet
        //also show the tweets of the user he/she is following
        //sort them in descrnding order

        $friends=$this->follows()->pluck('id'); //so that it may return only the followers from the collection
        //adds the tweets of the current user
        return Tweet::whereIn('user_id',$friends)->orWhere('user_id',$this->id)->latest()->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    //returns different images from pvatar according to email of users
    public function avatar()
    {
        return "https://i.pravatar.cc/200?u=".$this->email;
    }

    //save the user we are following
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    //a user(1) follows a user(3)
    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }
    public function getRouteKeyName()
    {
        return 'name' ; // the url will be  profiles/nabeel
    }
}
