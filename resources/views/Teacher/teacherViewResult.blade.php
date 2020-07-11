@extends('teacherdashboard')
@section('teachersection')
<div class="content">
        <main>
          <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                <div class="bg-mattBlackLight my-2 p-3 text-right">
                  <a href="/teacherAddResult"><button class="btn btn-primary">Add result</button></a>
                  
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
                                <th scope="col">Sr no.</th>
                                <th scope="col">Student name</th>
                                <th scope="col">{{$sub->subject1_name}}</th>
                                <th scope="col">{{$sub->subject2_name}}</th>
                                <th scope="col">{{$sub->subject3_name}}</th>
                                <th scope="col">{{$sub->subject4_name}}</th>
                                <th scope="col">Total</th>
                                <th scope="col">Percentage</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($result as $key=>$res)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td class="text-capitalize">{{$res->student_name}}</td>
                                <td>{{$res->subject1_marks}} / {{$sub->subject1_marks}}</td>
                                <td>{{$res->subject2_marks}} / {{$sub->subject2_marks}}</td>
                                <td>{{$res->subject3_marks}} / {{$sub->subject3_marks}}</td>
                                <td>{{$res->subject4_marks}} / {{$sub->subject4_marks}}</td>
                                <td>{{$res->total}}</td>
                                <td>{{$res->percentage}} %</td>
                                <td>
                                  <a href="/teacherEditResult/{{$res->id}}/{{$sub->id}}"><button class="btn btn-warning btn-sm">Edit</button></a>
                                </td>
                                <td>
                                  <a href="/teacherDeleteResult/{{$res->id}}"><button class="btn btn-danger btn-sm">Delete</button></a>
                                </td>
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