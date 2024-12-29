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
                'email' => ['required'],
                'password' => ['required', 'min:8'],
                'role' => ['required']
            ]);
    
            $fields['password'] = Hash::make($fields['password']);
            User::create($fields);
        }
        catch (Exception $e) {
            print($e."Oops! Something went wrong");
        }
        
    }

    //Login controller User Action
    public function login(Request $request){

    }
}
