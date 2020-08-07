<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Auth::routes(['register' => false]);

Route::group(['middleware' => ['role:admin']], function () {


Route::resource('/users', 'Admin\UsersAdminController'); 
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::resource('/schools', 'Admin\SchoolsAdminController');
Route::resource('/departments', 'Admin\DepartmentsAdminController');
Route::resource('/curricula', 'Admin\CurriculaAdminController');
Route::resource('/suggests', 'Admin\SuggestsAdminController');

    
});



