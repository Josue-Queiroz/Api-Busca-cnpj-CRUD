<?php

use App\Http\Controllers\EnterpriseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Bibliotec Layout https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/installation.html
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Enterprise Controllers*/
Route::get('/home', [EnterpriseController::class, 'index'])->name('home');
Route::get('enterprise/list', [EnterpriseController::class, 'list'])->name('enterprise.list');
Route::get('enterprise/new', [EnterpriseController::class, 'addEnterprise'])->name('enterprise.add');
Route::post('enterprise/new/show', [EnterpriseController::class, 'addEnterpriseShow'])->name('enterprise.add.show');
Route::get('enterprise/edit/{id}', [EnterpriseController::class, 'editEnterprise'])->name('enterprise.edit');
Route::put('enterprise/edit/{id}', [EnterpriseController::class, 'editEnterpriseShow'])->name('enterprise.edit.show');
Route::post('enterprise/search', [EnterpriseController::class, 'searchEnterprise'])->name('enterprise.search');
Route::get('enterprise/details/{id}', [EnterpriseController::class, 'searchDetails'])->name('enterprise.details');


Route::get('enterprise/disabled/{id}', [EnterpriseController::class, 'disabledEnterprise'])->name('enterprise.desabled');
Route::get('enterprise/list/disabled', [EnterpriseController::class, 'disabledEnterpriseList'])->name('enterprise.desabled.list');
Route::get('enterprise/list/restore/{id}', [EnterpriseController::class, 'restoreEnterprise'])->name('enterprise.restore.list');
Route::get('enterprise/list/disabled/definitive/{id}', [EnterpriseController::class, 'disabledEnterpriseDefinitive'])->name('enterprise.desabled.definitive');


// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
// Route::group(['middleware' => 'auth'], function () {
//     /*Navegation dashboard*/
//     Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
//     Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
//     Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
//     Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// });
