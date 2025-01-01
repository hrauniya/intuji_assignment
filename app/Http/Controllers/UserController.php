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
            
            return response()->json(['message'=>'User created successfully'
            ],200);
        }
        catch (Exception $e) {
            return response()->json(['message'=>'Oops! Something went wrong' . $e->getMessage()
            ], 500);
        }
    }

    //Login controller User Action
    public function login(Request $request){
        try{
            $credentials = $request -> validate([
                'username' => ['required'],
                'password' => ['required']
            ]);
            if (auth()->attempt(['username'=> $credentials['username'], 'password'=> $credentials['password']])){
                $user = auth()->user();
                $token = $user -> createToken('associate_harsha_rauniyar')->plainTextToken;
                return response()->json([
                    'token' => $token,
                    'message' => 'Login successful'
                ],200);
            }
            return response()->json(['message' => 'Incorrect credentials. Please try again'
            ], 401);
        }
        catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()
            ], 500);
        }

    }
    public function viewProfile(Request $request){
        try {
            $currentUser = $request->user->id;
            $user = User::find($currentUser)->only('name', 'email', 'username');
            return response()->json([
                'result'=>$user, 
                'message'=>'User fetched successfully'
            ],200);
        }
        catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()
            ], 500);
        }

    }

    public function updateProfile(Request $request){
        try {
            $currentUser = $request->user->id;
            $user = User::find($currentUser);
            $validatedFields = $request->validate([
                'name' => ['sometimes', 'min:5', 'max:25'],
                'email' => ['sometimes', 'unique:users,email,' . $currentUser],
                'username' => ['sometimes', 'unique:users,username,' . $currentUser]
            ]);
            $user->update($validatedFields);
            return response()->json([
                'result'=>$user, 
                'message'=>'User updated successfully'
            ],200); 
        }
        catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

}
