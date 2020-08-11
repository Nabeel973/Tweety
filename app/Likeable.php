<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    /**
     * function for showing likes/dislikes from likes table
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub('SELECT tweet_id, sum(liked) as likes,sum(!liked) as dislikes FROM tweety.likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            '=',
            'tweets.id');
    }
    /**
     * function for showing likes of auth user
     *
     * @param  \App\User $user
     * @return bool
     */

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    /**
     * function for showing dislikes of auth user
     *
     * @param  \App\User $user
     * @return bool
     */

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * function for showing dislikes of user
     *@param  \App\User $user
     */

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    /**
     * function for showing likes of users
     *@param  \App\User $user
     * @param  $liked
     */

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked,
            ]
        );
    }
}
