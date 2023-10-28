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

    public function search(Request $request)
    {
        $request->validate([
           'search' => "required",
           'filter'=>"required"
        ]);
        $query = $request['search'];
        if ($request['filter'] === "1") {
            $albums = Item::where('name', 'LIKE', '%' . $query . '%')->get()->sortBy('name');
        } else {
            $albums = Item::where('name', 'LIKE', '%' . $query . '%')->get()->sortByDesc('name');
        }
        return view('landing', compact('albums'));
    }

}
