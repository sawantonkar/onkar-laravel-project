@extends('admindashboard')
@section('adminsection')
<div class="content">
        <main>
          <div class="container-fluid">

            <div class="row">
              <div class="col-md-12">
                <div class="bg-mattBlackLight my-2 p-3 text-right">
                  <a href="/adminAddSubject"><button class="btn btn-primary">Add subject</button></a>
                </div>
                @include('messages')
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="bg-mattBlackLight my-2 p-3 text-right">
                <table class="table table-striped table-dark text-center table-responsive-xl table-bordered table-sm">
                  <thead class="bg-info">
                    <tr>
                      <th scope="col">Subject semester</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Marks</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Marks</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Marks</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Marks</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                  </thead>
                  <tbody>
                  @foreach($subjects as $sub)
                    <tr>
                      <td>{{$sub->subject_semester}}</td>
                      <td>{{$sub->subject1_name}}</td>
                      <td>{{$sub->subject1_marks}}</td>
                      <td>{{$sub->subject2_name}}</td>
                      <td>{{$sub->subject2_marks}}</td>
                      <td>{{$sub->subject3_name}}</td>
                      <td>{{$sub->subject3_marks}}</td>
                      <td>{{$sub->subject4_name}}</td>
                      <td>{{$sub->subject4_marks}}</td>
                      <td>
                        <a href="/adminEditSubject/{{$sub->id}}"><button class="btn btn-warning btn-sm">Edit</button></a>
                      </td>
                      <td>
                      <a href="/adminDeleteSubject/{{$sub->id}}"><button class="btn btn-danger btn-sm">Delete</button></a>
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