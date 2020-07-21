<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;


class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();

        return response(['data' => $reviews], 200);
    }

    public function store(ReviewRequest $request)
    {
        $review = Review::create($request->all());

        return response(['data' => $review], 201);
    }

    public function reviewsForCar($id)
    {
        $reviews = Car::find($id)->reviews;
        return response(['data' => $reviews], 200);
    }

    public function carDetailsFromReview($id)
    {
        $car = Review::find($id)->car;
        return response(['data' => $car], 200);
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);

        return response(['data', $review], 200);
    }

    public function update(ReviewRequest $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->all());

        return response(['data' => $review], 200);
    }

    public function destroy($id)
    {
        Review::destroy($id);

        return response(['data' => null], 204);
    }
}
