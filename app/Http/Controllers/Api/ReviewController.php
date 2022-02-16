<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Review;

class ReviewController extends Controller
{
    public function index(){
        $review = Review::all();
        return response()->json($review);
    }

    public function store(Request $request) {
        // Custom validator
        $validator = Validator::make($request->all(), [
            'author' => 'required|string|max:50',
            'description' => 'required',
            'email' => 'required|email|max:50',
            'rate' => 'required|integer|min:0|max:5'
        ], [
            'rate.min|rate.max' => 'Il voto deve essere compreso tra 0 e 5'
        ]);

        // Manage validator failure
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }

        $data = $request->all();

        // Save to DB
        $new_review = new Review();

        $new_review->fill($data);

        $new_review->save();

        return response()->json($data);
    }
}
