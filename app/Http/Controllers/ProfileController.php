<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
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
            return view('profiles.show',[
                'user'=>$user,
                'tweets'=> $user->tweets()->withLikes()->paginate(50),

            ]);
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
            if($request->hasfile('avatar'))
            {
                $path=$this->fileUpload($request->file('avatar'));
            }
            else
            {
                $path=null;
            }
        }
        elseif(!empty($user->avatar) && $request->hasfile('avatar'))
        {
            $path=$this->fileUpload($request->file('avatar'));
        }
        else
        {
            $path=$user->avatar;
        }
        if(is_null($user->background))
        {
            if($request->hasfile('background'))
            {
                $background=$this->fileUpload($request->file('background'));
            }
            else
            {
                $background=null;
            }
        }
        elseif(!empty($user->background) && $request->hasfile('background'))
        {
            $background=$this->fileUpload($request->file('background'));
        }
        else
        {
            $background=$user->background;
        }

        $user->update(['name'=>request('name'),'username'=>request('username'),'email'=>request('email'),'password'=> Hash::make(request('password')),'avatar'=>$path,'background'=>$background,'description'=>request('description')]);


        Session::flash('success', 'You have successfully updated a post!');
       return redirect($user->path())->with(['message'=>'Profile updated']);
    }


}
