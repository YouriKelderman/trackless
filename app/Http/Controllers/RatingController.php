<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;


class RatingController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'review' => 'required',
            'rating' => 'required|integer|between:1,10',
            'status' => 'required',
        ]);

        $rating = new Rating;
        $rating->user_id = $request->input('user_id');
        $rating->item_id = $request->input('item_id');
        $rating->review = $request->input('review');
        $rating->rating = $request->input('rating');
        $rating->status = $request->input('status');
        $rating->save();
        return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'review' => 'required',
            'rating' => 'required|integer|between:1,10',
        ]);

        Rating::where('id', $id)->update($request->all());
        print_r($request['status']);
        return redirect('/');
    }
}
