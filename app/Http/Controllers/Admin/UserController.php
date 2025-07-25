<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function createUser()
    {
        return view('admin.section.store.create-user');
    }

    public function create(UserRequest $request)
    {
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->member_type,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'Created Successfully');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Deleted Successfully');
    }
}
