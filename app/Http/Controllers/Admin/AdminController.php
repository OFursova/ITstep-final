<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function permits($id)
    {
        $user = User::where('id', $id);
        $roles = Role::all()->pluck('name', 'id');
        //dd($roles->pluck('id'));
        $title = 'User moderation';
        return view('admin.permits', compact('user', 'roles', 'title'));
    }

    public function change(Request $request, $id)
    {
        $roleCount = Role::latest()->first()->id;
        $request->validate([
            'role_id' => 'max:'.$roleCount,
        ]);
        $title = 'User moderation';
        $roles = Role::all()->pluck('name', 'id');
            
        $user = User::find($id);
        if ($user->id !== Auth::user()->id) {
            $user->role_id = $request->role;
            $user->ban = $request->ban;
            $user->save();
            $user->roles()->sync($request->role);

            $success = 'Changes applied!';
        } else {
            $success = 'You cannot modify yourself';
        }
        
        return view('admin.permits', compact('user', 'roles', 'title', 'success'));
    }

}
