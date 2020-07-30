<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File ;
use App\User;

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
        $file=$data;
        $fileWithExt = $file->getClientOriginalName();
        $filename = pathinfo($fileWithExt,PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $nameoffile = $filename.'_'.time().'.'.$extension;
        $path = $file->move(public_path('images'),$nameoffile);
        $path = $nameoffile;
        return $path;
    }

    public function show(User $user)
    {
            return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
      /*  if(current_user()->isNot($user)){    abort(404);}*/
       // $this->authorize('edit',$user);

        return view('profiles.edit',compact('user'));
    }

    public function update(User $user,Request $request)
    {
        if(is_null($user->avatar))
        {
            if($request->hasfile('image'))
            {
                $path=$this->fileUpload($request->file('image'));
            }
            else
            {
                $path=null;
            }
        }
        elseif(!empty($user->avatar) && $request->hasfile('image'))
        {
            $path=$this->fileUpload($request->file('image'));
        }
        else
        {
            $path=$user->avatar;
        }

        $user->update(['name'=>request('name'),'username'=>request('username'),'email'=>request('email'),'password'=>request('password'),'avatar'=>$path,/*'background'=>$backg,*/'description'=>request('description')]);

        Session::flash('success', 'You have successfully updated a post!');
       return redirect($user->path())->with('success', 'Profile updated!');
    }


}
