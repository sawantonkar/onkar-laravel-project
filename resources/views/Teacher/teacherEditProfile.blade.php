@extends('teacherdashboard')
@section('teachersection')
<div class="content">
        <main>
          <div class="container-fluid">
            
            
            <div class="row">
              <div class="col-md-4 offset-md-4 my-2">
                <div class="bg-mattBlackLight my-2 p-3">
                @include('messages')
                <form action="/teacherUpdateProfile" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control text-capitalize" name="firstname" placeholder="Firstname" autocomplete="off" value="{{$teach->firstname}}">
                    <p class="text-danger">{{$errors->first('firstname')}}</p>
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control text-capitalize" name="lastname" placeholder="Lastname" autocomplete="off" value="{{$teach->lastname}}">
                    <p class="text-danger">{{$errors->first('lastname')}}</p>
                </div>
                <div class="form-group">
                    <label>Current profile pic :</label>
                    <img src="/images/{{$teach->profile_pic}}" width="100" height="100">
                    <label>Update profile pic</label>
                    <input type="file" class="form-control" name="profile_pic">
                    
                </div>
                <input type="hidden" value="{{$teach->id}}" name="id">
                <button type="submit" class="btn btn-primary">Update profile</button>
                </form>
                </div>
              </div>
              
            </div>
          </div>
          
        </main>
      </div>
@endsection