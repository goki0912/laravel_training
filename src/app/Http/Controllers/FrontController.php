<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use Illuminate\Http\Request;
use App\Models\Age;
use App\Models\Answer;

class FrontController extends Controller
{
    public function index()
    {
        $ages = Age::all();
        return view('index', compact('ages'));
    }
    public function confirm(AnswerRequest $request)
    {
        $data = $request->all();
        $ageId = $request->input('age');

        $ageData = Age::find($ageId);


        return view('confirm', compact('data', 'ageData', 'ageId'));
    }
    public function store(Request $request)
    {
        $answer = new Answer;
        $answer->fullname = $request->input('fullname');
        $answer->gender = $request->input('gender');
        $answer->age_id = $request->input('age');
        $answer->feedback = $request->input('feedback');
        $answer->save();

        if ($request->input('back') == 'back') {
            return redirect('/')->withInput();
        }

        return redirect()->route('thanks');
    }
    //ログイン
}
