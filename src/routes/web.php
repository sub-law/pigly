<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogsController;
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

Route::get('/weight_logs', [WeightLogsController::class, 'index'])->name('weight_logs.index');

Route::get('/weight_logs/create', [WeightLogsController::class, 'create'])->name('weight_logs.create');
Route::post('/weight_logs', [WeightLogsController::class, 'store'])->name('weight_logs.store');

Route::get('/weight_logs/goal_setting', [WeightLogsController::class, 'goal_setting'])->name('weight_logs.goal_setting');
Route::PUT('/weight_logs/goal_setting', [WeightLogsController::class, 'updateGoal'])->name('weight_logs.goal_setting.update');

Route::get('/weight_logs/search', [WeightLogsController::class, 'search'])->name('weight_logs.search');

Route::get('/weight_logs/{weightLogId}', [WeightLogsController::class, 'edit'])->name('weight_logs.edit');
Route::put('/weight_logs/{weightLogId}/update', [WeightLogsController::class, 'update'])->name('weight_logs.update');

Route::delete('/weight_logs/{weightLogId}/delete', [WeightLogsController::class, 'delete'])->name('weight_logs.delete');

Route::get('/register/step1', [RegisterController::class, 'step1'])->name('step1'); Route::post('/register/step1', [RegisterController::class, 'postStep1'])->name('postStep1');
Route::get('/register/step2', [RegisterController::class, 'step2'])->name('step2');
Route::post('/register/step2', [RegisterController::class, 'postStep2'])->name('postStep2');

Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/login', [RegisterController::class, 'postLogin'])->name('login.post');
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
