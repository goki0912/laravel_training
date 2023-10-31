<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Age;
use Carbon\Carbon;

use function Laravel\Prompts\error;

class AnswerController extends Controller
{
    // public function index()
    // {
    //     $answers = Answer::paginate(10);



    //     return view('auth.index', compact('answers'));
    // }

    public function index(Request $request)
    {
        $query = Answer::query()->filterByRequest($request);
        
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

    public function choiceDelete(Request $request){

        $choiceData=$request->input('delete');
       
        if (!empty($choiceData)) {
            Answer::whereIn('id',$choiceData)->delete();

            return redirect()->route('admin.index')->with('success','選択した項目を削除しました');

        }else{
            return redirect()->route('admin.index')->with('error','削除する項目が選択されていません');
        }
    }
}
