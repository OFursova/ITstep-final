<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function permits()
    {
        return view('admin.permits');
    }

    public function change()
    {
        return view('admin.permits')->with('success', 'Changes applied!');
    }
}
