@extends('admindashboard')
@section('adminsection')
<div class="content">
        <main>
          <div class="container-fluid">
            
            
            <div class="row">
            
              <div class="col-md-4 offset-md-4 my-2">
                <div class="bg-mattBlackLight my-2 p-3">
                @include('messages')
                <form action="/adminUpdateSubject" method="post">
                @csrf

                <div class="form-group">
                <label>Select semester:</label>
                    <select name="semester" class="form-control">
                        @foreach($sem as $sems)
                        <option value="{{$sems->semester}}" @if($sub->subject_semester == $sems->semester) selected @endif>{{$sems->semester}}</option>
                        @endforeach
                    </select>
                    <p class="text-danger"></p>
                </div>

                <hr class="bg-light my-4">
                <div class="form-group">
                    <label>Subject-1 name:</label>
                    <input type="text" class="form-control" name="subject1name" placeholder="Enter subject" autocomplete="off" value="{{$sub->subject1_name}}">
                    <p class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Subject-1 marks:</label>
                    <input type="text" class="form-control" name="subject1marks" placeholder="Enter marks" autocomplete="off" value="{{$sub->subject1_marks}}">
                    <p class="text-danger"></p>
                </div>
                <hr class="bg-light my-4">

                <div class="form-group">
                    <label>Subject-2 name:</label>
                    <input type="text" class="form-control" name="subject2name" placeholder="Enter subject" autocomplete="off" value="{{$sub->subject2_name}}">
                    <p class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Subject-2 marks:</label>
                    <input type="text" class="form-control" name="subject2marks" placeholder="Enter marks" autocomplete="off" value="{{$sub->subject2_marks}}">
                    <p class="text-danger"></p>
                </div>
                <hr class="bg-light my-4">

                <div class="form-group">
                    <label>Subject-3 name:</label>
                    <input type="text" class="form-control" name="subject3name" placeholder="Enter subject" autocomplete="off" value="{{$sub->subject3_name}}">
                    <p class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Subject-3 marks:</label>
                    <input type="text" class="form-control" name="subject3marks" placeholder="Enter marks" autocomplete="off" value="{{$sub->subject3_marks}}">
                    <p class="text-danger"></p>
                </div>
                <hr class="bg-light my-4">

                <div class="form-group">
                    <label>Subject-4 name:</label>
                    <input type="text" class="form-control" name="subject4name" placeholder="Enter subject" autocomplete="off" value="{{$sub->subject4_name}}">
                    <p class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Subject-4 marks:</label>
                    <input type="text" class="form-control" name="subject4marks" placeholder="Enter marks" autocomplete="off" value="{{$sub->subject4_marks}}">
                    <p class="text-danger"></p>
                </div>
                <input type="hidden" value="{{$sub->id}}" name="subject_id">
                <button type="submit" class="btn btn-success">Submit</button>
                
                </form>
                </div>
              </div>
              
            </div>
          </div>
          
        </main>
      </div>
@endsection