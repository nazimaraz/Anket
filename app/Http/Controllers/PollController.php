<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Question;
use App\Models\Choice;
use App\Models\OtherChoice;
use DB;

use Illuminate\Http\Request;

class PollController extends Controller
{
    public function store(Request $request)
    {
        $poll = Poll::create(['name' => request('name'), 'user_id' => request('userID')]);

        foreach(request('questions') as $question) {
            $q = Question::create([
                                    'poll_id' => $poll->id,
                                    'content' => $question['content'],
                                    'isOtherExist' => $question['otherChoice']
                                ]);
            foreach($question['choices'] as $choice) {
                Choice::create(['content' => $choice, 'question_id' => $q->id]);
            }
        }
        return response()->json((object) ['pollID' => $poll->id]);
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
            $otherChoice = $question->otherChoice;
            $choices = $question->choices;
        }
        return response()->json((object) $poll);
    }

    public function result($id)
    {
        $poll = Poll::find($id);
        $questions = $poll->questions;
        foreach($questions as $question) {
            $choices = $question->choices;
            if($question->otherChoice !== null) {
                $question->{'totalOtherVotes'} = OtherChoice::where('question_id', $question->id)->count();
            } else {
                $question->{'totalOtherVotes'} = 0;
            }
            $sum = $question->totalOtherVotes;
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
