@extends('teacherdashboard')
@section('teachersection')
<div class="content">
        <main>
          <div class="container-fluid">
            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-mattBlackLight my-2 p-3">
                        @include('messages')
                        <table class="table table-bordered table-dark text-center table-sm table-responsive-xl">
                            <thead class="bg-info">
                                <tr>
                                <th scope="col">Profile pic</th>
                                <th scope="col">Semester</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Email Id</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                              <tr>
                                <td><img src="/images/{{$teacher->profile_pic}}" height="120" width="120"></td>
                                <td>{{$teacher->semester}}</td>
                                <td class="text-capitalize">{{$teacher->firstname}}</td>
                                <td class="text-capitalize">{{$teacher->lastname}}</td>
                                <td>{{$teacher->email}}</td>
                              </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="bg-mattBlackLight my-2 p-3 text-center">
                  <a href="/teacherEditProfile/{{$teacher->id}}"><button class="btn btn-warning">Edit profile</button></a>
                  <a href="/teacherChangePassword/{{$teacher->id}}"><button class="btn btn-danger">Change password</button></a>
                </div>
                
              </div>
              
            </div>
            
          </div>
        </main>
 </div>
@endsection