<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user
        ], 201);
    }
    

    public function index()
    {
        return response()->json(User::all());
    }
}
