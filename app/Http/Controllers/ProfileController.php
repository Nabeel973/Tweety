<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\File ;
use App\User;
use Hash;
use Session;

class ProfileController extends Controller
{
    /**
     * function for storing image
     *
     * @param  $data
     * @return $path
     */

    protected function fileUpload($data)
    {
        $file = $data;
        $fileWithExt = $file->getClientOriginalName();
        $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $nameoffile = $filename . '_' . time() . '.' . $extension;
        $path = $file->move(public_path('images'), $nameoffile);
        $path = $nameoffile;
        return $path;
    }

    /**
     * function for showing user profile
     *
     * @param \App\User $user
     * @return \Illuminate\View\View
     */

    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(50),
        ]);
    }

    /**
     * function for editing user profile
     *
     * @param \App\User $user
     * @return \Illuminate\View\View
     */

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    /**
     * function for showing user profile
     *
     * @param \App\User $user
     * @param \App\Http\Requests\Request $request
     * @return \Illuminate\View\View
     */

    public function update(User $user, Request $request)
    {
        $this->validate($request,array('name'=> 'string|required|max:255',
            'username'=> 'string|required|max:255|alpha_dash', //if the name exixts, so ignore that one
            'avatar'=>'image|mimes:jpeg,png,gif,jpg|max:2048',
            'email'=> 'email|required|string',
            'password'=>'required|min:10|string|confirmed',
            'background'=>'image|mimes:jpeg,png,gif,jpg|max:2048',
            'description'=>'string|max:255'));

        if (is_null($user->avatar)) {
            if ($request->hasfile('avatar')) {
                $path = $this->fileUpload($request->file('avatar'));
            } else {
                $path = null;
            }
        } elseif (!empty($user->avatar) && $request->hasfile('avatar')) {
            $path = $this->fileUpload($request->file('avatar'));
        } else {
            $path = $user->avatar;
        }
        if (is_null($user->background)) {
            if ($request->hasfile('background')) {
                $background = $this->fileUpload($request->file('background'));
            } else {
                $background = null;
            }
        } elseif (!empty($user->background) && $request->hasfile('background')) {
            $background = $this->fileUpload($request->file('background'));
        } else {
            $background = $user->background;
        }

        $user->update(['name' => request('name'), 'username' => request('username'), 'email' => request('email'), 'password' => Hash::make(request('password')), 'avatar' => $path, 'background' => $background, 'description' => request('description')]);


        Session::flash('success', 'You have successfully updated a post!');
        return redirect($user->path())->with(['message' => 'Profile updated']);
    }
    
}
