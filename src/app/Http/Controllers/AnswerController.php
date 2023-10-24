<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Age;

class AnswerController extends Controller
{
    // public function index()
    // {
    //     $answers = Answer::paginate(10);



    //     return view('auth.index', compact('answers'));
    // }

        public function index(Request $request)
        {
            $query=Answer::query();

            if ($request->filled('name')) {
                $query->where('fullname','like','%'.$request->input('name').'%');
            }

            if ($request->filled('age')) {
                $query->where('age_id',$request->input('age'));
            }

            if ($request->filled('gender')) {
                $query->where('gender',$request->input('gender'));
            }

            if ($request->filled('opinion')) {
                $query->where('feedback','like','%'.$request.'%');
            }

            $answers=$query->paginate(15);

        view()->composer('auth.index', function ($view) {
            $ages = Age::all();
            $view->with('ages', $ages);
        });

            return view('auth.index',compact('answers'));
        }
}
