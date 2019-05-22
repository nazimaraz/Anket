<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Question;
use App\Models\Choice;
use DB;

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

    public function index()
    {
        return Poll::all();
    }

    public function show($id)
    {
        $poll = Poll::find($id);
        $questions = $poll->questions;
        foreach($questions as $question) {
            $choices = $question->choices;
        }
        return response()->json((object) $poll);
    }

    public function result($id)
    {
        $poll = Poll::find($id);
        $questions = $poll->questions;
        $result = array();
        foreach($questions as $question) {
            $choices = $question->choices;
            $sum = 0;
            foreach($choices as $choice) {
                $choice->{'voteNumber'} = DB::table('choice_user')
                                            ->where('choice_id', $choice->id)
                                            ->count();
                $sum += $choice->voteNumber;
            }
            $question->{'totalVotes'} = $sum;
        }
        return response()->json((object) $poll);
    }
}
