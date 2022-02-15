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
            'author' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            'rate' => 'required'
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
        $data['rate'] = intval($data['rate']);
        $new_review->fill($data);

        $new_review->save();

        return response()->json($data);
    }
}
