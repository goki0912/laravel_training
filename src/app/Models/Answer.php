<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class Answer extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $table = 'answers';

    protected $fillable=['fullname', 'gender', 'age_id', 'feedback'];

    protected $cast=[
        'gender'=>'integer',
    ];
    public function age()
    {
        return $this->belongsTo(Age::class,'age_id');
    }


    public function scopeFilterByRequest($query, $request)
    {
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
            $query->where('feedback', 'like', '%' . $request->input('opinion') . '%');
        }

        if ($request->filled('start') && $request->filled('end')) {
            $StartConvertedDate = Carbon::createFromFormat('m/d/Y', $request->input('start'))->format('Y-m-d');
            $EndConvertedDate = Carbon::createFromFormat('m/d/Y', $request->input('end'))->format('Y-m-d');
            $query->whereBetween('created_at', [$StartConvertedDate, $EndConvertedDate]);
        }

        if ($request->filled('keyword')) {
            $query->where('mail', 'like', '%' . $request->input('keyword') . '%')
                  ->orWhere('feedback', 'like', '%' . $request->input('keyword') . '%');
        }

        return $query;
    }

    public static function createFromRequest(Request $request)
    {
        $answer = new self;
        $answer->fullname = $request->input('fullname');
        $answer->gender = $request->input('gender');
        $answer->age_id = $request->input('age');
        $answer->mail=$request->input('mail');
        $answer->feedback = $request->input('feedback');
        $answer->save();

    }

}
