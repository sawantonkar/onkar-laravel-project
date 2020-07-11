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
use Session;
use App\Result;


class TeacherController extends Controller
{
//===================================== Teacher profile =============================================================

    public function teacherhome(){
        $teacher_email = Session::get('teacher_email'); 
        $teacher_data = teacher::where('email',$teacher_email)->get();
        $id = $teacher_data[0]->id;
        $teacher = teacher::find($id);
        return view('/Teacher/teacherhome')->with(['teacher'=>$teacher]);
    }

    public function teacherEditProfile($id){
        $teacher_update = teacher::find($id);
        //dd($teacher_update);
        return view('/Teacher/teacherEditProfile')->with(['teach'=>$teacher_update]);
    }

    public function teacherUpdateProfile(Request $request){
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
        $profile = teacher::find($request->input('id'));
        if($profile->profile_pic == 'defaultimg.jpg'){
           if($request->hasfile('profile_pic')){
            $path = public_path().'/images/';
            $file = $request->file('profile_pic');
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
    return redirect('/teacherhome')->with('success_msg','Profile updated successfully.....');
    }

    public function teacherChangePassword($id){
        $teacher = teacher::where('id',$id)->get();
        $pwd = $teacher[0]->password;
        $id1 = $teacher[0]->id;
        return view('/Teacher/teacherChangePassword')->with(['pwd'=>$pwd,'id'=>$id1]);
    }

    public function teacherUpdatePassword(Request $request){
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
        $changepwd = teacher::find($request->input('id'));
        $teacher = teacher::where('id',$request->input('id'))->get();
        
         if(Crypt::decrypt($teacher[0]->password) == $request->input('password')){
            $changepwd->password = Crypt::encrypt($request->input('new_password'));
            $changepwd->save();
            return redirect('/teacherhome')->with('success_msg','Password changed successfully...');
        } else{
            return redirect('/teacherhome')->with('error_msg','Incorrect current password...Try again!!!');
        } 
    }

//===================================== Teacher profile =============================================================






//===================================== Teacher view list of students =============================================================



    public function teacherViewStudent(){
        $student = student::where('semester',Session::get('teacher_semester'))->get();
        return view('/Teacher/teacherViewStudent')->with(['student'=>$student]);
    }

//===================================== Teacher view list of students =============================================================







//===================================== Result ============================================================================

    public function teacherViewResult(){
        
        $result = Result::where('student_semester',Session::get('teacher_semester'))->get();
        $subject_data = Subject::where('subject_semester',Session::get('teacher_semester'))->get();
        $id = $subject_data[0]->id;
        $sub = Subject::find($id); 
        return view('/Teacher/teacherViewResult')->with(['result'=>$result,'sub'=>$sub]); 
        
    }

    public function teacherAddResult(){
        $student = student::where('semester',Session::get('teacher_semester'))->get();
        $subject_data = Subject::where('subject_semester',Session::get('teacher_semester'))->get();
        $id = $subject_data[0]->id;
        $subject = Subject::find($id);
        return view('/Teacher/teacherAddResult')->with(['student'=>$student,'subject'=>$subject]);
    }

    public function teacherInsertResult(Request $request){
        $this->validate($request,
        [
            'student_email'=>'unique:results,student_email',
            'subject1_marks'=>'numeric',
            'subject2_marks'=>'numeric',
            'subject3_marks'=>'numeric',
            'subject4_marks'=>'numeric',
            
        ],
        [
            'student_email.unique' => 'Selected student already exist',
            'subject1_marks.numeric' => 'Invalid input',
            'subject2_marks.numeric' => 'Invalid input',
            'subject3_marks.numeric' => 'Invalid input',
            'subject4_marks.numeric' => 'Invalid input',
            
        ]);
        $student = student::where('email',$request->input('student_email'))->get();
        $student_name = $student[0]->firstname;
        $result = new Result;
        $result->student_email = $request->input('student_email');
        $result->student_semester = $request->input('student_semester');
        $result->subject1_marks = $request->input('subject1_marks');
        $result->subject2_marks = $request->input('subject2_marks');
        $result->subject3_marks = $request->input('subject3_marks');
        $result->subject4_marks = $request->input('subject4_marks');
        $result->total = $request->input('total');
        $result->percentage = $request->input('percentage');
        $result->student_name = $student_name;
        $result->save();
        return redirect('/teacherViewResult')->with('success_msg','Result added successfully...');
    }

    public function teacherEditResult($id1,$id2){
        $result_update = Result::find($id1);
        $subject = Subject::find($id2);
        return view('/Teacher/teacherEditResult')->with(['result'=>$result_update,'subject'=>$subject]);
    }

    public function teacherUpdateResult(Request $request){
        
         $this->validate($request,
        [
           
            'subject1_marks'=>'numeric',
            'subject2_marks'=>'numeric',
            'subject3_marks'=>'numeric',
            'subject4_marks'=>'numeric',
            
        ],
        [
            
            'subject1_marks.numeric' => 'Invalid input',
            'subject2_marks.numeric' => 'Invalid input',
            'subject3_marks.numeric' => 'Invalid input',
            'subject4_marks.numeric' => 'Invalid input',
            
        ]);

        $result = Result::find($request->input('id'));
        $result->student_email = $request->input('student_email');
        $result->student_semester = $request->input('student_semester');
        $result->student_name = $request->input('student_name');
        $result->subject1_marks = $request->input('subject1_marks');
        $result->subject2_marks = $request->input('subject2_marks');
        $result->subject3_marks = $request->input('subject3_marks');
        $result->subject4_marks = $request->input('subject4_marks');
        $result->total = $request->input('total');
        $result->percentage = $request->input('percentage');
        $result->save();
        return redirect('/teacherViewResult')->with('success_msg','Result updated successfully...'); 
    
        }

        public function teacherDeleteResult($id){
            $delete_result = Result::find($id);
            $delete_result->delete();
            return redirect('/teacherViewResult')->with('error_msg','Result deleted successfully...');
        }


    
//===================================== Result ===============================================================================

}
