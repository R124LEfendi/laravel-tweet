<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tweet;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;


class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(request $request): View
    {
        $tweets = Tweet::search($request->input('search'))->paginate(10);
        return view('timeline', ['tweets' => $tweets]);
    }
}
