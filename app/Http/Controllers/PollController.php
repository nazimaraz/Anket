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
        Poll::create(['name' => request('name')]);

        foreach(request('questions') as $question) {
            Question::create(['content' => $question['content']]);
            foreach($question['choices'] as $choice) {
                Choice::create(['content' => $choice]);
            }
        }
    }
}
