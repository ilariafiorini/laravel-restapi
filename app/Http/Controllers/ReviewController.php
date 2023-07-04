<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create(Request $request)
    {

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'max:255'],
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Qui dovrò agire su DB facendo un INSERT
        $review = new Review();
        $review->description = $request->input('description');
        $review->stars = $request->input('stars');
        $review->user_id = $request->input('user_id');
        $review->save();

        return response()->json($review, 201);

    }

    public function delete(Request $request, $id)
    {
        $review = Review::where('id', '=', $id)->firstOrFail();
        $review->delete();

        return response()->json(null, 204);
    }

    public function read(Request $request, $id)
    {
        $review = Review::where('id', '=', $id)->firstOrFail();

        return response()->json($review);

    }

    public function readAll(Request $request)
    {
        //$reviews = Review::get();
        $reviews = Review::with('user')->get();
        return response()->json($reviews, 200);
    }

    public function update(Request $request, $id)
    {
        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'max:255'],
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Ora eseguo la UPDATE su database
        $review = new Review();
        $review->description = $request->input('description');
        $review->stars = $request->input('stars');
        $review->user_id = $request->input('user_id');
        $review->save();

        return response()->json($review, 200);

    }
}