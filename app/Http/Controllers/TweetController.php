<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Session;
use DB;

class TweetController extends Controller
{
    /**
     * Display a list of tweets of auth users
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('tweets.index',[
            'tweets'=> auth()->user()->timeLine(),
        ]);
    }

    /**
     * Store new Tweet
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

   /**
    *Deletes Tweet
    *
    *@param  \App\Tweet $tweet
    *@return \Illuminate\Http\RedirectResponse
    */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        Session::flash('success');
        return redirect()->route('tweets.index')->with(['message' => 'Tweet Deleted']);

    }
}
