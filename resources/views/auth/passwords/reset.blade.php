@extends('layouts.master')
@section('title','Reset Password')
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">Reset Password</div>
			<div class="panel-body">
				{!! Form::open(['url'=>'password/reset','method'=>'POST']) !!}
					{{ Form::hidden('token',$token) }}
					{{ Form::label('password','New Password') }}
					{{ Form::password('password',null,['class'=>'form-control']) }}
					{{ Form::label('password_confirmation','Password Confirm') }}
					{{ Form::password('password_confirmation',null,['class'=>'form-control']) }}
					{{ Form::submit('Reset Password',['class'=>'btn btn-primary btn-block']) }}
				{!! Form::close() !!}
			</div>
		</div>
		
	</div>
</div>

@endsection