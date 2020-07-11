@extends('admindashboard')
@section('adminsection')
<div class="content">
        <main>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 my-3">
                <div class="bg-mattBlackLight gb1 px-3 py-4">
                  <h4 class="mb-2">Total teachers : {{$teacher}}</h4>
                  
                </div>
              </div>
              <div class="col-md-3 my-3">
                <div class="bg-mattBlackLight gb2 px-3 py-4">
                  <h4 class="mb-2">Active teachers : {{$activeTeacher}}</h4>
                  
                </div>
              </div>
              <div class="col-md-3 my-3">
                <div class="bg-mattBlackLight gb3 px-3 py-4">
                  <h4 class="mb-2">Total students : {{$student}}</h4>
                  
                </div>
              </div>
              <div class="col-md-3 my-3">
                <div class="bg-mattBlackLight gb4 p-4">
                  <h4 class="mb-2">Active students : {{$activeStudent}}</h4>
                  
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="bg-mattBlackLight my-2 p-3">
                @include('messages')
                <table class="table table-bordered table-dark text-center table-sm table-responsive-xl">
                  <thead class="bg-info">
                    <tr>
                      <th scope="col">Profile pic</th>
                      <th scope="col">First name</th>
                      <th scope="col">Last name</th>
                      <th scope="col">Email Id</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($admin as $adm)
                    <tr>
                      <td><img src="/images/{{$adm->profile_pic}}" height="120" width="120"></td>
                      <td>{{$adm->firstname}}</td>
                      <td>{{$adm->lastname}}</td>
                      <td>{{$adm->email}}</td>
                    </tr>
                    
                  </tbody>
                </table>
                </div>
                
              </div>
              
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="bg-mattBlackLight my-2 p-3 text-center">
                  <a href="/adminProfileEdit/{{$adm->id}}"><button class="btn btn-warning">Edit profile</button></a>
                  <a href="/adminChangePassword/{{$adm->id}}"><button class="btn btn-danger">Change password</button></a>
                </div>
                @endforeach
              </div>
              
            </div>
            
          </div>
        </main>
 </div>
@endsection