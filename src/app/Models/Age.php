<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    // use HasFactory;
    protected $table = 'ages'; // 'ages' テーブルに対応
    protected $fillable = [
        'age',
        'sort'
        // 他のカラム名もここに追加する
    ];
}
