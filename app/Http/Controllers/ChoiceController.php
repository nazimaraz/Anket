<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Choice;

use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    public function store(Request $request)
    {
        $userChoices = request('userChoices');
        $userID = request('userID');
        $user = User::find($userID);
        $user->choices()->attach($userChoices);
    }
}
