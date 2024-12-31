<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function create(Request $request){
        try {
            $postFields = $request->validate([
                'title' => ['required'],
                'content' => ['required'],
            ]);
    
            $postFields['user_id']= request()->user->id;
            Post::create($postFields);
        }
        catch (Exception $e) {
            print($e."Oops! Something went wrong");
        }
        
    }

    public function index(Request $request){
        $posts= Post::all();
        return response()->json($posts,200);
    }

    public function show($id){
        $user = User::find($id);
        if (!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        $posts = $user->posts;
        return response()->json($posts,200);
    }



}
