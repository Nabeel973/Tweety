<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetLikesController extends Controller
{
    /**
     *Store Tweet's Like
     *
     *@return \Illuminate\Http\RedirectResponse
     */
    public function store(Tweet $tweet)
    {
        $tweet->like(current_user());
        return back();
    }

    /**
     *Store Tweet's Dislike
     *
     *@return \Illuminate\Http\RedirectResponse
     */

    public function destroy(Tweet $tweet)
    {
        $tweet->dislike(current_user());
        return back();
    }
}
