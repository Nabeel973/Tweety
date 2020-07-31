<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Session;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.index',[
            'tweets'=> auth()->user()->timeLine()
        ]);
    }
    public function store()
      {
        $attributes=request()->validate(['body'=>'required']);

          Tweet::create([
              'user_id' => auth()->id(),
              'body'=>$attributes['body'],

          ]);
          Session::flash('success', 'You have successfully updated a post!');
          return redirect()->route('home')->with(['message' => 'Tweet Uploaded']);
      }
}
