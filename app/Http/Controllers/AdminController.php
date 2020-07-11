<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\teacher;
use App\student;
use App\Semester;
use App\Subject;
use Crypt;
use File;

class AdminController extends Controller
{
    public function adminhome(){
        $teacher = teacher::all()->count();
        $activeTeacher = teacher::where('status','Active')->count();

        $student = student::all()->count();
        $activeStudent = student::where('status','Active')->count();

        $admin = admin::all();
        return view('/Admin/adminhome')->with(['admin'=>$admin,'teacher'=>$teacher,'activeTeacher'=>$activeTeacher,'student'=>$student,'activeStudent'=>$activeStudent]);
    }

    public function adminProfileEdit($id){
        
        $editprofile = admin::find($id);
        return view('Admin/adminProfileEdit')->with(['editprofile'=>$editprofile]);
    }

    public function adminUpdateProfile(Request $request){
        $this->validate($request,
            [
                'firstname'=>'required',
                'lastname'=>'required',
                
            ],
            [
                'firstname.required' => 'Enter Firstname',
                'lastname.required' => 'Enter Firstname',
            ]
            );
        $profile = admin::find($request->input('id'));
        if($profile->profile_pic == 'defaultimg.jpg'){
           // echo 'onkar';die;
           if($request->hasfile('profile_pic')){
            $path = public_path().'/images/';
            //File::delete($path.$profile->profile_pic);
            $file = $request->file('profile_pic');
            //dd($file);
            $ext = $file->extension();
            $profile_pic = time().'.'.$ext;
            
            $file->move($path,$profile_pic);
        }else{
            $profile_pic = $profile->profile_pic;
        } 

        }else{
            if($request->hasfile('profile_pic')){
                $path = public_path().'/images/';
                File::delete($path.$profile->profile_pic);
                $file = $request->file('profile_pic');
                //dd($file);
                $ext = $file->extension();
                $profile_pic = time().'.'.$ext;
                
                $file->move($path,$profile_pic);
            }else{
                $profile_pic = $profile->profile_pic;
                
            }

    }
    $profile->firstname = $request->input('firstname');
    $profile->lastname = $request->input('lastname');
    
    $profile->profile_pic = $profile_pic;
    $profile->save();
    return redirect('/adminhome')->with('success_msg','Profile updated successfully.....');
    }

    public function adminChangePassword($id){
        $admin = admin::where('id',$id)->get();
        $pwd = $admin[0]->password;
        $id1 = $admin[0]->id;
        return view('/Admin/adminChangePassword')->with(['pwd'=>$pwd,'id'=>$id1]);
    }

    public function adminUpdatePassword(Request $request){
        $this->validate($request,
        [
            'password'=>'required',
            'new_password'=>'required',
            
        ],
        [
            'password.required' => 'Enter password',
            'new_password.required' => 'Enter new password',
            
        ]
        );  
        $changepwd = admin::find($request->input('id'));
        $admin = admin::where('id',$request->input('id'))->get();
        if($admin[0]->password == $request->input('password')){
            $changepwd->password = $request->input('new_password');
            $changepwd->save();
            return redirect('/adminhome')->with('success_msg','Password changed successfully...');
        } else{
            return redirect('/adminhome')->with('error_msg','Incorrect password enterd...Try again!!!');
        } 
    }

/* ======================================= Semester ==================================================================== */

    public function adminViewSemester(){
        $semester = Semester::all();
        return view('/Admin/adminViewSemester')->with(['semesters'=>$semester]);
    }
    public function adminAddSemester(){
        return view('/Admin/adminAddSemester');
        
    }
    public function adminInsertSemester(Request $request){
        $this->validate($request,
            [
                'sem'=>'required|regex:/(^[1-8]$)/u|unique:semesters,semester',
                
            ],
            [
                'sem.required' => 'Enter semester',
                'sem.regex' => 'Semester value should be a number(1-8)',   
                'sem.unique' => 'Semester already exist',
            ]
            );
            $semester = new Semester;
            $semester->semester = $request->input('sem');
            $semester->save();
            return redirect('/adminViewSemester')->with('success_msg','Semester inserted successfully...');
    }

    public function adminEditSemester($id){
        $semedit = Semester::find($id);
         return view('/Admin/adminEditSemester')->with(['semedit'=>$semedit]);
        
    }

    public function adminUpdateSemester(Request $request){
        $this->validate($request,
            [
                'sem'=>'required|regex:/(^[1-8]$)/u|unique:semesters,semester',
                
            ],
            [
                'sem.required' => 'Enter semester',
                'sem.regex' => 'Semester value should be a number(1-8)',   
                'sem.unique' => 'Semester already exist',
            ]
            );
            $semupdate = Semester::find($request->input('id'));
            
            $semupdate->semester = $request->input('sem');
            $semupdate->save();
            return redirect('/adminViewSemester')->with('success_msg','Semester updated successfully...'); 

    }

    public function adminDeleteSemester($id){
        $semdelete = Semester::find($id);
        $semdelete->delete();
        return redirect('/adminViewSemester')->with('error_msg','Semester deleted successfully...');
    }



/* ======================================= Semester ==================================================================== */







/* ======================================= Subject ==================================================================== */

    public function adminViewSubject(){
        $subjects = Subject::all();
        return view('/Admin/adminViewSubject')->with(['subjects'=>$subjects]);
    }

    public function adminAddSubject(){
        $subjectsemester = Semester::all();
        return view('/Admin/adminAddSubject')->with(['subsem'=>$subjectsemester]);
    }

    public function adminInsertSubject(Request $request){
        $this->validate($request,
            [
                'semester'=>'required|unique:subjects,subject_semester',

                'subject1name'=>'required',
                'subject1marks'=>'required|numeric',

                'subject2name'=>'required',
                'subject2marks'=>'required|numeric',

                'subject3name'=>'required',
                'subject3marks'=>'required|numeric',

                'subject4name'=>'required',
                'subject4marks'=>'required|numeric',
                
            ],
            [
                'semester.required' => 'Select semester', 
                'semester.unique' => 'Semester already exist',

                'subject1name.required' => 'Enter name of the subject',
                'subject1marks.required' => 'Enter marks',
                'subject1marks.numeric' => 'Invalid input',

                
                'subject2name.required' => 'Enter name of the subject',
                'subject2marks.required' => 'Enter marks',
                'subject2marks.numeric' => 'Invalid input',

                
                'subject3name.required' => 'Enter name of the subject',
                'subject3marks.required' => 'Enter marks',
                'subject3marks.numeric' => 'Invalid input',

                
                'subject4name.required' => 'Enter name of the subject',
                'subject4marks.required' => 'Enter marks',
                'subject4marks.numeric' => 'Invalid input',


            ]
            );
            $subject = new Subject;
            $subject->subject_semester = $request->input('semester');

            $subject->subject1_name = $request->input('subject1name');
            $subject->subject1_marks = $request->input('subject1marks');

            $subject->subject2_name = $request->input('subject2name');
            $subject->subject2_marks = $request->input('subject2marks');

            $subject->subject3_name = $request->input('subject3name');
            $subject->subject3_marks = $request->input('subject3marks');

            $subject->subject4_name = $request->input('subject4name');
            $subject->subject4_marks = $request->input('subject4marks');

            $subject->save();
            return redirect('/adminViewSubject')->with('success_msg','Subject inserted successfully...');
    }

    public function adminEditSubject($id){
        $semester = Semester::all();
        $subject = Subject::find($id);
        return view('/Admin/adminEditSubject')->with(['sem'=>$semester,'sub'=>$subject]);
    }

    public function adminUpdateSubject(Request $request){
        $this->validate($request,
            [
                'semester'=>'required',

                'subject1name'=>'required',
                'subject1marks'=>'required|numeric',

                'subject2name'=>'required',
                'subject2marks'=>'required|numeric',

                'subject3name'=>'required',
                'subject3marks'=>'required|numeric',

                'subject4name'=>'required',
                'subject4marks'=>'required|numeric',
                
            ],
            [
                'semester.required' => 'Enter semester', 
                

                'subject1name.required' => 'Enter name of the subject',
                'subject1marks.required' => 'Enter marks',
                'subject1marks.numeric' => 'Invalid input',

                
                'subject2name.required' => 'Enter name of the subject',
                'subject2marks.required' => 'Enter marks',
                'subject2marks.numeric' => 'Invalid input',

                
                'subject3name.required' => 'Enter name of the subject',
                'subject3marks.required' => 'Enter marks',
                'subject3marks.numeric' => 'Invalid input',

                
                'subject4name.required' => 'Enter name of the subject',
                'subject4marks.required' => 'Enter marks',
                'subject4marks.numeric' => 'Invalid input',


            ]
            );

            $updatedsubject = Subject::find($request->input('subject_id'));
            $updatedsubject->subject_semester = $request->input('semester');

            $updatedsubject->subject1_name = $request->input('subject1name');
            $updatedsubject->subject1_marks = $request->input('subject1marks');

            $updatedsubject->subject2_name = $request->input('subject2name');
            $updatedsubject->subject2_marks = $request->input('subject2marks');

            $updatedsubject->subject3_name = $request->input('subject3name');
            $updatedsubject->subject3_marks = $request->input('subject3marks');

            $updatedsubject->subject4_name = $request->input('subject4name');
            $updatedsubject->subject4_marks = $request->input('subject4marks');

            $updatedsubject->save();
            return redirect('/adminViewSubject')->with('success_msg','Subject updated successfully...');

    }

    public function adminDeleteSubject($id){
        $deletesubject = Subject::find($id);
        $deletesubject->delete();
        return redirect('/adminViewSubject')->with('error_msg','Subject deleted successfully...');
    }


/* ======================================= Subject ==================================================================== */



/* ======================================= Teacher ==================================================================== */


    public function adminViewTeacher(){
        $teacher = teacher::paginate(3);
        //echo $teacher;
        //$passwords = Crypt::decrypt($teacher[0]->password);
        return view('/Admin/adminViewTeacher')->with(['teacher'=>$teacher]); 
    }

    public function adminEditTeacherStatus($id){
        $status = teacher::find($id);
        return view('/Admin/adminEditTeacherStatus')->with(['status'=>$status]);
    }

    public function adminUpdateTeacherStatus(Request $request){
        $this->validate($request,
        [
            'status'=>'required',
            
            
        ],
        [
            'status.required' => 'Select any one option from the above field',
            
        ]
        );
        $updatestatus = teacher::find($request->input('id'));
        $updatestatus->status = $request->input('status');
        $updatestatus->save();
        return redirect('/adminViewTeacher')->with('success_msg','Status updated successfully...');
    }

    public function adminDeleteTeacher($id){
        $deleteteacher = teacher::find($id);
        $deleteteacher->delete();
        return redirect('/adminViewTeacher')->with('error_msg','Teacher deleted successfully...');

    }


/* ======================================= Teacher ==================================================================== */


    /* ======================================= Student ==================================================================== */


    public function adminViewStudent(){
        $student = student::paginate(3);
        //echo $teacher;
        //$passwords = Crypt::decrypt($teacher[0]->password);
        return view('/Admin/adminViewStudent')->with(['student'=>$student]); 
    }

    public function adminEditStudentStatus($id){
        $status = student::find($id);
        return view('/Admin/adminEditStudentStatus')->with(['status'=>$status]);
    }

    public function adminUpdateStudentStatus(Request $request){
        $this->validate($request,
            [
                'status'=>'required',
                
                
            ],
            [
                'status.required' => 'Select any one option from the above field',
                
            ]
            );
        $updatestatus = student::find($request->input('id'));
        $updatestatus->status = $request->input('status');
        $updatestatus->save();
        return redirect('/adminViewStudent')->with('success_msg','Status updated successfully...');
    }

    public function adminDeleteStudent($id){
        $deletestudent = student::find($id);
        $deletestudent->delete();
        return redirect('/adminViewStudent')->with('error_msg','Student deleted successfully...');

    }


/* ======================================= Student ==================================================================== */
}
