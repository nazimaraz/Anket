<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Choice;
use App\Models\OtherChoice;

use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    public function store(Request $request)
    {
        $userID = request('userID');
        if($userID === 1 && request('onlyUser')) return;
        $user = User::find($userID);
        $userChoices = request('userChoices');

        foreach($userChoices as $choice) {
            if(is_array($choice)) {
                $q = OtherChoice::create([
                    'question_id' => array_keys($choice)[0],
                    'content' => array_values($choice)[0] === null ? '' : array_values($choice)[0]
                    ]);
                $user->otherChoices()->attach($q);
            } else {
                $user->choices()->attach($choice);
            }
        }
    }
}
