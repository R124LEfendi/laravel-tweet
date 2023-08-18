<?php



use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TweetSearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $tweets = Tweet::where('content', 'like', '%' . $request->search . '%')->get();
        } else {
            $tweets = Tweet::all();
        }

        return view(
            'tweets.search',
            [
                'tweets' => $tweets,
                'search' => $request->search
            ]
        );
    }
}
