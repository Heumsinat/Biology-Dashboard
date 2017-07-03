<?php

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
//Route::get('/admin', function () {
//    return view('adminlte::admin');
//});
Route::get('/question', function () {
    return view('adminlte::question');
});
Route::get('/level', function () {
    return view('adminlte::level');
});
Route::get('/badge', function () {
    return view('adminlte::badge');
});
Route::get('/user_badge', function () {
    return view('adminlte::user_badge');
});

Route::get('/user_question', function () {
    return view('adminlte::user_question');
});



Route::group(['middleware' => 'auth'], function () {

    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::resource('admin/admin', 'Admin\\AdminController');
Route::resource('admin/role', 'Role\\RoleController');
Route::resource('admin/level', 'Level\\LevelController');
Route::resource('admin/badge', 'Badge\\BadgeController');
Route::resource('admin/question', 'Question\\QuestionController');
Route::resource('admin/question', 'Question\\QuestionController');