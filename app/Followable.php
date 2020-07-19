<?php


namespace App;


trait Followable
{
    public function following(User $user)
    {
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    //save the user we are following
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
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
