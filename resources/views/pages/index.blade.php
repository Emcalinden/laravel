<!doctype html>

<html>
<meta name="env" content="{{ App::environment() }}">
<meta name="token" content="{{ Session::token() }}">
<head><title>Algorithmaths</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="style.css"></head>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<script src="jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

<body>
<div id="wrapper">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-pencil"></i><b>Algorithmaths</b></a>
    </div>
    <div id = 'authArea'>
<button id = "lgnbtn"class = 'btn btn-secondary' href = "#" data-toggle="modal" data-target="#loginmodal"><a name ='loglink'>Log In</a></button>
<button id = "regbtn"class = 'btn btn-secondary' href = "#" data-toggle="modal" data-target="#myModalNorm"><a name = 'reglink'>Register</a></button>
<a id = "logoutbutton" href="{{ URL::to('logout') }}">Logout @if (Session::has('flash_message')) {{Session::get('flash_message')}}@endif</a>
</div>
  </div><!-- /.container-fluid -->
</nav>
<div class = 'container'>
<header class = 'jumbotron'>
<h1 class = "h1">Algorithmaths</h1>
</header>
<div id = 'messages'>
@if (Session::has('message')) {{Session::get('message')}}@endif</h2>
<div class = 'errorArea'>
<p class="errors" >{{$errors->first('username')}} </p>
<p class="errors">{{$errors->first('password')}} </p>
<p class="errors">{{$errors->first('first_name')}} </p>
<p class="errors">{{$errors->first('last_name')}} </p>
<p class = "errors">@if (Session::has('error_message')) {{Session::get('error_message')}}@endif</p>
</div>
</div>

<br />
<section class = 'nav'>
<ul class="nav nav-tabs" id="myTab">
        <li class="active"><a data-target="#home" data-toggle="tab"><b>Home</b></a></li>
        <li><a data-target="#notation" data-toggle="tab"><b>Examples</b></a></li>
        <li><a data-target="#recurrence" data-toggle="tab"><b>Interactive Area</b></a></li>
        <li><a data-target="#test" data-toggle="tab" name = "test"><b>Test Yourself</b></a></li>
        <li><a data-target="#review" data-toggle="tab"><b>Review </b></a></li>
</ul>
</section>


<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    Log In
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                {!! Form::open(['route' => 'sessions.store']) !!}
<div class = "form-group">
{!!Form::text('username','',array('id'=>'usernametxt','class'=>'form-control span6','placeholder' => 'Please Enter your Username')) !!}
<p class="errors">{{$errors->first('username')}}</p>
{!! Form::password('password',array('id'=>'passwordtxt','class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
<p class="errors">{{$errors->first('password')}}</p>
{!! Form::submit('Login', array('id'=>'loginbutton','class'=>'btn btn-secondary form-control')) !!}
        {!! Form::submit('Close', ['class' => 'btn btn-secondary form-control']) !!}
        {!! Form::close() !!}
</div>
</div>           <!-- Modal Footer -->
            <div class="modal-footer">

        <div class = "form-group">
        <td id = "buttons">

<br />

        </td>

        </div>
        
            </div>
        </div>
    </div>
</div>




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
               


<div class = "form-group">
 {!! Form::open(['route' => 'register']) !!}
{!! Form::label('firstname','Firstname: ') !!}{!! Form::text('first_name',"",['class' => 'form-control']) !!}
 <p class="errors">{{$errors->first('first_name')}}</p>
{!! Form::label('lastname', 'Lastname: ') !!}{!! Form::text('last_name',"",['class' => 'form-control']) !!}
<p class="errors">{{$errors->first('last_name')}}</p>
{!! Form::label('username','Username: ') !!}{!! Form::text('username',"",['class' => 'form-control']) !!}
<p class="errors">{{$errors->first('username')}}</p>
{!! Form::label('password', 'Password: ') !!}{!! Form::password('password',"",['class' => 'form-control']) !!}
<p class="errors">{{$errors->first('password')}}</p>
<a name = 'create'>{!! Form::submit('Create', ['class' => 'btn btn-secondary form-control']) !!}</a>
{!! Form::submit('Close', ['class' => 'btn btn-secondary form-control']) !!}
{!! Form::close() !!}

</div>
</div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">

				<div class = "form-group">
        <td id = "buttons">
				
<br />
        </td>

				</div>
				
            </div>
        </div>
        
    </div>
</div>
<!-- Post Info -->
<div id = "Home">

<h2>Welcome to Algorithmaths</h2><h2 class = "AuthUser">@if (Session::has('flash_message')) {{Session::get('flash_message')}}@endif</h2>
<p class = 'justify'>This site aims to guide you in learning recurrence relations
        and proof by mathematical induction. You can learn the recurrence relations 
        and proof by mathematical induction as a non-registered user although
        if you decide to register you can test yourself on the subject from a beginner
        level right up to a more difficult level.</p>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="carousel slide" id="carousel-462084">
        <ol class="carousel-indicators">
          <li data-slide-to="0" data-target="#carousel-462084">
          </li>
          <li data-slide-to="1" data-target="#carousel-462084">
          </li>
          <li data-slide-to="2" data-target="#carousel-462084" class="active">
          </li>
        </ol>
        <div class="carousel-inner">
          <div class="item">
            <img alt="Carousel Bootstrap First" src="Examples.png" />
          </div>
          <div class="item">
            <img alt="Carousel Bootstrap Second" src="intrec.png" />
          </div>
          <div class="item active">
            <img alt="Carousel Bootstrap Third" src="progress.png" />
          </div>
        </div> <a class="left carousel-control" href="#carousel-462084" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-462084" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    </div>
    <div class="col-md-4" id = 'hometext'>
      <p class = 'justify'>
        As a non-registered user of Algorithmaths you get to see some examples of Recurrence Relations and Proof by Mathematical Induction. You also get to use the websites Interactive area, allowing you to enter recurrence relations and working your way through the problem. If you want to boost your skills or exam results, register to the website and you will have access to the test. 
      Your scores get saved for you each time and you can come back to review them by clicking on the Review tab once you have logged in. 
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h2>
        Features
      </h2>
      <div class="row">
        <div class="col-md-6">
          <h2>
            Examples
          </h2>
          <p>
          There are plenty of examples to see on the website to look through if you are not too familiar with the subjects.
          </p>
          <p>
            <a id="modalmore" href="#modal-container"name = 'examples' role="button" class="btn" data-toggle="modal">Read More</a>
      <div class="modal fade" id="modal-container" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              <h4 class="my-modal-title" id="myModalLabel">
                
              </h4>
            </div>
            <div class="modal-body" id ="infobody">
              

            </div>
          </div>
          
        </div>
        
      </div>
          </p>
          <h2>
            Interactive Area
          </h2>
          <p>The Interactive area allows you to work through your own Recurrence Relation, please try it out!
          </p>
          <p>
            <a id="modalmore" href="#modal-container"name = 'interactive' role="button" class="btn" data-toggle="modal">Read More</a>
          </p>
        </div>
        <div class="col-md-6">
          <h2>
            Test
          </h2>
          <p> If you register to the site you can test your abilities. Try to beat your own score each time.

          </p>
          <p>
            <a id="modalmore" href="#modal-container"name = 'test' role="button" class="btn" data-toggle="modal">Read More</a>
          </p>
          <h2>
            Review
          </h2>
          <p>The Review area has all your test results for you to see. Keep reviewing your progress as a basis for improvement.
          </p>
          <p>
            <a id="modalmore" href="#modal-container"name = 'review' role="button" class="btn" data-toggle="modal">Read More</a>
          </p>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
<div id = "Examples">
<section class = 'nav'>
<ul class="nav nav-tabs tabs2" id="myTab">
        <li class="active"><a data-target="#linex" data-toggle="tab">Linear Example</a></li>
        <li><a data-target="#quadex" data-toggle="tab">Quadratic Example</a></li>
        <li><a data-target="#toh" data-toggle="tab">Towers of Hanoi</a></li>
</ul>
</section>
<div id ='fullLinear'>
<section class = 'nav'>
<ul class="nav nav-tabs tabs3" id="myTab">
        <li class="active"><a data-target="#tohrec" data-toggle="tab">Linear recurrence relation</a></li>
        <li><a data-target="#tohmi" data-toggle="tab">Linear Proof By Mathematical Induction</a></li>
</ul>
</section>
<div id = 'linearfull'>

<div id = 'linrec'>
<div id ='help'><p>Un = (n-1) +3, U(1)=1.</p> <p>U(2) = <p class = 'important'>4</p></p><p> U(3) =<p class = 'important'>7</p></p><p>U(4) = <p class = 'important'>10</p></p>
<p>The difference between all the terms in the sequence is 3.
</p>
</div>
<div id ='help'>
<p>To find the Closed form Expression for a Linear Recurrence relation the formula to follow is:<p class = 'important'>Tn = bn + c</p></p>
<p>To find b, we simply use the value of the first difference which is 3.</p>
<p> So we have Tn = 3n + c </p>
<p> The value we are trying to find is the first term in the sequence which is 1. </p>
<p> So 3 + c = 1 </p>
<p> C must be equal to -2 </p>
<p >so our closed form expression for this equation is:
<p class = 'important'>Tn = 3n - 2</p>
<p>Lets prove that u(n) = u(n-1) + 3 is equal to Tn = 3n - 2, using proof by Mathematical Induction</p>
<p> Just go to the Linear mathematical Induction tab </p>
</p>
</div>
</div>
<div id ='linmi'>
<div id = 'help'>
  <p> In our recurrence relation U(1) = 1. </p>
  <p> so this must be true in our closed form expression for n=1. </p>
  <p> Tn = 3n - 2 </p> 
  <p> Tn = 3(1) - 2 = 1 </p> 
  <p> Therefor this is TRUE!! We can move on to step 2 now </p>
</div>
<div id = 'help'>
<p> Step 2 : Lets assume that our recurrence relation is equal to the Closed-form abitary k.</p>
<p> U(k) = 3k - 2 </p> 
</div>
<div id = 'help'>
<p> Step 3: Lets show that U(k+1) = T(k+1).</p>
<p> U(k+1) = <p class = 'important'>u(k) + 3 </p></p> 
<p> We know that the u(k) in the recurrence relation above is equal to 3k - 2, as we discovered in step 2. So we need to put this into our recurrence relation</p>
<p>So U(k+1) = (3k - 2) + 3 </p>
<p> Simplifying this we just get 3k -2 +3 </p>
<p> Simplifying one last time we end up with <p class 'important'>U(k+1) = 3k + 1</p></p>
<br /><br />
<p>We now need to see if this is the same for t(k+1).</p> 
<p> So T(k+1) = 3(k+1) - 2</p>
<p> = 3k + 3 - 2 </p> 
<p> = 3k + 1 </p>
<br /><br />
<p> We can see that U(k+1) = T(k+1) = 3k + 1, thus we have proven this closed-form to be true.</p>


</div>
</div>
 </div>
 </div>
<div id = 'quadfull'>
<section class = 'nav'>
<ul class="nav nav-tabs tabs3" id="myTab">
        <li class="active"><a data-target="#tohrec" data-toggle="tab">Quadratic recurrence relation</a></li>
        <li><a data-target="#tohmi" data-toggle="tab">Quadratic Proof By Mathematical Induction</a></li>
</ul>
</section>
<div id = 'quadrec'><div id = 'help'>
<p>Recurrence Relation = U(n) = U(n-1)+3n+2</p>
<p>U(1) = 1</p>
<p>U(2) = 1 + 3(2) +2 = <p class = 'important'>9</p></p>
<p>U(3) = 9 + 3(3) +2 = <p class = 'important'>20</p></p>
<p>U(4) = 20 + 3(4) +2 = <p class = 'important'>34</p></p>
<p>U(5) = 34 + 3(5) +2 = <p class = 'important'>51</p></p>
<p>
  Now we need to find the first Difference of the sequence.
  The first difference between all the values is : <p class = 'important'>8,11,14,17</p>
  <p>These values are not the same, so we find the difference of the first differences:
<p class = 'important'>3,3,3</p>
  </p>
  <p>There are 2 sets of differences here, which means our recurrence is Quadratic.</p>
</p>
<p>We need to find a solution that will work for all numbers, called a Closed-form Expression.</p>

<p>The closed form expression for a Quadratic recurrence relation will always follow the form: <p class = 'important'>Tn = an2 + bn + c</p></p>
</div>
<div id ='help'>
<p>Finding 'a' is easy, it is half of the second difference value. In this case our second difference value is 3, so:
<p class= 'important '>a = 1.5</p></p>
<p> To find b we firstly multiply 'a' by 3. So we get 3(a) = 4.5</p>
<p> We then want to get the value of our First-first difference which is 8.</p>
<p> so 4.5 + b = 8, therefore <p class ='important'>b = 3.5</p></p>
<p> So far we have Tn = 1.5n&#178; +3.5n + c. All we need to do is find c, and we have our closed-form expression.</p>
<p> Finding c is also simple, first add a and b together. So 1.5+3.5 = 5.</p>
<p> From this value we need to find out first term in the sequence which is 1.</p>
<p> So 5 + c = 1.. <p class = 'important'>c must be equal to -4</p></p>
<p class ='important'>Closed form expression = Tn = 1.5nn&#178; + 3.5n - 4</p>
<p>We now have our closed form expression and we need to prove if it is true for all numbers.</p>
<p>Go the the Quadratic Mathematical Induction tab to see how we prove this.</p>

</div>



 
</div>
<div id ='quadmi'>  
<div id = 'help'>
<p>Initially we need to recheck what U(1) is in our recurrence relation:</p>

<p>U(1) = 1</p>

<p>For step 1 to be true, when we enter 1 into our Closed-form expression we should get the same answer as the U(1) in our Recurrence Relation: </p>

<p>T(n) = 1.5n² + 3.5(n) -4</p>
<p>T(1) = 1.5(1²) + 3.5(1) -4</p>

<p>T(1) = 1  </p>
<p>TRUE!</p>
</div>
<div id = 'help'>
<p>Step 2  Let's assume the recurrence relation is equal to the closed-form expression for arbitrary integer k. </p>

<p>T(k) = 1.5k² + 3.5(k) -4 </p>

<p>U(k) =1U(k-1) +3k +2 </p>

</div>
<div id = 'help'>
<p>Step 3  We want to show that U(k + 1) = T(k + 1). </p>

<p>U(k+1) =1U(k) +3k +2 </p>

<p>We know that U(k) in the equation above is equal to1.5k² + 3.5(k) -4 so we can replace the U(k) our recurrence relation. </p>

<p>U(k+1) = 1(1.5k² + 3.5(k) -4) + 3(k + 1) +2 </p>

<p>= 1.5k² + 3.5(k) -4 + 3k +3 + 2 </p>

<p>=1.5k² + 6.5k +1 </p>



<p>T(k+1) = 1.5(k+1)² + 3.5(k+1) -4 </p>

<p>= 1.5(k² + 2k + 1) +3.5k + 3.5 -4 </p>

<p>= 1.5k² + 3k + 1.5 +3.5k -0.5 </p>

<p>= 1.5k² + 6.5k + 1 </p>




<p>So U(k+1) = T(k+1) =1.5k² + 6.5k + 1</p>
</div>
</div>
  </div>
<div id = 'tohfull'>
<section class = 'nav'>
<ul class="nav nav-tabs tabs3" id="myTab">
        <li class="active"><a data-target="#tohrec" data-toggle="tab">Towers of Hanoi Recurrence relation</a></li>
        <li><a data-target="#tohmi" data-toggle="tab">Towers of Hanoi Mathematical Induction</a></li>
</ul>
</section>
<div id = 'tohrecurrence'>
<div id = 'help'>
<h1 class = 'towersTitle'>Towers of Hanoi</h1>
<p>How many moves will it take to transfer n disks from the left post to the right post?</p>
<p>Let's look for a pattern in the number of steps it takes to move just one, two, or three disks. We'll number the disks starting with disk 1 on the bottom.</p>
<p>Click the links below to see how many moves it takes for 1, 2 or 3 disks. </p>
<a id ='seeonemove' class = 'disks'>1 Disk </a><a id ='seetwomove'class = 'disks'>2 Disks </a><a id ='seethreemove'class = 'disks'>3 Disks </a>
<div class="row">
<div id = 'move1'>
<div class ='col-md-5'>
<p class = 'moves'>1 disk: 1 move</p>

<p>Move 1: move disk 1 to post C</p>
</div>
<div id ='recImage' class = 'col-md-4'>
</div>
</div>
</div>
<div class="row">
<div id = 'move2'>
<div class ='col-md-5'>
<p class = 'moves'>2 disks: 3 moves</p>
<p>Move 1: move disk 2 to post B </p>
<p>Move 2: move disk 1 to post C </p>
<p>Move 3: move disk 2 to post C</p>
</div>
<div id ='recImage2'class = 'col-md-4'>
</div>
</div>
</div>
<div class="row">
<div id = 'move3'>
<div class ='col-md-5'>
<p class ='moves'>3 disks: 7 moves</p>
<p>Move 1: move disk 3 to post C </p>
<p>Move 2: move disk 2 to post B </p>
<p>Move 3: move disk 3 to post B </p>
<p>Move 4: move disk 1 to post C </p>
<p>Move 5: move disk 3 to post A </p>
<p>Move 6: move disk 2 to post C </p>
<p>Move 7: move disk 3 to post C</p>
</div>
<div id ='recImage3' class = 'col-md-5'>

</div>
</div>
</div>
<p>Can you work through the moves for transferring 4 disks? It should take you 15 moves. How about 5 disks? 6 disks? Do you see a pattern?</p>
</div>
<br/>
<div id = 'help'>
<p> Lets refer to the number of disks as 'n'.</p>
<p> Lets refer to the amount of moves needed to complete the sequence as 'M'.</p>
<br />
<p> When n = 1 we know it takes 1 move, but how can we show this as a Recurrence Relation?</p>
<p> We write a recurrence (let's call it M(n)) for the number of moves it takes for an n-disk tower.</p>
<p> So....<p class ='important'> M(1) = 1</p></p>
<p> From the pattern we can see that <p class ='important'>M(n) = 2(n-1)+1</p>for example <p class ='important'>M(2) = 2(1)+1 = 3</p> <p>and</p><p class ='important'> M(3) = 2(3)+1 = 7.</p></p>
<p> The n- 1 in the equation above refers to the answer from the previous term in the sequence</p>
<br />
<p>Just refer to the images above to see that it works.</p>
<br />
<p> How many moves will it take to move 100 disks?</p>
<p> We dont want to work all of this out, so we need to find a solution that can find all numbers </p>
</div>
<div id = 'help'>
  
<table id ='pattern'>
<tr><td><p>Number of Disks  </td><td>  Number of Moves</p></td></tr>
<tr><td><p> 1  </td> <td> 1 </p></td></tr>
<tr><td><p> 2   </td> <td> 3 </p></td></tr>
<tr><td><p> 3   </td> <td>  7 </p></td></tr>
<tr><td> <p> 4  </td> <td>  15</p> </td></tr>
<tr><td> <p> 5   </td> <td> 31</p> </td></tr>
</table>
   <p> Powers of two help reveal the pattern:</p>
<p>Number of Disks (n)     Number of Moves</p>
<p>        1                 2^1 - 1 = 2 - 1 = 1 </p>
<p>        2                 2^2 - 1 = 4 - 1 = 3 </p>
<p>        3                 2^3 - 1 = 8 - 1 = 7 </p>
<p>        4                 2^4 - 1 = 16 - 1 = 15</p> 
<p>        5                 2^5 - 1 = 32 - 1 = 31</p>
<p>So the formula for finding the number of steps it takes to transfer n disks from post A to post B is:<p class ='important'> 2^n - 1</p></p>
</div>
</div>
<div id = 'tohInduction'>

<div id = 'help'>
<p>Proof by Mathematical Induction</p>
<p>Base Case:</p>
<p>Initially we need to recheck what M(1) is in our recurrence relation:</p>
<p>M(1) = 1</p>
<p>For step 1 to be true, when we enter 1 into our Closed-form expression we should get the same answer as the U(1) in our Recurrence Relation:</p>
<p>T(n) = 2^n - 1</p>
<p>T(1) = 2^1 - 1 = 1</p>
<p>So T(1) = M(1) = 1</p>
<p class = 'important'>Therefore this is TRUE!!</p>

</div>
<div id = 'help'>
<p>Assume true for n=k </p>
<p>M(k) = 2^k - 1</p>
</div>
<div id = 'help'>
<p>Let's check if n=k+1</p>
<p>M(k+1) = 2(2^k -1) + 1</p>
<p>M(k+1) = 2^k+1 + 1</p>
<p>M(k+1) = 2^(k+1) -1</p>
<br/>
<br />
<p>  T(k+1) = 2^k+1 - 1</p>
<p> Since M(K+1) and T(k+1) are equal to 2^(k+1) - 1</p>
<p> We can now say we have proven our closed-form expression to be true.</p>


</div>


</div>

</div>
</div>

<div id = "Recurrence">
<div id = 'recurrencearea'>
Enter values into the quadratic recurrence relation below. Attempt working out the sequence by yourself first before continuing as you 
will be asked to enter the sequence once you submit. 

<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
    <br />
    <p>Enter in any numbers to the recurrence relation, and enter your initial term.</p>
    <p>When you click submit, text boxes will appear for you to enter in the sequence terms yourself. </p>
    <p>If you struggle, hover over the question mark for a hint.</p>

    </div>
    <div class="col-md-6">
    <br />
<table id='recTable'>
    <tr>
        <td>
            <label>U(n) = </label></td>
        <td><input type="text" id="firstnumber" class="numberInput" readonly="true" value="1"></input>
        </td>
        <td><label>U(n-1) +</label></td>
        <td><input type="text" id="secondnumber" class="numberInput"></input>
        </td>
        <td><label>n +</label></td>
        <td><input type="text" id="thirdnumber" class="numberInput"></input>
        </td>
    </tr>
    <tr>
        <td><label>U(1) =</label></td>
        <td><input type="text" id="initialnumber" class="numberInput"></input>
        </td>
        <td><span id="errmsg"></span></td>
        <td id='buttons'></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td> <button id="recsubmit"><a name =  'recsubmit'>Submit</a></button></td>
        <td></td>
        <td></td>
    </tr>
</table>
    </div>
    <div class="col-md-3">

    </div>
  </div>
</div>
<table id = 'hortable'>
<tr id = 'vertseq'></tr>
</table>
<table class = "recurrenceTable">
<tr><td></td><td>
<button id ='findDiff'>Find Difference</button></td><td></td>
</tr>
<tr><td><div id ='closedHelp'>If you need help finding the closed-form expression, hover over the textbox for a hint.</div></td><td><div id = "closedFormArea"></div></td><td></td></tr>
<tr><td></td><td><div id = 'proofbutton'><button id = 'proof'>Show Proof by Mathematical Induction</button></div></td><td></td></tr>
</table>
</div>

<div id = "MathInduction">
<button class = 'prev'>Go Back to the Recurrence Relation</button>
<table class = "inductionTable ">
  <tr><td id='step1'></td><td id ='step1Eq'></td><td id = 'trueorFalse'></td></tr>
  <tr><td id ='step2'></td><td id ='step2Eq'></td><td></td></tr>
  <tr><td id ='step3'></td><td id ='step3Eq'></td><td></td></tr>
</table>

</div>

</div>

<div id = "Test">

<div id = "testHeader"></div>
<div id ='testarea'>
<h1 class = 'quiztitle'>Test Yourself!! </h1>
@if(Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>You got </strong> {{ Session::get('length', '') }} <strong> Correct!! </strong>
    </div>
@endif
@if(Auth::user())
{!! Form::open(['route' => 'test.store'])!!}

@foreach ($questions as $question)
<div class="question">
    <p>{{$question->question}}</p>
    @foreach ($question->answer->shuffle() as $answer) 
        <p><input type="radio" id = '{{ substr($question->question, 0, 9) }}' name='{{ substr($question->question, 0, 9) }}' value='{{$answer->correct_answer}}' required>{{$answer->answer}}</input></p>
    @endforeach
</div>
@endforeach

<p>{!! Form::submit('Submit', array('id'=>'submitbutton','class'=>'send-btn')) !!}</p>

{!! Form::close()!!}
@endif

</div>

</div>

<div id = "Review" class ='row'>
<h1>Progress</h1>



@if (Auth::user())

<table id = 'resultsTable' class = 'col-md-6'>
<tr><th>Date</th><th>Result</th></tr>
@foreach($userResult as $res)
@foreach($res->result as $all)
<tr><td>{{$all->created_at}}</td>
<td>{{$all->result}}</td>

@endforeach
@endforeach

</tr>

</table>
<div class ='col-md-6'>
@endif
<h3>Your results @if(Session::has('flash_message')) {{Session::get('flash_message')}} @endif </h3>
    <canvas id="canvas" height="300px" width="500px"></canvas>
    @if(Auth::user())


<script>
var lineChartData = {
    "datasets": [{
        "data":  {{json_encode($dataArray)}}
            ,
            "pointStrokeColor": "grey",
            "fillColor": "rgba(156, 152, 193, 0.36)",
            "pointColor": "rgba(220,220,220,1)",
            "strokeColor": "pink"
    }],
        "labels":{{json_encode($labelArray)}}
};

var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
</script>
@endif
</div>
</div>

</div>




</div>




</body>
<footer class = 'footer'>
</footer>
</html>
