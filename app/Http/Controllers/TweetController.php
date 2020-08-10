<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Session;
use DB;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.index',[
            'tweets'=> auth()->user()->timeLine(),
        ]);
    }
    public function store()
      {
        $attributes=request()->validate(['body'=>'required']);

          Tweet::create([
              'user_id' => auth()->id(),
              'body'=>$attributes['body'],
          ]);
          Session::flash('success');
          return redirect()->route('tweets.index')->with(['message' => 'Tweet Uploaded']);
      }

      public function destroy(Tweet $tweet)
      {
          $tweet->delete();
          Session::flash('success');
          return redirect()->route('tweets.index')->with(['message' => 'Tweet Deleted']);

      }
}
