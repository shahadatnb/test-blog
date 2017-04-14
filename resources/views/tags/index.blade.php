@extends('layouts.master')
@section('title',' | All Tag')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Tag List</h1>
			<hr>
			
			<table class="table">
				<tr>
					<th>#</th>
					<th>Tag Name</th>
					<th></th>
				</tr>
				@foreach($tags as $Tag)
				<tr>
					<td>{{ $Tag->id }}</td>
					<td>{{ $Tag->name }}</td>
					<td><a href="{{ route('tags.show',$Tag->id) }}" class="btn btn-primary pull-right">Show</a></td>
				</tr>
				@endforeach
			</table>

		</div>
		<div class="col-md-4">
			<div class="well">
			<h2>New Tag</h2>
				{!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
				{{ Form::label('name','Name') }}
				{{ Form::text('name',null,['class'=>'form-control']) }}
				{{ Form::submit('Create New Tag', ['class'=>'btn btn-primary btn-block']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection