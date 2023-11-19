<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('profile.index', compact('users'));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return to_route('profile.index');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('profile.show',compact('user'));
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('profile.index')->with('success', 'User deleted successfully');
    }

    public function detail($id)
    {
        $user = User::findOrFail($id);
        return view('profile.detail', compact('user'));
    }
}
