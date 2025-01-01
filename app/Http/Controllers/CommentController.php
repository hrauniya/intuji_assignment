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
            return response()->json(['message'=>'Comment created successfully'
            ],200);
        }
        catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()
            ], 500);
        }


    }

    public function showComments($id){
        try {
            $post = Post::find($id);
            if (!$post){
                return response()->json(['message' => 'Post not found. Error: ' . $e->getMessage()
                ], 404);
            }
            $comments = $post->comments;
            return response()->json(['result'=>$comments, 'message'=>'Comments fetched successfully'
                ],200);
            }
        catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()
            ], 500);  
        }
    }
}



