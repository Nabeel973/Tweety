<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
            return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
      /*  if(current_user()->isNot($user)){
            abort(404);
        }*/
       // $this->authorize('edit',$user);
        return view('profiles.edit',compact('user'));
    }
}
