@extends('teacherdashboard')
@section('teachersection')
<div class="content">
        <main>
          <div class="container-fluid">
          <form action="/teacherUpdateResult" method="post" onsubmit="return validation()">
          @csrf
          <div class="row">
              <div class="col-md-4 offset-md-4">
                <div class="bg-mattBlackLight my-2 p-3 text-center">
                <div class="form-group">
                    <h3>Edit marks of <strong class="text-capitalize text-info">{{$result->student_name}}</strong></h3>
                </div>
                </div>
                
              </div>
              
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-mattBlackLight my-2 p-3">
                        @include('messages')
                        <table class="table table-striped table-dark table-responsive-xl text-center table-bordered table-sm">
                        <thead class="bg-info">
                            <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Total marks</th>
                            <th scope="col">Obtained marks</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$subject->subject1_name}}</td>
                                <td id="totalmarks1">{{$subject->subject1_marks}}</td>
                                <td>
                                    <input type="text" name="subject1_marks" placeholder="Enter marks" id="gainedmarks1" autocomplete="off" value="{{$result->subject1_marks}}"><br>
                                    <span id="error1" class="text-danger font-weight-bold"></span>
                                    <p class="text-danger">{{$errors->first('subject1_marks')}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>{{$subject->subject2_name}}</td>
                                <td id="totalmarks2">{{$subject->subject2_marks}}</td>
                                <td>
                                    <input type="text" name="subject2_marks" placeholder="Enter marks" id="gainedmarks2" autocomplete="off" value="{{$result->subject2_marks}}"><br>
                                    <span id="error2" class="text-danger font-weight-bold"></span>
                                    <p class="text-danger">{{$errors->first('subject2_marks')}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>{{$subject->subject3_name}}</td>
                                <td id="totalmarks3">{{$subject->subject3_marks}}</td>
                                <td>
                                    <input type="text" name="subject3_marks" placeholder="Enter marks" id="gainedmarks3" autocomplete="off" value="{{$result->subject3_marks}}"><br>
                                    <span id="error3" class="text-danger font-weight-bold"></span>
                                    <p class="text-danger">{{$errors->first('subject3_marks')}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>{{$subject->subject4_name}}</td>
                                <td id="totalmarks4">{{$subject->subject4_marks}}</td>
                                
                                <td>
                                    <input type="text" name="subject4_marks" placeholder="Enter marks" id="gainedmarks4" autocomplete="off" value="{{$result->subject4_marks}}"><br>
                                    <span id="error4" class="text-danger font-weight-bold"></span>
                                    <p class="text-danger">{{$errors->first('subject4_marks')}}</p>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-2 offset-md-5">
                <div class="bg-mattBlackLight my-2 p-3 text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                
              </div>
              
            </div>
            <input type="hidden" name="total" id="gainedtotal">
            <input type="hidden" name="percentage" id="percentage">
            <input type="hidden" name="student_semester" value="{{$result->student_semester}}">
            <input type="hidden" name="student_email" value="{{$result->student_email}}">
            <input type="hidden" name="student_name" value="{{$result->student_name}}">
            <input type="hidden" name="id" value="{{$result->id}}">
            </form>
          </div>
        </main>
 </div>
@endsection
@section('marksvalidation')

<script>
    function validation(){
    //alert(1);
    var totalmarks1 = parseInt(document.getElementById('totalmarks1').innerHTML);
    var gainedmarks1 = parseInt(document.getElementById('gainedmarks1').value);
    
    var totalmarks2 = parseInt(document.getElementById('totalmarks2').innerHTML);
    var gainedmarks2 = parseInt(document.getElementById('gainedmarks2').value);

    var totalmarks3 = parseInt(document.getElementById('totalmarks3').innerHTML);
    var gainedmarks3 = parseInt(document.getElementById('gainedmarks3').value);

    var totalmarks4 = parseInt(document.getElementById('totalmarks4').innerHTML);
    var gainedmarks4 = parseInt(document.getElementById('gainedmarks4').value);

    var gm1 = document.getElementById('gainedmarks1').value;
    var gm2 = document.getElementById('gainedmarks2').value;
    var gm3 = document.getElementById('gainedmarks3').value;
    var gm4 = document.getElementById('gainedmarks4').value;
    
    //var student = document.getElementById('stu').value;
    

    //gained marks should be less than total marks
    if(gm1 == ''){
      document.getElementById('error1').innerHTML = '**Enter marks here**';
      return false;
    }else{
      document.getElementById('error1').innerHTML = '';
    }

    if((gainedmarks1 > totalmarks1)){
      document.getElementById('error1').innerHTML = '**Gained marks should be less than total marks**';
      return false;
    }
    else{
      document.getElementById('error1').innerHTML = ' ';
    }

    if(gm2 == ''){
      document.getElementById('error2').innerHTML = '**Enter marks here**';
      return false;
    }else{
      document.getElementById('error2').innerHTML = '';
    }


    if(gainedmarks2 > totalmarks2){
      document.getElementById('error2').innerHTML = '**Gained marks should be less than total marks**';
      return false;
    }
    else{
      document.getElementById('error2').innerHTML = ' ';
    }


    if(gm3 == ''){
      document.getElementById('error3').innerHTML = '**Enter marks here**';
      return false;
    }else{
      document.getElementById('error3').innerHTML = '';
    }

    if(gainedmarks3 > totalmarks3){
      document.getElementById('error3').innerHTML = '**Gained marks should be less than total marks**';
      return false;
    }
    else{
      document.getElementById('error3').innerHTML = ' ';
    }


    if(gm4 == ''){
      document.getElementById('error4').innerHTML = '**Enter marks here**';
      return false;
    }else{
      document.getElementById('error4').innerHTML = '';
    }


    if(gainedmarks4 > totalmarks4){
      document.getElementById('error4').innerHTML = '**Gained marks should be less than total marks**';
      return false;
    }
    else{
      document.getElementById('error4').innerHTML = ' ';
    }

    var total = totalmarks1 + totalmarks2 + totalmarks3 + totalmarks4 ;
    //alert(total);
    
    var gainedmarks = gainedmarks1 + gainedmarks2 + gainedmarks3 + gainedmarks4;
    //alert(gainedmarks);

    var percentage = (gainedmarks/total)*100;
    //alert(percentage);

    document.getElementById('gainedtotal').value = gainedmarks;
    document.getElementById('percentage').value = percentage.toFixed(2);
    
    
  }
</script>
@endsection