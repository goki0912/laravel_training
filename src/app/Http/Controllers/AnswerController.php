<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Age;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::paginate(10);

        view()->composer('auth.index', function ($view) {
            $ages = Age::all();
            $view->with('ages', $ages);
        });

        return view('auth.index', compact('answers'));
    }
}
