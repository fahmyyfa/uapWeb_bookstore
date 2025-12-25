<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register user baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Register berhasil',
            'user'    => $user,
        ], 201);
    }

    /**
     * Login user & generate JWT token
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // ⬇️ PENTING: GUNAKAN GUARD API (JWT)
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json([
                'message' => 'Email atau password salah',
            ], 401);
        }

        return response()->json([
            'message' => 'Login berhasil',
            'token'   => $token, // ⬅️ STRING JWT ASLI
            'user'    => auth('api')->user(),
        ]);
    }

    /**
     * Logout user
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'message' => 'Logout berhasil',
        ]);
    }

    /**
     * Ambil data user login
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }
}
