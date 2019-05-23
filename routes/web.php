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

Route::get('search-teacher', 'studentController@getSearchTeacher');

//ajax search teacher by department
Route::post('searchbydep', 'studentController@searchByDep');
//ajax search teacher by lecture_qt
Route::post('searchbylec', 'studentController@searchByLec');

//info teacher
Route::get('teacher/info/{id}', 'studentController@getInfoTeacher');

//updateinfo
Route::get('update/teacher', 'TeacherController@getUpdateInfo')->middleware('teacherLogin');;

//loginteacher
Route::get('teacher/login', 'TeacherController@getLoginTeacher');
Route::post('/teacher/login', 'TeacherController@postLogin');
//Đăng xuất
Route::get('/teacher/logout','TeacherController@getLogout');

// ajax add lecture_qt
Route::post('addlecture_qt', 'TeacherController@addLecture_qt')->middleware('teacherLogin');

//delete lecture_qt
Route::get('deletelecture_qt/{id}', 'TeacherController@deleteLecture_qt')->middleware('teacherLogin');

//update avatar


//loginadmin
Route::get('admin/login', 'AdminController@getLoginAdmin');
Route::post('/admin/login', 'AdminController@postLogin');
//Đăng xuất
Route::get('/admin/logout','AdminController@getLogout');

//quanlydonvi
Route::get('/quanlydonvi', 'AdminController@getQuanLyDonVi')->middleware('adminLogin');

//listteacher
Route::get('/listteacher', 'AdminController@getListTeacher')->middleware('adminLogin');