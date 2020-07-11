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
                                <th scope="col">Sr no.</th>
                                <th scope="col">Profile pic</th>
                                <th scope="col">Semester</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Email Id</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($student as $key=>$stud)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="/images/{{$stud->profile_pic}}" height="120" width="120"></td>
                                <td>{{$stud->semester}}</td>
                                <td class="text-capitalize">{{$stud->firstname}}</td>
                                <td class="text-capitalize">{{$stud->lastname}}</td>
                                <td>{{$stud->email}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
            
          </div>
        </main>
 </div>
@endsection