<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollController extends Controller
{
    public function store(Request $request)
    {
        $poll = Poll::create(['name' => $request->get('poll_name')]);
        $question = Question::create(['content' => $request->get('question')]);

        $choices = [$request->get('a'), $request->get('b')];
        foreach($choices as $choice) {
            $c = Choice::create(['content' => $choice]);
        }

        return redirect('/poll')->with('success', 'Contact saved!');
    }
}
