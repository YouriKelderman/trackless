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
        $this->middleware('auth');
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

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required |mimes:jpg,png,jpeg',

        ]);

        //In order to prevent saving files with the same name, Im renaming it to something unique to the time and user
        $newIconName = time() . '-' . $request->name . '.' . $request->icon->extension();

        $request->icon->move('album-covers', $newIconName);

        $item = new Item;
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->user_id = auth()->user()->id;
        $item->icon = $newIconName;
        $item->save();
        return redirect()->route('home');

    }
}
