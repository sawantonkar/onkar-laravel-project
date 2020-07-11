@extends('admindashboard')
@section('adminsection')
<div class="content">
        <main>
          <div class="container-fluid">
            
            <div class="row">
              <div class="col-md-12">
                
                <div class="bg-mattBlackLight my-2 p-3 text-right bg-dark">
                <a href="/adminAddSemester"><button  class="btn btn-primary m-1">Add semester</button></a>
                </div>
                @include('messages')
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="bg-mattBlackLight my-2 p-3">
                  <table class="table table-striped table-dark text-center table-sm table-bordered">
                    <thead class="bg-info">
                      <tr>

                        <th scope="col">Semester</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($semesters as $sem)
                      <tr>
                        <th scope="row">{{$sem->semester}}</th>
                        <td>
                        <a href="/adminEditSemester/{{$sem->id}}"><button class="btn btn-warning btn-sm">Edit</button></a>
                        </td>
                        <td>
                        <a href="/adminDeleteSemester/{{$sem->id}}"><button class="btn btn-danger btn-sm">Delete</button></a>
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