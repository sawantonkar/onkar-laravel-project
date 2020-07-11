@extends('admindashboard')
@section('adminsection')
<div class="content">
        <main>
          <div class="container-fluid">
            
            
            <div class="row">
              <div class="col-md-4 offset-md-4 my-2">
                <div class="bg-mattBlackLight my-2 p-3 shadow">
                @include('messages')
                <form action="/adminInsertSemester" method="post">
                @csrf
                
                <div class="form-group">
                    <label>Semester</label>
                    <input type="text" class="form-control" name="sem" placeholder="Enter numeric value" autocomplete="off" value="{{old('sem')}}">
                    <p class="text-danger">{{$errors->first('sem')}}</p>
                </div>
                
                <button type="submit" class="btn btn-primary">Add semester</button>
                </form>
                </div>
              </div>
              
            </div>
          </div>
          
        </main>
      </div>
@endsection