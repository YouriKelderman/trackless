<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Rating;

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
            'icon' => 'required | mimes:jpg,png,jpeg',

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

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'item_id' => 'required'
        ]);


        $item = Item::find($request['item_id']);

        $item->name = $request['name'];
        $item->description = $request['description'];

        $item->save();
        return redirect()->to('album/' . $request['item_id']);

    }

    public function delete(Request $request)
    {
        $item = Item::find($request['item_id']);
        foreach ($item->ratings as $review) {
            $review->delete();
        }
        $item->delete();
        return redirect()->to('home');
    }

    public function deleteUser(Request $request)
    {

        $user = User::find($request->id);
        $user->ratings()->delete();

        if(is_array($user->albums())){
            foreach ($user->albums() as $album){
                $album->ratings()->delete();
            }
        }
        $user->albums()->delete();
        $user->delete();
        return redirect()->to('profile');
    }
}
