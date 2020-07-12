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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin.home');
Route::get('/admin/exam-category', 'AdminController@examCategory')->name('admin.exam-category');
Route::post('/admin/exam-category', 'AdminController@examCategoryStore')->name('exam-category.store');
Route::get('/admin/edit/exam-category/{category}', 'AdminController@examCategoryEdit')->name('exam-category.edit');
Route::put('/admin/exam-category/{category}', 'AdminController@examCategoryUpdate')->name('exam-category.update');
Route::get('/admin/exam-category/{category}', 'AdminController@examCategoryDelete')->name('exam-category.delete');

