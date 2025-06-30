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

        $token =  $user->createToken($request->name);
        return 
        [
            'user'=>$user,
            'token' => $token
        ];
    }

     public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // You can generate a basic token manually (for simplicity)
        $token =  $user->createToken($user->name);

        return response()->json(['message' => 'Login successful', 'token' => $token, 'user' => $user]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return['message' => 'you are logout.'];
    }
}
