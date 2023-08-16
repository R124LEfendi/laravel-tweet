<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetEditorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): View
    {
        $tweet = Tweet::find($id);

        if ($tweet->user_id != Auth::id()) {
            abort(401);
        }

        return view('tweets.editor', [
            'tweet' => Tweet::find($id)
        ]);
    }
}
