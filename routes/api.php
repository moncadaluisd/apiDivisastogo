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

Route::apiResource('/password/reset', 'Api\Auth\ResetPasswordController');
Route::apiResource('/profile', 'Api\ProfileController');

Route::apiResource('category', 'Api\CategoryController', [
  'only' => ['index', 'show']
]);


Route::apiResource('currency', 'Api\CurrencyController', [
  'only' => ['index', 'show']
]);

Route::apiResource('plan', 'Api\PlanController', [
  'only' => ['index', 'show']
]);

Route::apiResource('ticket/category', 'Api\Ticket\TicketCategoryController', [
  'only' => ['index', 'show']
]);



Route::apiResource('register', 'Api\Auth\RegisterController', [
  'only' => ['store', 'update']
]);

Route::apiResource('login', 'Api\Auth\LoginController', [
  'only' => ['store']
]);

Route::get('/from/{from}/to/{to}', 'Api\Announcement\AnnouncementController@search');



Route::middleware(['auth.jwt'])->group(function () {

  Route::get('buyer/payments/wallet', 'Api\Buyer\PaymentsController@wallet');
  Route::get('buyer/payments/{request}', 'Api\Buyer\PaymentsController@index' );
  Route::post('buyer/payments',    'Api\Buyer\PaymentsController@store');

  Route::resource('notification', 'Api\NotificationController');


Route::apiResource('me', 'Api\User\UserController', [
  'only' => ['index', 'show']
]);
Route::put('me', 'Api\User\UserController@update');

Route::apiResource('user/data', 'Api\User\UserDataController', [
  'only' => ['index', 'store', 'update']
]);

Route::apiResource('user/preference', 'Api\User\UserPreferenceController', [
  'only' => ['index', 'store', 'update']
]);

Route::get('buyer', 'Api\Announcement\CreateAnnouncementController@getBuyer');

Route::apiResource('announcement/create', 'Api\Announcement\CreateAnnouncementController', [
  'only' => ['index', 'store', 'update', 'destroy']
]);

Route::post('announcement/request/qualify/{id}', 'Api\Announcement\LikesCommentsController@store');

Route::apiResource('announcement/buyer', 'Api\Announcement\BuyerRequestController', [
  'only' => ['index', 'store', 'update']
]);
Route::get('announcement/buyer/{category}/state/{state}', 'Api\Announcement\BuyerRequestController@search');

Route::get('announcement/request/get/{nombre}', 'Api\Announcement\RequestController@getRequest');
Route::put('announcement/request/cancel', 'Api\Announcement\RequestController@cancelRequest');
Route::apiResource('announcement/request', 'Api\Announcement\RequestController', [
  'only' => ['index', 'store', 'update', 'show']
]);

Route::post('announcement/message/create/{id}', 'Api\Announcement\MessageController@createMessage');
Route::get('announcement/message/{id}', 'Api\Announcement\MessageController@show');

Route::put('announcement/message/{id}/cancel', 'Api\Announcement\RequestController@cancelRequest');

Route::get('/user/wallet', 'Api\User\UserWalletController@index');

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


});
});
Route::apiResource('announcement', 'Api\Announcement\AnnouncementController', [
  'only' => ['index', 'show']
]);

Route::get('buyer/{username}', 'Api\SearchController@profileSearchUsername');
Route::get('buyer/{username}/requests', 'Api\SearchController@profileSearch');
