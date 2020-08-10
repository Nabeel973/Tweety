<?php

namespace App;

trait Followable
{

    /**
     * for the user we are following
     */
    public function following(User $user)
    {
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    /**
     *saves the user we are following
     */
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    /**
     *unfollow the user we are following
     */
    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    /**
     *A user follows the other user
     */
    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    /**
     *returns the route according to the name
     */
    public function getRouteKeyName()
    {
        return 'name' ;
    }

}
