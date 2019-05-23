<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Poll;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($pollID)
    {
        $poll = Poll::find($pollID);
        $comments = $poll->comments;
        foreach($comments as $comment) {
            $user = $comment->user;
        }
        return response()->json((object) $poll);
    }

    public function store()
    {
        Comment::create([
                        'user_id' => request('userID'),
                        'poll_id' => request('pollID'),
                        'content' => request('comment')
                    ]);
    }
}
