@extends('admindashboard')
@section('adminsection')
<div class="content">
        <main>
          <div class="container-fluid">
            
            <div class="row">
              <div class="col-md-12">
                <div class="bg-mattBlackLight my-2 p-3">
                  <h3>Student registration details :</h3>
                </div>
                @include('messages')
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="bg-mattBlackLight my-2 p-3">
                <table class="table table-striped table-dark table-responsive-xl table-sm table-bordered text-center">
                  <thead class="bg-info">
                    <tr>
                      <th scope="col">Sr no.</th>
                      <th scope="col">Profile pic</th>
                      <th scope="col">Semester</th>
                      <th scope="col">First name</th>
                      <th scope="col">Last name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Status</th>
                      <th scope="col">Update status</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($student as $key=>$stud)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td><img src="/images/{{$stud->profile_pic}}" height="100" width="100"></td>
                      <td>{{$stud->semester}}</td>
                      <td class="text-capitalize">{{$stud->firstname}}</td>
                      <td class="text-capitalize">{{$stud->lastname}}</td>
                      <td>{{$stud->email}}</td>   
                      <td>{{$stud->status}}</td>
                      <td>
                        <a href="/adminEditStudentStatus/{{$stud->id}}"><button class="btn btn-warning btn-sm">Update</button></a>
                      </td>
                      <td>
                      <a href="/adminDeleteStudent/{{$stud->id}}"><button class="btn btn-danger btn-sm">Delete</button></a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {{$student->links()}}
                </div>
              </div>
              
            </div>
          </div>
        </main>
      </div>
@endsection