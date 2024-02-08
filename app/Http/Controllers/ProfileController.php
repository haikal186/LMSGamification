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

    public function edit(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        return view('profile.edit',compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findorFail($user_id);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return view('profile.index');

    }

    public function destroy(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        
        return redirect()->route('profile.index')->with('success', 'User deleted successfully');
    }

    public function show($user_id)
    {
        $user = User::findOrFail($user_id);

        $role = $user->hasRole;
        return view('profile.show', compact('user','role'));
    }
}
