<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\teacher;
use App\student;
use Crypt;
use Session;

class RegisterLoginController extends Controller
{
    public function register(Request $request)
    {   
        $this->validate($request,
            [
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'profession'=>'required',
                'semester'=>'required'
                
                
            ],
            [
                'first_name.required' => 'Enter your firstname',
                'last_name.required' => 'Enter your lastname',
                'email.required' => 'Enter your email',
                'email.email' => 'Not a valid email-id',
                'password.required' => 'Enter your password',
                'profession.required' => 'This field is required',
                'semester.required' => 'Select your semester',
            ]
            
            );

            
          

             $profession = $request->input('profession');
            //echo $profession;
            if($profession == 'teacher'){
                $this->validate($request,
            [
                
                'semester' => 'unique:teachers,semester'
            ],
            [
                'semester.unique' => 'Selected semester already exist'
            ]
            
            );
            $teacher = new teacher;
            $teacher->firstname = $request->input('first_name');
            $teacher->lastname = $request->input('last_name');
            $teacher->email = $request->input('email');
            $teacher->password = Crypt::encrypt($request->input('password'));
            $teacher->profession = $request->input('profession');
            $teacher->semester = $request->input('semester');
            $teacher->profile_pic = $request->input('profile_pic');
            $teacher->status = $request->input('status');
            $teacher->save();
            return redirect('/login')->with('success_msg','Registered successfully...');

            }else{

                $student = new student;
                $student->firstname = $request->input('first_name');
                $student->lastname = $request->input('last_name');
                $student->email = $request->input('email');
                $student->password = Crypt::encrypt($request->input('password'));
                $student->profession = $request->input('profession');
                $student->semester = $request->input('semester');
                $student->profile_pic = $request->input('profile_pic');
                $student->status = $request->input('status');
                $student->save();
                return redirect('/login')->with('success_msg','Registered successfully...');

            }
 

    }


    public function login(Request $request){

        $this->validate($request,
        [
            
            'email'=>'required|email',
            'password'=>'required',
            'profession' => 'required'
            
            
            
        ],
        [
            
            'email.required' => 'Enter your email',
            'email.email' => 'Not a valid email-id',
            'password.required' => 'Enter your password',
            'profession.required' => 'Select any one from the above field',
        ]
        
        );

        $profession = $request->input('profession');
        if($profession == 'admin'){
            $count = admin::where('email',$request->input('email'))->where('password',$request->input('password'))->count();
            if($count == 1){
                $admin = admin::where('email',$request->input('email'))->get();
                if( (($admin[0]->email)==$request->input('email')) && ( ($admin[0]->password)==$request->input('password') ) ){
                    $request->session()->put('admin',$admin[0]->firstname);
                    return redirect('/adminhome');
                }else{}
            }else{
                return redirect('/login')->with('error_msg','Email or password do not match');
            };
             
        }elseif($profession == 'teacher'){
            
            $access_count = teacher::where('email',$request->input('email'))->where('status','Active')->count();
            $credential_count = teacher::where('email',$request->input('email'))->count();
            $credential = teacher::where('email',$request->input('email'))->get();

            if($credential_count == 1  && Crypt::decrypt($credential[0]->password)==$request->input('password')){
                        if($access_count == 1){
                            
                                $request->session()->put('teacher_firstname',$credential[0]->firstname);
                                $request->session()->put('teacher_semester',$credential[0]->semester);
                                $request->session()->put('teacher_email',$credential[0]->email);
                                return redirect('/teacherhome');
                            }else{
                                return redirect('/login')->with('error_msg','Admin have not granted you an access to the requested page');
                            }
            }else{
                return redirect('/login')->with('error_msg','Email or password do not match');
            } 
           // echo $credential_count;
            
           
        }else{
            $access_count = student::where('email',$request->input('email'))->where('status','Active')->count();
            $credential_count = student::where('email',$request->input('email'))->count();
            $credential = student::where('email',$request->input('email'))->get();

            if($credential_count == 1  && Crypt::decrypt($credential[0]->password) == $request->input('password')){
                        if($access_count == 1){
                            
                                $request->session()->put('student_firstname',$credential[0]->firstname);
                                $request->session()->put('student_semester',$credential[0]->semester);
                                $request->session()->put('student_email',$credential[0]->email);
                                return redirect('/studenthome');
                            }else{
                                return redirect('/login')->with('error_msg','Admin have not granted you an access to the requested page');
                            }
            }else{
                return redirect('/login')->with('error_msg','Email or password do not match');
            }

        }

        
    }

    public function logout(){
        Session::flush();
        return redirect('/login');
    }
}
