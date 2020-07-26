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
    {   //dd($request->all());
        if($request->hasfile('image') || $request->hasfile('backg') )
        {
            $path=$this->fileUpload($request->file('image'));
            $backg=$this->fileUpload($request->file('backg'));

        }
        else
        {
            $path=null;
            $backg=null;
        }
        $user->update(['name'=>request('name'),'username'=>request('username'),'email'=>request('email'),'password'=>request('password'),'avatar'=>$path,'background'=>$backg,'description'=>request('description')]);
       // dd($request->all());
       return redirect($user->path());
    }


}
