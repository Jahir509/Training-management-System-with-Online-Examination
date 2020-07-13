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

// Category Route
Route::get('/admin/exam-category', 'AdminController@examCategory')->name('admin.exam-category');
Route::post('/admin/exam-category', 'AdminController@examCategoryStore')->name('exam-category.store');
Route::get('/admin/edit/exam-category/{category}', 'AdminController@examCategoryEdit')->name('exam-category.edit');
Route::put('/admin/exam-category/{category}', 'AdminController@examCategoryUpdate')->name('exam-category.update');
Route::get('/admin/exam-category/{category}', 'AdminController@examCategoryDelete')->name('exam-category.delete');


//Exam Manage Route
Route::get('/admin/manage-exam', 'AdminController@manageExam')->name('admin.manage-exam');
Route::post('/admin/manage-exam', 'AdminController@storeExam')->name('manage-exam.store');
Route::get('/admin/edit/manage-exam/{exam}', 'AdminController@editExam')->name('manage-exam.edit');
Route::put('/admin/manage-exam/{exam}', 'AdminController@updateExam')->name('manage-exam.update');
Route::get('/admin/manage-exam/{exam}', 'AdminController@deleteExam')->name('manage-exam.delete');


// Manage Student Route
Route::get('/admin/manage-student', 'AdminController@manageStudent')->name('admin.manage-student');
Route::post('/admin/manage-student', 'AdminController@storeStudent')->name('manage-student.store');
Route::get('/admin/edit/manage-student/{student}', 'AdminController@editStudent')->name('manage-student.edit');
Route::put('/admin/manage-student/{student}', 'AdminController@updateStudent')->name('manage-student.update');
Route::get('/admin/manage-student/{student}', 'AdminController@deleteStudent')->name('manage-student.delete');