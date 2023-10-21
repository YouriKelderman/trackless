<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class HomeController extends Controller
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
        $albums = Item::all();
        return view('landing', compact('albums'));
    }
    public function search($searchTag) {

        $albums = Item::where('name', 'LIKE', '%'.$searchTag.'%')->get();
        return view('landing', compact('albums'));
    }
}
