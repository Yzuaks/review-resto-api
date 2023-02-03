<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{

    public function index()
    {
        return Review::all();
    }

    public function store(StoreReviewRequest $request)
    {
        return Review::create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);
    }

    public function show(Review $review)
    {
        return $review;
    }

    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review->update($request->validated());

        return $review->refresh();
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return $review;
    }
}
