<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    public function index()
    {
        $users = User::whereHas('hasRole', function ($query) {
            $query->where('name', 'lecturer');
        })->get();
    
        return view('instructor.index', compact('users'));
    }

    public function create()
    {
        return view('instructor.create');
    }

    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' =>'2'
        ]);

        return to_route('instructor.index');
    }

    public function edit(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        return view('instructor.edit',compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findorFail($user_id);
        $users = User::whereHas('hasRole', function ($query) {
            $query->where('name', 'lecturer');
        })->get();
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'updated_at' => now()
        ]);

        if ($request->hasFile('file')) {

            if ($user->files()->exists()) {
                $existingFile = $user->files()->first();
                Storage::delete('public/uploads/' . $existingFile->name);
                $existingFile->delete();
            }
    
            // Store new file
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $storedFileName = $fileName . '_' . time() . '.' . $extension;
    
            $file->storeAs('public/uploads', $storedFileName);
    
            $user->files()->create([
                'original_name' => $originalName,
                'name' => $storedFileName,
                'file_path' => 'http://127.0.0.1:8000/storage/uploads/' . $storedFileName,
                'file_type' => $file->getClientMimeType(),
            ]);
        }
 
        return view('instructor.index',compact('users'));
    }

    public function destroy(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        
        return redirect()->route('instructor.index')->with('success', 'User deleted successfully');
    }

    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        $file = $user->files;

        $role = $user->hasRole;
        return view('instructor.show', compact('user','role','file'));
    }
}
