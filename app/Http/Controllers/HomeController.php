<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('cabinet', compact('user'));
    }

    public function edit(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
        ]);
        dd($request);
        $user->update($request->all());
        return view('cabinet', compact('user'))->with('success', 'Changes applied!');
    }
}
