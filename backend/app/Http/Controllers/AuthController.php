<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
     public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        return response()->json(['message' => 'User Successfully Registered', 'user' => $user], 201);
    }

     public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // You can generate a basic token manually (for simplicity)
        $token = base64_encode(Str::random(40));

        return response()->json(['message' => 'Login successful', 'token' => $token, 'user' => $user]);
    }
}
