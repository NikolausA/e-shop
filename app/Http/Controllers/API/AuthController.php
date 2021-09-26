<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            // 'c_password' => 'required|same:password'
        ]);
        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        $response = [
            'token' => $user->createToken('myapptoken')->plainTextToken,
            'name' => $user->name,
        ];

        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $response = [
                'success' => true,
                'token' => $user->createToken('myapptoken')->plainTextToken,
                'name' => $user->name,
            ];

            return response()->json($response, 200);
        } else {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
        }

    }

    public function logout(Request $request)
    {
        Auth::user()->token()->delete();
    }
}
