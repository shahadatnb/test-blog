@extends('layouts.master')
@section('title',' | All Category')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Category List</h1>
			<hr>
			
			<table class="table">
				<tr>
					<th>#</th>
					<th>Category Name</th>
				</tr>
				@foreach($categories as $Category)
				<tr>
					<td>{{ $Category->id }}</td>
					<td>{{ $Category->name }}</td>
				</tr>
				@endforeach
			</table>

		</div>
		<div class="col-md-4">
			<div class="well">
			<h2>New Category</h2>
				{!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
				{{ Form::label('name','Name') }}
				{{ Form::text('name',null,['class'=>'form-control']) }}
				{{ Form::submit('Create New Category', ['class'=>'btn btn-primary btn-block']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection