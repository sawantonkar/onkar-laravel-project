@extends('studentdashboard')
@section('studentsection')
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
                                <th scope="col">{{$subject->subject1_name}}</th>
                                <th scope="col">{{$subject->subject2_name}}</th>
                                <th scope="col">{{$subject->subject3_name}}</th>
                                <th scope="col">{{$subject->subject4_name}}</th>
                                <th scope="col">Total</th>
                                <th scope="col">Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                              <tr>
                                <td>{{$result->subject1_marks}} / {{$subject->subject1_marks}}</td>
                                <td>{{$result->subject2_marks}} / {{$subject->subject2_marks}}</td>
                                <td>{{$result->subject3_marks}} / {{$subject->subject3_marks}}</td>
                                <td>{{$result->subject4_marks}} / {{$subject->subject4_marks}}</td>
                                <td>{{$result->total}}</td>
                                <td>{{$result->percentage}} %</td>
                              </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
            
          </div>
        </main>
 </div>
@endsection