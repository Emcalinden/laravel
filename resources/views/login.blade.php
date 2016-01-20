{!! Form::open() !!}
<h1>Login</h1>
@if(Session::has('error'))
<div class="alert-box success">
  <h2>{{ Session::get('error') }}</h2>
</div>
@endif
<div class="controls">
{!!Form::text('username','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Please Enter your Username')) !!}
<p class="errors">{{$errors->first('username')}}</p>
</div>
<div class="controls">
{!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
<p class="errors">{{$errors->first('password')}}</p>
</div>
<p>{!! Form::submit('Login', array('class'=>'send-btn')) !!}</p>
{!! Form::close()!!}
