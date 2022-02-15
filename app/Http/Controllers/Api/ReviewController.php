<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request) {
        //custom validator
        $validator = Validator::make($request->all(), [
            'author' => 'required|size:50',
            'description' => 'required',
            'email' => 'required|email|size:50',
            'rate' => 'required|numeric|min:0|max:5'
        ]);

        //manage validator failure
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }

        $data = $request->all();

        //save to DB
        $new_review = new Review();

        $new_review->fill($data);

        $new_review->save();

        return response()->json($data);
    }
}
