<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Request $request,$id){
        try {
            $post = Post::findorFail($id);
            $commentFields = $request->validate([
                'content' => ['required']
            ]);
    
            $commentFields['user_id']= $request->user->id;
            $commentFields['post_id']= $post->id;
            Comment::create($commentFields);
            return response()->json(['message'=>'Comment created successfully'],200);
        }
        catch (Exception $e) {
            print($e."Oops! Something went wrong");
        }


    }

    public function showComments($id){
        $post = Post::find($id);
        if (!$post){
            return response()->json(['message' => 'Post not found'], 404);
        }
        $comments = $post->comments;
        return response()->json($comments,200);
        }
}


