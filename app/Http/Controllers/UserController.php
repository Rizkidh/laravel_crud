<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // penting!
        ]);

        return redirect('/users/create')->with('success', 'User berhasil dibuat!');
    }

    public function usersall()
    {
        $users = User::all();
        return view('users.usersall', compact('users'));
    }

    public function totaldashboard()
    {
        $totalusers = User::count();
        $totaltask = Task::count();
        return view('dashboard.dashboard', compact('totalusers', 'totaltask'));
    }
}
