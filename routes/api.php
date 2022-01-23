<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// user 
use App\Http\Controllers\UserController as USER;

// for login and signup
use App\Http\Controllers\RegisterController as Regis;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[Regis::class,'login'])->name('login');

Route::post('/register',[Regis::class,'store']);
Route::get('/userHasConfirmed',[Regis::class,'userHasConfirmed']);

