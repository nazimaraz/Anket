<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollController extends Controller
{
    public function test(Request $request) {
        dd($request);
    }
}
