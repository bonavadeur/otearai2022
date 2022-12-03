<?php

use App\Http\Controllers\myController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [myController::class, 'index']);
Route::get('/admin', [myController::class, 'admin']);
Route::post('/login', [myController::class, 'login']);
Route::get('/client', [myController::class, 'client'])->middleware('client');
Route::get('/logout', [myController::class, 'logout'])->middleware('client');
Route::get('/stat', [myController::class, 'stat'])->middleware('client');



Route::get('/api/matches', [myController::class, 'matches']);
Route::post('/api/client-match-submit', [myController::class, 'clientSubmit']);
Route::post('/api/client-choice', [myController::class, 'clientChoice']);
Route::get('/api/update', [myController::class, 'update']);
Route::get('/api/stat', [myController::class, 'getStat']);
