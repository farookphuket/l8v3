<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// user 
use App\Http\Controllers\UserController as USER;

// profile 
use App\Http\Controllers\ProfileController as Profile;

// for login and signup
use App\Http\Controllers\RegisterController as Regis;
use App\Http\Controllers\LoginController as Login;

// admin 
use App\Http\Controllers\Admin\DashBoardController as Admin;


// Member 
use App\Http\Controllers\Member\DashBoardController as Member;
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

Route::post('/login',[Login::class,'store'])->name('login');

Route::post('/register',[Regis::class,'store']);
Route::get('/userHasConfirmed',[Regis::class,'userHasConfirmed']);

// check user passport
Route::post('/checkuserpassport',[Login::class,'checkUserPassport'])
    ->name("checkUserPassport");

/* make a route prefix for member group */
Route::prefix("member")->name("member.")->middleware('auth:sanctum')
        ->group(function(){
    Route::resource('/dashboard',Member::class);

    // profile
    Route::resource('/profile',Profile::class);

    // confirm password 
    Route::post('/confirm-password',[USER::class,"userIsConfirmPassword"])
        ->name("userIsConfirmPassword");

    /* Logout from member */
    Route::delete('/logout',[Login::class,'destroy'])->name('logout');

});


// admin section
Route::prefix("admin")->name("admin.")->middleware('auth:sanctum')
      ->group(function(){
    Route::resource('/dashboard',Admin::class);
});

