<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TweetEditorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): View
    {
        return view('tweets.editor', [
            'tweet' => Tweet::find($id)
        ]);
    }
}
