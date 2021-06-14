<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TweetController extends Controller
{
    public function index() {
        $tweets = Tweet::with('user')->orderBy('created_at','DESC')->get();

        return Inertia::render('Tweets/Index', [
            'tweets' => $tweets
        ]);
    }

    public function store(Request $request ) {
        $request->validate([
            'content' => ['required','max:280'],
            'user_id' => ['exists:users,id']    
        ]);

        Tweet::create([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id
        ]);

        return Redirect::route('tweets.index');
    }
}
