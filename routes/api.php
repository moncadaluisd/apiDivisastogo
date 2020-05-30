<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('category', 'Api\CategoryController', [
  'only' => ['index', 'show']
]);

Route::apiResource('currency', 'Api\CurrencyController', [
  'only' => ['index', 'show']
]);

Route::apiResource('plan', 'Api\PlanController', [
  'only' => ['index', 'show']
]);

Route::apiResource('reset', 'Api\Auth\ResetPasswordController', [
  'only' => ['store', 'show']
]);

Route::apiResource('register', 'Api\Auth\RegisterController', [
  'only' => ['store', 'show']
]);

Route::apiResource('login', 'Api\Auth\LoginController', [
  'only' => ['store']
]);



Route::middleware(['auth.jwt'])->group(function () {

Route::apiResource('me', 'Api\User\UserController', [
  'only' => ['index', 'show', 'update']
]);

Route::apiResource('user/data', 'Api\User\UserDataController', [
  'only' => ['index', 'store', 'update']
]);

Route::apiResource('user/preference', 'Api\User\UserPreferenceController', [
  'only' => ['index', 'store', 'update']
]);

Route::apiResource('announcement/create', 'Api\Announcement\CreateAnnouncementController', [
  'only' => ['index', 'store', 'update']
]);

Route::get('announcement/request/get/{nombre}', 'Api\Announcement\RequestController@getRequest');
Route::put('announcement/request/cancel', 'Api\Announcement\RequestController@cancelRequest');
Route::apiResource('announcement/request', 'Api\Announcement\RequestController', [
  'only' => ['index', 'store', 'update', 'show']
]);








Route::group(['namespace' => 'Api\Admin', 'as' => 'admin.', 'prefix' => 'admin'], function() {

  Route::apiResource('category', 'CategoryController', [
    'only' => ['store', 'update', 'delete']
  ]);

  Route::apiResource('currency', 'CurrencyController', [
    'only' => ['store', 'update', 'delete']
  ]);

  Route::apiResource('plan', 'PlanController', [
    'only' => ['store', 'update', 'delete']
  ]);

  Route::apiResource('level', 'User\UserLevelController');

});
});
Route::apiResource('announcement', 'Api\Announcement\AnnouncementController', [
  'only' => ['index', 'show']
]);
