@extends('admindashboard')
@section('adminsection')
<div class="content">
        <main>
          <div class="container-fluid">
            
            
            <div class="row">
              <div class="col-md-4 offset-md-4 my-2">
                <div class="bg-mattBlackLight my-2 p-3">
                @include('messages')
                <form action="/adminUpdatePassword" method="post">
                @csrf
                
                <div class="form-group">
                    <label>Current Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter current password" autocomplete="off">
                    <p class="text-danger">{{$errors->first('password')}}</p>
                </div>
                <div class="form-group">
                    <label>New Password:</label>
                    <input type="password" class="form-control" name="new_password" placeholder="Enter new password" autocomplete="off">
                    <p class="text-danger">{{$errors->first('new_password')}}</p>
                </div>
                <input type="hidden" value="{{$id}}" name="id">
                <button type="submit" class="btn btn-primary">Update password</button>
                </form>
                </div>
              </div>
              
            </div>
          </div>
          
        </main>
      </div>
@endsection