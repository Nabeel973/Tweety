<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExploreController extends Controller
{
    /**
     * magic function for showing all users
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {   $users=User::where('id','<>',auth()->user()->id)->paginate(10);
        return view('explore',['users'=> $users]);
    }
}
