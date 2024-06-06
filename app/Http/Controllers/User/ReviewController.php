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
    public function index() {

        return view('content.auth.reviews.index');

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
