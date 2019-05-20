<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Question;
use App\Models\Choice;

use Illuminate\Http\Request;

class PollController extends Controller
{
    public function store(Request $request)
    {
        $poll = Poll::create(['name' => request('name'), 'user_id' => request('userID')]);

        foreach(request('questions') as $question) {
            $q = Question::create(['content' => $question['content'], 'poll_id' => $poll->id]);
            foreach($question['choices'] as $choice) {
                Choice::create(['content' => $choice, 'question_id' => $q->id]);
            }
        }
    }
}
