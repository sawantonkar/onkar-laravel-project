@extends('admindashboard')
@section('adminsection')
<div class="content">
        <main>
          <div class="container-fluid">
            
            
            <div class="row">
              <div class="col-md-4 offset-md-4 my-2">
                <div class="bg-mattBlackLight my-2 p-3">
                @include('messages')
                <form action="/adminUpdateStudentStatus" method="post">
                @csrf
                
                <div class="form-group">
                    <label class="text-info">Current Status of {{$status->firstname}} {{$status->lastname}} is {{$status->status}}</label>
                    <br>
                    <label>Update status:</label>
                    <select name="status" class="form-control">
                        <option value="">-- Select status --</option>
                        <option value="Active">Active</option>
                        <option value="Deactive">Deactive</option>
                    </select>
                    <p class="text-danger">{{$errors->first('status')}}</p>
                </div>
                <input type="hidden" value="{{$status->id}}" name="id">
                <button type="submit" class="btn btn-primary btn-sm">Update status</button>
                </form>
                </div>
              </div>
              
            </div>
          </div>
          
        </main>
      </div>
@endsection