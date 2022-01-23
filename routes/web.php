<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController as Regis;

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

Route::get('/', function () {
    return view('x_pub.x');
});

route::get('/userHasConfirmed/{token}',[Regis::class,"userHasConfirmed"]);



Route::get('/{any}', function () {
    return view('x_pub.x');
})->where('any', '.*');

