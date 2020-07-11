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

class StudentController extends Controller
{
    public function studenthome(){
        $student_email = Session::get('student_email'); 
        $student_data = student::where('email',$student_email)->get();
        $id = $student_data[0]->id;
        $student = student::find($id);
        return view('/Student/studenthome')->with(['student'=>$student]);
    }

    public function studentEditProfile($id){
        $student_update = student::find($id);
        //dd($teacher_update);
        return view('/Student/studentEditProfile')->with(['stud'=>$student_update]);
    }

    public function studentUpdateProfile(Request $request){
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
        $profile = student::find($request->input('id'));
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
    return redirect('/studenthome')->with('success_msg','Profile updated successfully.....');
    }

    public function studentChangePassword($id){
        $student = student::where('id',$id)->get();
        $pwd = $student[0]->password;
        $id1 = $student[0]->id;
        return view('/Student/studentChangePassword')->with(['pwd'=>$pwd,'id'=>$id1]);
    }

    public function studentUpdatePassword(Request $request){
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
        $changepwd = student::find($request->input('id'));
        $student = student::where('id',$request->input('id'))->get();
        
         if(Crypt::decrypt($student[0]->password) == $request->input('password')){
            $changepwd->password = Crypt::encrypt($request->input('new_password'));
            $changepwd->save();
            return redirect('/studenthome')->with('success_msg','Password changed successfully...');
        } else{
            return redirect('/studenthome')->with('error_msg','Incorrect current password...Try again!!!');
        } 
    }

    public function studentViewResult(){
        $result = Result::where('student_email',Session::get('student_email'))->get();
        $subject = Subject::where('subject_semester',Session::get('student_semester'))->get();
        $res = Result::find($result[0]->id);
        $sub = Subject::find($subject[0]->id);
        return view('Student/studentViewResult')->with(['result'=>$res,'subject'=>$sub]);
    }

}
