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
Route::get('/courses/{id}', 'IndexController@showCourse')->name('course.show');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/events', 'IndexController@events')->name('events');
Route::get('/events/{event}', 'IndexController@showEvent')->name('event.show');
Route::get('/blog', 'IndexController@blog')->name('blog');
Route::get('/contact', 'IndexController@contact')->name('contact');
Route::get('/workshops', 'IndexController@workshops')->name('workshops');
Route::get('/workshops/{workshop}', 'IndexController@showWorkshop')->name('workshop.show');
Route::get('/teachers', 'IndexController@teachers')->name('teachers');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin.home');

// // Category Route
// Route::get('/admin/course-category', 'AdminController@examCategory')->name('admin.exam-category');
// Route::post('/admin/course-category', 'AdminController@examCategoryStore')->name('exam-category.store');
// Route::get('/admin/edit/course-category/{category}', 'AdminController@examCategoryEdit')->name('exam-category.edit');
// Route::put('/admin/course-category/{category}', 'AdminController@examCategoryUpdate')->name('exam-category.update');
// Route::get('/admin/course-category/{category}', 'AdminController@examCategoryDelete')->name('exam-category.delete');


//Exam Manage Route
Route::get('/admin/manage-course', 'AdminController@manageExam')->name('admin.manage-exam');
Route::post('/admin/manage-course', 'AdminController@storeExam')->name('manage-exam.store');
Route::get('/admin/edit/manage-course/{exam}', 'AdminController@editExam')->name('manage-exam.edit');
Route::put('/admin/manage-course/{exam}', 'AdminController@updateExam')->name('manage-exam.update');
Route::get('/admin/manage-course/{exam}', 'AdminController@deleteExam')->name('manage-exam.delete');


Route::get('/admin/exam/question/{exam}', 'AdminController@manageExamQuestion')->name('manage-exam.question');
Route::post('/admin/manage-course-question/', 'AdminController@storeExamQuestion')->name('manage-exam-question.store');
Route::get('/admin/edit/manage-course/question/{question}', 'AdminController@editExamQuestion')->name('manage-exam-question.edit');
Route::put('/admin/manage-course/question/{question}', 'AdminController@updateExamQuestion')->name('manage-exam-question.update');
Route::get('/admin/manage-course/question/{question}', 'AdminController@deleteExamQuestion')->name('manage-exam-question.delete');




// Manage Student Route
Route::get('/admin/show-student', 'AdminController@showStudent')->name('admin.show-students');
Route::post('/admin/student/store', 'AdminController@saveStudent')->name('admin.store-student');
Route::get('/admin/edit/student/{id}', 'AdminController@editStudent')->name('admin.edit-student');
Route::put('/admin/edit/student/{id}', 'AdminController@upStudent')->name('admin.update-student');
Route::get('/admin/student/{id}', 'AdminController@delStudent')->name('admin.delete-student');
Route::get('/admin/manage-student', 'AdminController@manageStudent')->name('admin.manage-student');
Route::post('/admin/manage-student', 'AdminController@storeStudent')->name('manage-student.store');
Route::get('/admin/edit/manage-student/{student}', 'AdminController@editStudent')->name('manage-student.edit');
Route::put('/admin/manage-student/{student}', 'AdminController@updateStudent')->name('manage-student.update');
Route::get('/admin/manage-student/{student}', 'AdminController@deleteStudent')->name('manage-student.delete');


// Manage Instuctor Route
Route::get('/admin/manage-instructor', 'AdminController@manageInstructor')->name('admin.manage-instructor');
Route::post('/admin/manage-instructor', 'AdminController@storeInstructor')->name('manage-instructor.store');
Route::get('/admin/edit/manage-instructor/{teacher}', 'AdminController@editInstructor')->name('manage-instructor.edit');
Route::put('/admin/manage-instructor/{teacher}', 'AdminController@updateInstructor')->name('manage-instructor.update');
Route::get('/admin/manage-instructor/{teacher}', 'AdminController@deleteInstructor')->name('manage-instructor.delete');
Route::get('/admin/asign-instructor/{teacher}', 'AdminController@assignCourseToInstructor')->name('assign-instructor');
Route::post('/admin/asign-instructor/{teacher}', 'AdminController@assignInstructor')->name('assign-instructor.store');
Route::get('/admin/assign-course/{course}', 'AdminController@deleteAssignedCourse')->name('assign-course.delete');


// Event
Route::get('/admin/events', 'AdminController@showAllEvent')->name('admin.show-event');
Route::post('/admin/events', 'AdminController@storeEvent')->name('admin.store-event');
Route::get('/admin/events/show/{event}', 'AdminController@showEvent')->name('manage-event.show');
Route::get('/admin/events/edit/{event}', 'AdminController@editEvent')->name('manage-event.edit');
Route::put('/admin/events/{event}', 'AdminController@updateEvent')->name('manage-event.update');
Route::get('/admin/events/{event}', 'AdminController@deleteEvent')->name('manage-event.delete');

// Event
Route::get('/admin/workshops', 'AdminController@showAllWorkshop')->name('admin.show-workshop');
Route::post('/admin/workshops', 'AdminController@storeWorkshop')->name('admin.store-workshop');
Route::get('/admin/workshops/show/{workshop}', 'AdminController@showWorkshop')->name('manage-workshop.show');
Route::get('/admin/workshops/edit/{workshop}', 'AdminController@editWorkshop')->name('manage-workshop.edit');
Route::put('/admin/workshops/{workshop}', 'AdminController@updateWorkshop')->name('manage-workshop.update');
Route::get('/admin/workshops/{workshop}', 'AdminController@deleteWorkshop')->name('manage-workshop.delete');





// Manage Portal Route
Route::get('/admin/manage-portal', 'AdminController@managePortal')->name('admin.manage-portal');
Route::post('/admin/manage-portal', 'AdminController@storePortal')->name('manage-portal.store');
Route::get('/admin/edit/manage-portal/{portal}', 'AdminController@editPortal')->name('manage-portal.edit');
Route::put('/admin/manage-portal/{portal}', 'AdminController@updatePortal')->name('manage-portal.update');
Route::get('/admin/manage-portal/{portal}', 'AdminController@deletePortal')->name('manage-portal.delete');


// // Portal Controller Route
// Route::get('/student/signup', 'PortalController@signupPortalUser')->name('portal.sign-up');
// Route::post('/student/signup', 'PortalController@registerPortalUser')->name('portal.register');
// Route::get('/student/login', 'PortalController@loginPortalUser')->name('portal.login');
// Route::post('/student/login/user', 'PortalController@signedInPortalUser')->name('portal.signed-in');
// Route::get('/student/logout', 'PortalController@logoutPortalUser')->name('portal.logout');





Route::get('/student', 'StudentController@index')->name('portal.home');
Route::get('/student/profile', 'StudentController@profile')->name('portal.profile');
Route::put('/student/profile', 'StudentController@updateProfile')->name('portal.updateProfile');
Route::get('/student/courses/show-all', 'StudentController@showAllCourse')->name('portal.showAll');
// Route::get('/student/courses/my', 'StudentController@showMyCourse')->name('portal.myCourse');
Route::get('/student/course', 'StudentController@portalExam')->name('portal.exam');
Route::get('/student/course/join/{exam_id}', 'StudentController@portalJoinExam')->name('portal.join-exam');
Route::post('/student/course/submit', 'StudentController@portalSubmitExam')->name('portal.submit-exam');
Route::get('/student/course/view-result/{exam_result}', 'StudentController@portalViewExamResult')->name('portal.view-result');

Route::get('/student/course/info/{exam}', 'StudentController@portalExamInfo')->name('portal.exam-info');
Route::post('/student/course/info/', 'StudentController@storeStudenExamInfo')->name('portal.student-exam-info');
Route::get('/student/course/print/{student}', 'StudentController@printStudenExamInfo')->name('portal.print-accessCard');







// Route::get('login/teacher', 'Auth\LoginController@showTeacherLoginForm')->name('teacher.show-login');
// Route::post('login/teacher', 'Auth\LoginController@teacherLogin')->name('teacher.login');
// Route::get('register/teacher', 'Auth\RegisterController@showTeacherRegisterForm')->name('teacher.show-register');
// Route::post('register/teacher', 'Auth\RegisterController@createTeacher')->name('teacher.register');

// Route::get('login/student', 'Auth\LoginController@showStudentLoginForm')->name('student.show-login');
// Route::post('login/student', 'Auth\LoginController@studentLogin')->name('student.login');
// Route::get('register/student', 'Auth\RegisterController@showStudentRegisterForm')->name('student.show-register');
// Route::post('register/student', 'Auth\RegisterController@createStudent')->name('student.register');



Route::get('/teacher', 'TeacherController@index')->name('teacher.home');
Route::get('/teacher/exam/question/{id}', 'TeacherController@addQuestion')->name('add-exam-question');
Route::get('/teacher/show/results', 'TeacherController@manageStudent')->name('show-results');
Route::post('/teacher/manage-exam-question/', 'TeacherController@storeQuestion')->name('store-exam-question');
Route::get('/teacher/manage-exam/edit/question/{question}', 'TeacherController@editQuestion')->name('edit-exam-question');
Route::put('/teacher/manage-exam/question/{question}', 'TeacherController@updateQuestion')->name('update-exam-question');
Route::get('/teacher/manage-exam/question/{question}', 'TeacherController@deleteQuestion')->name('delete-exam-question');
Route::get('/teacher/assign-course-material/', 'TeacherController@addCourseMaterial')->name('teacher.add-course-material');
