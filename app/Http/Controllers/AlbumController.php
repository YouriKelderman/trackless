<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AlbumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    }

    public function show($id, $editing = null)
    {

        if ($editing === null) {
            $editing = false;
        }
        $album = Item::find($id);
        $poster = User::find($album->user_id);
        $rating = round($album->ratings()->where('status', 1)->avg('rating'), 1);
        if (Auth::check()) {
            $userId = auth()->user()->id;
            $loggedIn = true;
            $reviewCount = auth()->user()->ratings()->count();
            if(auth()->user()->admin===1) {
                $admin = true;
            }
            else{
                $admin = false;
            }
        } else {
            $userId = 0;
            $loggedIn = false;
            $admin=false;
            $reviewCount = 0;
        }

        return view('album', compact('album', 'userId', 'loggedIn', 'rating', 'poster', 'editing', 'admin', 'reviewCount'));
    }



}
