<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.Dashboard');
    }

    public function manageUsers()
    {
        $this->authorize('manage-users'); // Ensure permission is defined
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    

    

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,teacher,student', // Validate role
            'password' => 'required|min:8', // Validate password
        ]);
    
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'], // Assign role
            'password' => bcrypt($validated['password']), // Hash the password
        ]);
    
        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }
    



public function editUser($id)
{
    $user = User::findOrFail($id);
    return view('admin.edit-user', compact('user'));
}

public function updateUser(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'role' => 'required|in:admin,teacher,student', // Ensure role is valid
        'password' => 'nullable|confirmed|min:8', // Allow optional password update
    ]);

    $user = User::findOrFail($id); // Find the user by ID

    // Update user details
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->role = $validated['role'];

    // Update password if provided
    if (!empty($validated['password'])) {
        $user->password = bcrypt($validated['password']);
    }

    $user->save(); // Save the updated user record

    return redirect()->route('admin.users')->with('success', 'User updated successfully');
}



     public function deleteUser($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    public function settings()
    {
        // Return the settings view, you can customize this view as needed
        return view('admin.settings');
    }


}
