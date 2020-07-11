<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Register</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
		color: #fff;
		background-image: url("images/college3.jpg");
		background-repeat:no-repeat;
		background-size:cover;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
		
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
		
		
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}
	.tex{
		color:red;
	}
	.u{
		text-transform:capitalize;
	}
	.s{
		font-size:11px;
	}
	.r{
		color:white !important;
		text-decoration:none !important;
	}
	  
</style>
</head>
<body>

<div class="signup-form">

    <form action="register" method="post">
	@csrf
		<h2>Register</h2>
		<p class="hint-text">Create your account.</p>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control u" name="first_name" placeholder="First Name" value="{{old('first_name')}}"></div>
				<div class="col-xs-6"><input type="text" class="form-control u" name="last_name" placeholder="Last Name" value="{{old('last_name')}}"></div>
				<div class="col-xs-6"><p class="tex font-weight-bold">{{$errors->first('first_name')}}</p></div>
				<div class="col-xs-6"><p class="tex font-weight-bold">{{$errors->first('last_name')}}</p></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
			<p class="tex font-weight-bold">{{$errors->first('email')}}</p>
        </div>
		
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
			<p class="tex font-weight-bold">{{$errors->first('password')}}</p>
        </div>
		
        <div class="form-group">
			<label>Register as:</label>
        	<select  class="form-control" name="profession" value="{{old('profession')}}">
				<option value="">-- Select any one --</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>
			<p class="tex font-weight-bold">{{$errors->first('profession')}}</p>
        </div>
		<div class="form-group">
			<label>Select semester:</label>
        	<select  class="form-control" name="semester" value="{{old('semester')}}">
				<option value="">-- Select semester --</option>
                <option value="1">SEMESTER-I</option>
                <option value="2">SEMESTER-II</option>
				<option value="3">SEMESTER-III</option>
				<option value="4">SEMESTER-IV</option>
				<option value="5">SEMESTER-V</option>
				<option value="6">SEMESTER-VI</option>
				<option value="7">SEMESTER-VII</option>
				<option value="8">SEMESTER-VIII</option>
            </select>
			<p class="tex font-weight-bold">{{$errors->first('semester')}}</p>
        </div>
		     
        <input type="hidden" name="profile_pic" value="defaultimg.jpg">
		<input type="hidden" name="status" value="Deactive">
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
		<h2 class="s">Already have an account?</h2>
		<div class="form-group">
           <a href="/login" class="btn btn-primary btn-lg btn-block r">Login</a>
		</div>
    </form>
	
</div>
</body>
</html>                            