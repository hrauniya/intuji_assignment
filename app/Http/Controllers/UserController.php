<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //register controller User action
    public function register(Request $request){
        try {
            $fields = $request->validate([
                'name' => ['required', 'min:5', 'max:25'],
                'email' => ['required', 'unique:users,email'],
                'password' => ['required', 'min:8'],
                'role' => ['required'],
                'username' => ['required', 'unique:users,username']
            ]);
            
            $fields['password'] = Hash::make($fields['password']);
            $user = User::create($fields);
            
            return response()->json(['message'=>'User created successfully'],200);
        }
        catch (Exception $e) {
            return response()->json(['message'=>'Oops! Something went wrong'], 500);
        }
    }

    //Login controller User Action
    public function login(Request $request){
        $credentials = $request -> validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        if (auth()->attempt(['username'=> $credentials['username'], 'password'=> $credentials['password']])){
            $user = auth()->user();
            $token = $user -> createToken('associate_harsha_rauniyar')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }
        return response()->json(['message' => 'Incorrect credentials. Please try again'], 401);

    }
}
