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

        $action = route('content.reviews.store');

        $fields = [
            ['name' => 'user_id', 'type' => 'hidden', 'value' => $user->id],
            ['name' => 'edition_id', 'type' => 'hidden', 'value' => $edition->id],
            ['name' => 'verified', 'type' => 'hidden', 'value' => 0],
            ['name' => 'rating', 'type' => 'hidden', 'value' => 1],
            ['name' => 'comment', 'label' => 'Comment', 'type' => 'textarea'],
        ];

        return view('content.reviews.create', compact('action', 'fields'));
    }

    public function store(StoreReviewRequest $request)
    {
        $validated = $request->validated();
        Review::create($validated);
        return redirect()->route('content.editions.show', $request->edition_id)->with('success', 'Review created successfully.');
    }
}
