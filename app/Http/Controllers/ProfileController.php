<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $file = $user->files;

        return view('profile.show', compact('user','file'));
    }

    public function edit(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        return view('profile.edit',compact('user'));
    }

    
}
