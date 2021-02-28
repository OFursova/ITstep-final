<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function enter(User $user)
    {
        return view('cabinet', compact('user'));
    }

    public function edit(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique',
            'password' => 'required',
            'phone' => 'required|unique',
        ]);
        $user->update($request->all());
        return view('cabinet')->with('success', 'Changes applied!');
    }
}
