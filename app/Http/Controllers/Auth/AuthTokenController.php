<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthTokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return response()->json(
            ['user' => $user, 'token' => $user->createToken($request->device_name)->plainTextToken]
        );

        // return $user->createToken($request->device_name)->plainTextToken;
    }

    public function destroy(Request $request)
    {
        
        $request->user()->tokens()->where('name', 'mobile')->delete();
        
        return response()->json();
    }
}
