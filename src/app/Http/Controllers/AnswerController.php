<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Age;

class AnswerController extends Controller
{
    public function index(Request $request)
    {
        $query = Answer::query();

        view()->composer('auth.index', function ($view) {
            $ages = Age::all();
            $view->with('ages', $ages);
        });


        if ($request->filled('name')) {
            $query->where('name','like','%'.$request->input('name').'%')
        }
        if
        return view('auth.index', compact('answers'));
    }
}