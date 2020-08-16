<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * function to store follow/unfollow other user
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function store(User $user)
    {
        if(auth()->user()->following($user))
        {
            auth()->user()->unfollow($user);
        }
        else{
            auth()->user()->follow($user);
        }
        return back();
    }
}
