<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Weight_logsController;
use App\Http\Controllers\RegisterController;

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

//Route::get('/weight_logs', [Weight_logsController::class, 'index'])->name('index');
Route::get('/weight_logs', [Weight_logsController::class, 'index'])->name('weight_logs.index');

Route::get('/weight_logs/create', [Weight_logsController::class, 'create'])->name('weight_logs.create');
Route::post('/weight_logs', [Weight_logsController::class, 'store'])->name('weight_logs.store');

//Route::get('/weight_logs/{:weightLogId}', [Weight_logsController::class, 'detail'])->name('detail');
//Route::post('/weight_logs/{:weightLogId}/update', [Weight_logsController::class, 'update'])->name('update'); //未実装
//Route::delete('/weight_logs/{:weightLogId}/delete', [Weight_logsController::class, 'delete'])->name('delete'); //未実装

Route::get('/weight_logs/{weightLogId}', [Weight_LogsController::class, 'detail'])->name('weight_logs.detail');
Route::post('/weight_logs/{weightLogId}/update', [Weight_LogsController::class, 'update'])->name('weight_logs.update');
Route::delete('/weight_logs/{weightLogId}/delete', [Weight_LogsController::class, 'delete'])->name('weight_logs.delete');


Route::get('/weight_logs/search', [Weight_logsController::class, 'search'])->name('search');



Route::get('/weight_logs/goal_setting', [Weight_logsController::class, 'goal_setting'])->name('goal_setting');
Route::PUT('/weight_logs/goal_setting', [Weight_logsController::class, 'update'])->name('goal_setting.update');

Route::get('/register/step1', [RegisterController::class, 'step1'])->name('step1');//未実装
Route::get('/register/step2', [RegisterController::class, 'step2'])->name('step2');//未実装

Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
