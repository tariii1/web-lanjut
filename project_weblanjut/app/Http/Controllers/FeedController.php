<?php

namespace App\Http\Controllers;

use App\Models\Feed;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        $feeds = Feed::query()
            ->when($request->filled('search'), function ($query) use ($request){
                return $query->where('title', 'like', '%' .$request->search . '%');
            })

            ->when($request->filled('min_like'), function ($query) use ($request){

                return $query->where('likeFeed', '>=', $request->min_like);
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('feed', compact('feeds'));
    }
}
