<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
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
        return view('home');
    }

    public function enter()
    {
        $user = Auth::user();
        $title = 'My profile';
        return view('cabinet', compact('user', 'title'));
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $title = 'My profile';
        // avatar
        $allowed = ['png', 'jpg', 'jpeg', 'webp', 'jfif'];
        $extension = $request->file('avatar')->extension();
       
        if (in_array($extension, $allowed)) {
            $name = $request->file('avatar')->getClientOriginalName();
            //$path = $request->file('avatar')->storeAs('images', $name, 'img');
            Storage::disk('img')->putFileAs(
                'avatars/',
                $request->file('avatar'),
                $name
              );
        }
        
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->avatar = 'images/avatars/'.$name;
        $user->save();
        // $user->update($request->all());
        $success = 'Changes applied!';

        return view('cabinet', compact('user', 'success', 'title'));
    }
}
