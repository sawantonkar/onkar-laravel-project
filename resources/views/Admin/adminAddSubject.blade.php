@extends('admindashboard')
@section('adminsection')
<div class="content">
        <main>
          <div class="container-fluid">
            
            
            <div class="row">
            
              <div class="col-md-4 offset-md-4 my-2">
                <div class="bg-mattBlackLight my-2 p-3">
                @include('messages')
                <form action="/adminInsertSubject" method="post">
                @csrf

                <div class="form-group">
                <label>Select semester:</label>
                    <select name="semester" class="form-control">
                        <option value="">-- Select semester --</option>
                        @foreach($subsem as $sem)
                        <option value="{{$sem->semester}}">{{$sem->semester}}</option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{$errors->first('semester')}}</p>
                </div>

                <hr class="bg-light my-4">
                <div class="form-group">
                    <label>Subject-1 name:</label>
                    <input type="text" class="form-control" name="subject1name" placeholder="Enter subject" autocomplete="off" value="{{old('subject1name')}}">
                    <p class="text-danger">{{$errors->first('subject1name')}}</p>
                </div>
                <div class="form-group">
                    <label>Subject-1 marks:</label>
                    <input type="text" class="form-control" name="subject1marks" placeholder="Enter marks" autocomplete="off" value="{{old('subject1marks')}}">
                    <p class="text-danger">{{$errors->first('subject1marks')}}</p>
                </div>
                <hr class="bg-light my-4">

                <div class="form-group">
                    <label>Subject-2 name:</label>
                    <input type="text" class="form-control" name="subject2name" placeholder="Enter subject" autocomplete="off" value="{{old('subject2name')}}">
                    <p class="text-danger">{{$errors->first('subject2name')}}</p>
                </div>
                <div class="form-group">
                    <label>Subject-2 marks:</label>
                    <input type="text" class="form-control" name="subject2marks" placeholder="Enter marks" autocomplete="off" value="{{old('subject2marks')}}">
                    <p class="text-danger">{{$errors->first('subject2marks')}}</p>
                </div>
                <hr class="bg-light my-4">

                <div class="form-group">
                    <label>Subject-3 name:</label>
                    <input type="text" class="form-control" name="subject3name" placeholder="Enter subject" autocomplete="off" value="{{old('subject3name')}}">
                    <p class="text-danger">{{$errors->first('subject3name')}}</p>
                </div>
                <div class="form-group">
                    <label>Subject-3 marks:</label>
                    <input type="text" class="form-control" name="subject3marks" placeholder="Enter marks" autocomplete="off" value="{{old('subject3marks')}}">
                    <p class="text-danger">{{$errors->first('subject3marks')}}</p>
                </div>
                <hr class="bg-light my-4">

                <div class="form-group">
                    <label>Subject-4 name:</label>
                    <input type="text" class="form-control" name="subject4name" placeholder="Enter subject" autocomplete="off" value="{{old('subject4name')}}">
                    <p class="text-danger">{{$errors->first('subject4name')}}</p>
                </div>
                <div class="form-group">
                    <label>Subject-4 marks:</label>
                    <input type="text" class="form-control" name="subject4marks" placeholder="Enter marks" autocomplete="off" value="{{old('subject4marks')}}">
                    <p class="text-danger">{{$errors->first('subject4marks')}}</p>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
                
                </form>
                </div>
              </div>
              
            </div>
          </div>
          
        </main>
      </div>
@endsection