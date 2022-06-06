<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Comment;

class CommentController extends Controller
{
    // get all comments of an offer
    public function index($id)
    {
        $offer = Offer::find($id);

        if(!$offer)
        {
            return response([
                'message' => 'Post not found.'
            ], 403);
        }

        return response([
            'comments' => $offer->comments()->orderBy('created_at', 'desc')->get()
        ], 200);
    }

    // create a comment
    public function store(Request $request, $id)
    {
        $offer = Offer::find($id);
        if(!$offer)
        {
            return response([
                'message' => 'Post not found.'
            ], 403);
        }
        //validate fields
        $attrs = $request->validate([
            'comment' => 'required|string',
            'user_email' => 'required|string',
        ]);

        Comment::create([
            'comment' => $attrs['comment'],
            'offer_id' => $id,
            'user_email' => $attrs['user_email']
        ]);

        return response([
            'message' => 'Comment created.'
        ], 200);
    }
    // delete a comment
   public function destroy($id,$userEmail)
   {
       $comment = Comment::find($id);
       if(!$comment)
     {
           return response([
              'message' => 'Comment not found.'
           ], 403);
       }

        if($comment->user_email != $userEmail)
      {
           return response([
           ], 403);
        }
       $comment->delete();

        return response([
            'message' => 'Comment deleted.'
        ], 200);
   }
}
