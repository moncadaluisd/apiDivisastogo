<?php

use Illuminate\Support\Facades\Route;
use App\Announcement;
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
    return view('welcome');
});

Route::get('/prueba', 'Api\Announcement\BuyerRequestController@index');
Route::get('/prueba2', function(){
  $app = Announcement::whereHas('requests', function($q) {
                         $q->where("id","=",3);
                     })->first();
  return $app;
});
