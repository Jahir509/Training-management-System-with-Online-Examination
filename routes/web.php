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

Route::get('/', 'IndexController@index')->name('landing-page');
Route::get('/courses', 'IndexController@showAllCourse')->name('showAllCourse');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/events', 'IndexController@events')->name('events');
Route::get('/blog', 'IndexController@blog')->name('blog');
Route::get('/contact', 'IndexController@contact')->name('contact');
Route::get('/workshops', 'IndexController@workshops')->name('workshops');
Route::get('/teachers', 'IndexController@teachers')->name('teachers');



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


Route::get('/admin/exam/question/{exam}', 'AdminController@manageExamQuestion')->name('manage-exam.question');
Route::post('/admin/manage-exam-question/', 'AdminController@storeExamQuestion')->name('manage-exam-question.store');
Route::get('/admin/edit/manage-exam/question/{question}', 'AdminController@editExamQuestion')->name('manage-exam-question.edit');
Route::put('/admin/manage-exam/question/{question}', 'AdminController@updateExamQuestion')->name('manage-exam-question.update');
Route::get('/admin/manage-exam/question/{question}', 'AdminController@deleteExamQuestion')->name('manage-exam-question.delete');




// Manage Student Route
Route::get('/admin/manage-student', 'AdminController@manageStudent')->name('admin.manage-student');
Route::post('/admin/manage-student', 'AdminController@storeStudent')->name('manage-student.store');
Route::get('/admin/edit/manage-student/{student}', 'AdminController@editStudent')->name('manage-student.edit');
Route::put('/admin/manage-student/{student}', 'AdminController@updateStudent')->name('manage-student.update');
Route::get('/admin/manage-student/{student}', 'AdminController@deleteStudent')->name('manage-student.delete');


// Manage Instuctor Route
Route::get('/admin/manage-instructor', 'AdminController@manageInstructor')->name('admin.manage-instructor');
Route::post('/admin/manage-instructor', 'AdminController@storeInstructor')->name('manage-instructor.store');
Route::get('/admin/edit/manage-instructor/{instructor}', 'AdminController@editInstructor')->name('manage-instructor.edit');
Route::put('/admin/manage-instructor/{instructor}', 'AdminController@updateInstructor')->name('manage-instructor.update');
Route::get('/admin/manage-instructor/{instructor}', 'AdminController@deleteInstructor')->name('manage-instructor.delete');
Route::get('/admin/asign-instructor/{instructor}', 'AdminController@assignCourseToInstructor')->name('assign-instructor');
Route::post('/admin/asign-instructor/{instructor}', 'AdminController@assignInstructor')->name('assign-instructor.store');






// Manage Portal Route
Route::get('/admin/manage-portal', 'AdminController@managePortal')->name('admin.manage-portal');
Route::post('/admin/manage-portal', 'AdminController@storePortal')->name('manage-portal.store');
Route::get('/admin/edit/manage-portal/{portal}', 'AdminController@editPortal')->name('manage-portal.edit');
Route::put('/admin/manage-portal/{portal}', 'AdminController@updatePortal')->name('manage-portal.update');
Route::get('/admin/manage-portal/{portal}', 'AdminController@deletePortal')->name('manage-portal.delete');


// Portal Controller Route
Route::get('student/signup', 'PortalController@signupPortalUser')->name('portal.sign-up');
Route::post('student/signup', 'PortalController@registerPortalUser')->name('portal.register');
Route::get('student/login', 'PortalController@loginPortalUser')->name('portal.login');
Route::post('student/login/user', 'PortalController@signedInPortalUser')->name('portal.signed-in');
Route::get('student/logout', 'PortalController@logoutPortalUser')->name('portal.logout');





Route::get('student/home', 'PortalOperationController@portalHome')->name('portal.home');
Route::get('student/exam', 'PortalOperationController@portalExam')->name('portal.exam');
Route::get('student/exam/join/{exam_id}', 'PortalOperationController@portalJoinExam')->name('portal.join-exam');
Route::post('student/exam/submit', 'PortalOperationController@portalSubmitExam')->name('portal.submit-exam');
Route::get('student/exam/view-result/{exam_result}', 'PortalOperationController@portalViewExamResult')->name('portal.view-result');

Route::get('student/exam/info/{exam}', 'PortalOperationController@portalExamInfo')->name('portal.exam-info');
Route::post('student/exam/info/', 'PortalOperationController@storeStudenExamInfo')->name('portal.student-exam-info');
Route::get('student/exam/print/{student}', 'PortalOperationController@printStudenExamInfo')->name('portal.print-accessCard');







Route::get('login/teacher', 'Auth\LoginController@showTeacherLoginForm')->name('teacher.show-login');
Route::post('login/teacher', 'Auth\LoginController@teacherLogin')->name('teacher.login');
Route::get('register/teacher', 'Auth\RegisterController@showTeacherRegisterForm')->name('teacher.show-register');
Route::post('register/teacher', 'Auth\RegisterController@createTeacher')->name('teacher.register');



Route::get('/teacher', 'TeacherController@index')->name('teacher.home');
