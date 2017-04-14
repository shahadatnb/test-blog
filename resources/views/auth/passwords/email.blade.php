@extends('layouts.master')
@section('title','Reset Password')
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">Reset Password</div>
			<div class="panel-body">
				{!! Form::open(['url'=>'password/email','method'=>'POST']) !!}
					{{ csrf_field() }}
					{{ Form::label('email','Email') }}
					{{ Form::email('email',null,['class'=>'form-control']) }}
					{{ Form::submit('Send Password Reset Link',['class'=>'btn btn-primary btn-block']) }}
				{!! Form::close() !!}
			</div>
		</div>
		
	</div>
</div>

@endsection