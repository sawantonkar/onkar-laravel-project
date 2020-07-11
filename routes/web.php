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

//***************************************** Auth ****************************************************************************

//Registration
Route::view('register','RegisterationLogin/registration');
Route::post('register','RegisterLoginController@register');

//Login
Route::view('login','RegisterationLogin/login');
Route::post('login','RegisterLoginController@login');

//Logout
Route::get('logout','RegisterLoginController@logout');


//***************************************** Auth ****************************************************************************





//*************************************** Admin section ********************************************************************

//Admin home 
//Route::view('/adminhome','Admin/adminhome')->middleware('is_admin','backbutton');
Route::get('/adminhome','AdminController@adminhome')->middleware('is_admin','backbutton');
Route::get('/adminProfileEdit/{id}','AdminController@adminProfileEdit')->middleware('is_admin','backbutton');
Route::post('/adminUpdateProfile','AdminController@adminUpdateProfile')->middleware('is_admin','backbutton');
Route::get('/adminChangePassword/{id}','AdminController@adminChangePassword')->middleware('is_admin','backbutton');
Route::post('/adminUpdatePassword','AdminController@adminUpdatePassword')->middleware('is_admin','backbutton');



//Semester
Route::get('/adminViewSemester','AdminController@adminViewSemester')->middleware('is_admin','backbutton');
Route::get('/adminAddSemester','AdminController@adminAddSemester')->middleware('is_admin','backbutton');
Route::post('/adminInsertSemester','AdminController@adminInsertSemester')->middleware('is_admin','backbutton');
Route::get('/adminEditSemester/{id}','AdminController@adminEditSemester')->middleware('is_admin','backbutton');
Route::post('/adminUpdateSemester','AdminController@adminUpdateSemester')->middleware('is_admin','backbutton');
Route::get('/adminDeleteSemester/{id}','AdminController@adminDeleteSemester')->middleware('is_admin','backbutton');

//Subject
Route::get('/adminViewSubject','AdminController@adminViewSubject')->middleware('is_admin','backbutton');
Route::get('/adminAddSubject','AdminController@adminAddSubject')->middleware('is_admin','backbutton');
Route::post('/adminInsertSubject','AdminController@adminInsertSubject')->middleware('is_admin','backbutton');
Route::get('/adminEditSubject/{id}','AdminController@adminEditSubject')->middleware('is_admin','backbutton');
Route::post('/adminUpdateSubject','AdminController@adminUpdateSubject')->middleware('is_admin','backbutton');
Route::get('/adminDeleteSubject/{id}','AdminController@adminDeleteSubject')->middleware('is_admin','backbutton');

//Teacher
Route::get('/adminViewTeacher','AdminController@adminViewTeacher')->middleware('is_admin','backbutton');
Route::get('/adminEditTeacherStatus/{id}','AdminController@adminEditTeacherStatus')->middleware('is_admin','backbutton');
Route::post('/adminUpdateTeacherStatus','AdminController@adminUpdateTeacherStatus')->middleware('is_admin','backbutton');
Route::get('/adminDeleteTeacher/{id}','AdminController@adminDeleteTeacher')->middleware('is_admin','backbutton');

//Student
Route::get('/adminViewStudent','AdminController@adminViewStudent')->middleware('is_admin','backbutton');
Route::get('/adminEditStudentStatus/{id}','AdminController@adminEditStudentStatus')->middleware('is_admin','backbutton');
Route::post('/adminUpdateStudentStatus','AdminController@adminUpdateStudentStatus')->middleware('is_admin','backbutton');
Route::get('/adminDeleteStudent/{id}','AdminController@adminDeleteStudent')->middleware('is_admin','backbutton');


//*************************************** Admin section ********************************************************************






//*************************************** Teacher section ********************************************************************

//Teacher profile
//Route::view('/teacherhome','Teacher/teacherhome')->middleware('is_teacher','backbutton');
Route::get('/teacherhome','TeacherController@teacherhome')->middleware('is_teacher','backbutton');
Route::get('/teacherEditProfile/{id}','TeacherController@teacherEditProfile')->middleware('is_teacher','backbutton');
Route::post('/teacherUpdateProfile','TeacherController@teacherUpdateProfile')->middleware('is_teacher','backbutton');
Route::get('/teacherChangePassword/{id}','TeacherController@teacherChangePassword')->middleware('is_teacher','backbutton');
Route::post('/teacherUpdatePassword','TeacherController@teacherUpdatePassword')->middleware('is_teacher','backbutton');

//Teacher view list of students
Route::get('/teacherViewStudent','TeacherController@teacherViewStudent')->middleware('is_teacher','backbutton');

//Result
Route::get('/teacherViewResult','TeacherController@teacherViewResult')->middleware('is_teacher','backbutton');
Route::get('/teacherAddResult','TeacherController@teacherAddResult')->middleware('is_teacher','backbutton');
Route::post('/teacherInsertResult','TeacherController@teacherInsertResult')->middleware('is_teacher','backbutton');
Route::get('/teacherEditResult/{id1}/{id2}','TeacherController@teacherEditResult')->middleware('is_teacher','backbutton');
Route::post('/teacherUpdateResult','TeacherController@teacherUpdateResult')->middleware('is_teacher','backbutton');
Route::get('/teacherDeleteResult/{id}','TeacherController@teacherDeleteResult')->middleware('is_teacher','backbutton');



//*************************************** Teacher section ********************************************************************





//***************************************  Student section *******************************************************************

Route::get('/studenthome','StudentController@studenthome')->middleware('is_student','backbutton');
Route::get('/studentEditProfile/{id}','StudentController@studentEditProfile')->middleware('is_student','backbutton');
Route::post('/studentUpdateProfile','StudentController@studentUpdateProfile')->middleware('is_student','backbutton');
Route::get('/studentChangePassword/{id}','StudentController@studentChangePassword')->middleware('is_student','backbutton');
Route::post('/studentUpdatePassword','StudentController@studentUpdatePassword')->middleware('is_student','backbutton');


Route::get('/studentViewResult','StudentController@studentViewResult')->middleware('is_student','backbutton');



//***************************************  Student section *******************************************************************