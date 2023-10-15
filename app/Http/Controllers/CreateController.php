<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class CreateController extends Controller
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
        return view('create-album');
    }

    public function store(Request $request, Item $item)
    {
        $item = new Item;
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->icon = $request->input('icon');
        $item->save();
        return redirect()->route('home');

    }
}
