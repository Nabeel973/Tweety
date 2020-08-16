<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Tweet;
use App\Comments;
use Illuminate\View\View;
use Session;
use DB;

class TweetController extends Controller
{
    /**
     * Display a list of tweets of auth users
     *
     * @param Tweet $tweet
     * @return View
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
     * @return RedirectResponse
     */
    public function store()
    {
        $attributes=request()->validate(['body'=>'required|max:1500']);
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
     * @param Tweet $tweet
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        Session::flash('success');
        return redirect()->route('tweets.index')->with(['message' => 'Tweet Deleted']);

    }

    /**
     *Edit Tweet
     *
     * @param Tweet $tweet
     * @return View
     */

    public function edit(Tweet $tweet)
    {
        return view('tweets.edit',compact('tweet'));
    }

    /**
     *Update Tweet
     *
     * @param Tweet $tweet
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Tweet $tweet,Request $request)
    {
        $this->validate($request,array('body'=> 'string|required|max:255'));
        $tweet->update(['body'=>request('body')]);
        Session::flash('success');
        return redirect()->route('tweets.index')->with(['message'=>'Tweet Updated']);
    }

}
