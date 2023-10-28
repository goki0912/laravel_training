<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Age;
use Carbon\Carbon;

class AnswerController extends Controller
{
    // public function index()
    // {
    //     $answers = Answer::paginate(10);



    //     return view('auth.index', compact('answers'));
    // }

    public function index(Request $request)
    {
        $query = Answer::query();

        if ($request->filled('name')) {
            $query->where('fullname', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('age')) {
            $query->where('age_id', $request->input('age'));
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('opinion')) {
            $query->where('feedback', 'like', '%' . $request . '%');
        }

        if ($request->filled('start') && $request->filled('end')) {
            $StartDateString=$request->input('start');
            $EndDateString=$request->input('end');
            $StartConvertedDate=Carbon::createFromFormat('m/d/Y',$StartDateString)->format('Y-m-d');
            $EndConvertedDate=Carbon::createFromFormat('m/d/Y',$EndDateString)->format('Y-m-d');
            $query->whereBetween('created_at',[$StartConvertedDate,$EndConvertedDate]);
        }

        if ($request->filled('keyword')) {
            $query->where('mail', 'like', '%' . $request->input('keyword') . '%')
                ->orWhere('feedback', 'like', '%' . $request->input('keyword') . '%');
        }

        $answers = $query->paginate(15);

        view()->composer('auth.index', function ($view) {
            $ages = Age::all();
            $view->with('ages', $ages);
        });

        return view('auth.index', compact('answers'));
    }

    public function show($id) {
        $answer=Answer::findOrFail($id);
        
        return view('auth.detail',compact('answer'));
    }

    public function destroy($id){
        $answer=Answer::findOrFail($id);
        $answer->delete();

        return redirect()->route('admin.index')->with('success','削除しました');
    }
}
