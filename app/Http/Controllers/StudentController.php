<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function index()
    {
        $users = User::whereHas('hasRole', function ($query) {
            $query->where('name', 'student');
        })->get();
    
        return view('student.index', compact('users'));
    }

    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        $file_student = $user->files;

        $role_student = $user->hasRole->name;
        return view('student.show', compact('user','role_student','file_student'));
    }

    public function edit(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        return view('student.edit',compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findorFail($user_id);
        $users = User::whereHas('hasRole', function ($query) {
            $query->where('name', 'student');
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
 
        return view('student.index',compact('users'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' =>'1'
        ]);

        return to_route('student.index');
    }

    public function destroy(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        
        return redirect()->route('student.index');
    }
}
