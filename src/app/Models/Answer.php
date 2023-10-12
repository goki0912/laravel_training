<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $table = 'answers';

    protected $fillable=['fullname', 'gender', 'age_id', 'feedback'];

    protected $cast=[
        'gender'=>'integer',
    ];
    public function age()
    {
        return $this->belongsTo(Age::class,'age_id');
    }
}
