<!doctype html>
<html>
<meta name="env" content="{{ App::environment() }}">
<!--meta name="token" content="{{ Session::token() }}"-->
<head><title>Document</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="style.css"></head>
<body>
<div class = 'container'>
<section class = 'jumbotron'>

<p class = "title">{!! $title !!}</p>
{!! Form::open(['route' => 'sessions.store']) !!}

<div class="controls">
{!!Form::text('username','',array('id'=>'usernametxt','class'=>'form-control span6','placeholder' => 'Please Enter your Username')) !!}
<p class="errors">{{$errors->first('username')}}</p>
</div>
<div class="controls">
{!! Form::password('password',array('id'=>'passwordtxt','class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
<p class="errors">{{$errors->first('password')}}</p>
</div>
<p>{!! Form::submit('Login', array('id'=>'loginbutton','class'=>'send-btn')) !!}</p>
{!! Form::close()!!}
<a id = "logoutbutton" href="{{ URL::to('logout') }}">Logout</a>
<a id = "registerbutton" href = "#" data-toggle="modal" data-target="#myModalNorm">
    Register
</a>
</section>
<section class = 'nav'>
<ul class="nav nav-tabs" id="myTab">
			  <li class="active"><a data-target="#home" data-toggle="tab">Home</a></li>
			  <li><a data-target="#notation" data-toggle="tab">Notation</a></li>
			  <li><a data-target="#recurrence" data-toggle="tab">Recurrence relation</a></li>
			  <li><a href="#induction" data-target="#mathinduction" data-toggle="tab" name ="induction">Mathematical Induction</a></li>
			  <li><a data-target="#test" data-toggle="tab" name = "test">Test Yourself</a></li>
			  <li><a data-target="#review" data-toggle="tab">Review </a></li>
</ul>


</section>

<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span id = "closeicon" aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Register
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                {!! Form::open(['route' => 'register']) !!}
<div class = "form-group">
	<div id ="inputdiv">{!! Form::label('firstname','Firstname: ') !!}{!! Form::text('first_name',"",['class' => 'form-control']) !!}</div>
	<div id ="inputdiv">{!! Form::label('lastname', 'Lastname: ') !!}{!! Form::text('last_name',"",['class' => 'form-control']) !!}</div>
	<div id ="inputdiv">{!! Form::label('username','Username: ') !!}{!! Form::text('username',"",['class' => 'form-control']) !!}</div>
	<div id ="inputdiv">{!! Form::label('password', 'Password: ') !!}{!! Form::text('password',"",['class' => 'form-control']) !!}</div>

</div>
</div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">

				<div class = "form-group">
        <td id = "buttons">
				{!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
<br />
			  {!! Form::submit('Close', ['class' => 'btn btn-primary form-control']) !!}
        </td>
{!! Form::close() !!}
				</div>
				
            </div>
        </div>
    </div>
</div>
<!-- Post Info -->
<div id = "Home">

<h3>Welcome to Algorithmaths<h3 class = 'AuthUser'>@if (Session::has('flash_message')) {{Session::get('flash_message')}}@endif</h3></h3>
<p>{!! $text !!}</p>
</div>
<div id = "Notation">
</div>
<div id = "Recurrence">
Enter values into the quadratic recurrence relation below. Attempt working out the sequence by yourself first before continuing as you 
will be asked to enter the sequence once you submit. 
<table id ='recTable'>
  <tr>
    <td>
	<label>U(n) = </label></td>
    <td><input type = "text" id = "firstnumber" class ="numberInput"  readonly="true" value = "1"></input></td>
	<td><label>U(n) +</label></td>
	<td><input type = "text" id = "secondnumber" class ="numberInput"></input></td>
	<td><label>n +</label></td>
	<td><input type = "text" id = "thirdnumber" class ="numberInput"></input></td>
  </tr>
  <tr>
    <td><label>U(1) =</label></td>
    <td><input type = "text" id = "initialnumber" class ="numberInput"></input></td> 
	<td></td>
	<td></td>
	<td></td>
  </tr>

</table>
<div id = "buttonsarea">
 <button id = "recsubmit">Submit</button>
 <button id ='findDiff'>Find Difference</button>
 </div>
 <div class='row'>
 <div class = 'col-md-4'></div>
 <div class ='col-md-4'>
<div class = "result"></div>
<div id = "findDifference"></div>
<div id = "closedFormArea"></div>
</div>
<div class ='col-md-4'>

</div>
</div>

</div>
<div id = "MathInduction">

<table class = "inductionTable">
  <tr><td id='step1'></td><td id ='step1Eq'></td><td></td></tr>
  <tr><td id ='step2'></td><td id ='step2Eq'></td><td></td></tr>
  <tr><td id ='step3'></td><td id ='step3Eq'></td><td></td></tr>
</table>

</div>
<div id = "Test">

<div id = "testHeader">Test yourself</div>

<button id = "start">Start the test</button>
<div id ="questions">Test has started

<div class="col-offset-6 centered">


</div>

</div>

</div>
<div id = "Review">
</div>

</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet' type='text/css'>
<script src="jquery.js"></script>


</body>


</html>
