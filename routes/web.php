<?php
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\GioiThieuController;
use App\Http\Controllers\Frontend\LienHeController;


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
//     return view('home');
// });
Route::get('/', [HomeController::class, 'home']);
Route::get ('/gioi-thieu',[GioiThieuController::class, 'index']);
Route::get ('/lien-he',[LienHeController::class, 'index']);
