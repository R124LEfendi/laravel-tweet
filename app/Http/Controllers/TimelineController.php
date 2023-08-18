<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tweet;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(): View
    {
        $tweets = Tweet::orderBy('created_at', 'desc')->paginate(6);
        return view('timeline', ['tweets' => $tweets]);
    }
    // public function __invoke(): View
    // {
    //     return view('timeline', [
    //         'tweets' => Tweet::latest('id')->get(),
    //     ]);
    // }
}
