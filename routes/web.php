<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoudanController;
use App\Http\Controllers\JikenController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {    
    
    // 登録処理
    Route::post('/soudans', [SoudanController::class, 'store']);
    
    // 表示
    Route::get('/', [SoudanController::class, 'index']);
    
    //編集画面表示
    Route::get('/soudansedit/{soudan}',[SoudanController::class, 'edit']);
    
    //編集処理
    Route::post('soudans/update',[SoudanController::class, 'update']);
    
    //削除処理
    Route::delete('/soudan/{soudan}', [SoudanController::class, 'destroy']);
    
    //詳細画面表示
    Route::get('/detail/{soudan}',[SoudanController::class, 'show']);

    
    
    // タスク登録画面表示
    Route::get('/taskscreate/{soudan}', [TaskController::class, 'create']);
    
    // タスク登録処理
    Route::post('/tasks', [TaskController::class, 'store']);
    
    // タスク表示
    Route::get('/t', [TaskController::class, 'index']);
    
    //タスク編集画面表示
    Route::get('/tasksedit/{task}',[TaskController::class, 'edit']);
    
    //タスク編集処理
    Route::post('/tasks/update',[TaskController::class, 'update']);
    
    //タスク削除処理
    Route::delete('/task/{task}', [TaskController::class, 'destroy']);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
