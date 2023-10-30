<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\User;
use App\Models\Item;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(auth()->user()->id);
        if (Auth::check()) {
            if (auth()->user()->admin === 1) {
                $admin = true;
                $users = User::all();
            }
            else{
                $admin=false;
                $users = 0;
            }
        }
        return view('profile', compact('user', 'admin', 'users'));
    }

    public function edit(Request $request)
    {
        $request->validate([
            "rating_id"=>"required"
        ]);
        $rating = Rating::find($request->rating_id);
        if(isset($request->status)) {
            $rating->status = $request->status;
        }
        else {
            $rating->status = 0;
        }
        if (Auth::check()) {
            if (auth()->user()->admin === 1) {
                $admin = true;
                $users = User::all();
            }
            else{
                $admin=false;
                $users = 0;
            }
        }
        $rating->save();
        $user = User::find(auth()->user()->id);
        return view('profile', compact('user', 'users','admin'));
    }
}
