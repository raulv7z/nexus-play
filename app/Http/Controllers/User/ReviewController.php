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
    public function show(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        return view('content.reviews.show', compact('review'));
    }
    
    public function create(Request $request, $editionId)
    {
        $user = User::findOrFail($request->user()->id);
        $edition = Edition::findOrFail($editionId);

        return view('content.reviews.create', compact('user', 'edition'));
    }

    public function store(StoreReviewRequest $request)
    {
        $validated = $request->validated();
        Review::create($validated);
        return redirect()->route('content.editions.show', $request->edition_id)->with('success', 'Review created successfully.');
    }
}
