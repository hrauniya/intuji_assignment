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
            return response()->json(['message'=>'Post created successfully'
            ],200);
        }
        catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
        
    }

    public function index(Request $request){
        try {
            $posts= Post::all();
            return response()->json([
                'result'=>$posts, 
                'message'=>'Posts fetched successfully
            '],200);
        }
        catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()
        ], 500);
        }
    }

    public function show($id){
        try {
            $user = User::find($id);
            if (!$user){
                return response()->json(['message' => 'User not found'
                ], 404);
            }
            $posts = $user->posts;
            return response()->json([
                'result'=>$posts, 
                'message'=>'Posts fetched successfully'
            ],200);
        }
        catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()
        ], 500);
        }
    }

    public function uploadImage(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            if ($post->user_id !== $request->user->id) {
                return response()->json(['message' => 'You can upload image only for your own post'], 403);
            }
            $request->validate([
                'image_path' => ['required', 'image', 'mimes:jpeg,png', 'max:2048']
            ]);
            $path = $request->file('image_path')->store('post-images', 'public');
            $post->update(['image_path' => $path]);

            return response()->json([
                'message' => 'Image uploaded successfully',
                'image_path' => $path
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error uploading image: ' . $e->getMessage()
            ], 500);
        }
    }
}
