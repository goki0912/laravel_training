<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\AnswerController;

use App\Http\Controllers\ProfileController;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//ここから記述！！
Route::get('/',[FrontController::class,'index'])->name('index');

Route::post('/confirm',[FrontController::class,'confirm'])->name('confirm');

Route::post('/store',[FrontController::class,'store'])->name('store');

Route::get('/thanks',function(){
    return view('thanks');
})->name('thanks');

//ログイン
// Route::get('/system',[AnswerController::class,'index'])->name('login');

Route::get('/system/answers/index',[AnswerController::class,'index'])->middleware(['auth'])->name('admin.index');

route::get('/system/answers/{id}',[AnswerController::class,'show'])->middleware(['auth'])->name('admin.show');

Route::delete('/system/answers/{id}',[AnswerController::class,'destroy'])->name('admin.destroy');

Route::post('/system/answers/delete',[AnswerController::class,'choiceDelete'])->name('choice_delete');

require __DIR__.'/auth.php';
