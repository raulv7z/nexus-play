<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Models\User;
use App\Models\Edition;
use FFI\Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $reviews = Review::where('user_id', $user->id)->paginate(6);
        return view('content.auth.reviews.index', compact('user', 'reviews'));
    }

    public function create(Request $request, $editionId)
    {
        $user = User::findOrFail($request->user()->id);
        $edition = Edition::findOrFail($editionId);

        return view('content.auth.reviews.create', compact('user', 'edition'));
    }

    public function store(StoreReviewRequest $request)
    {
        $validated = $request->validated();
        Review::create($validated);
        return redirect()->route('root.editions.show', $request->edition_id)->with('success', 'Your review has been published succesfully.');
    }
}
