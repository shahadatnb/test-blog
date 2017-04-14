@extends('layouts.master')
@section('title',' | Edit Tag')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Tag Edit</h1>
			<hr>
			{{ Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT']) }}
				{{ Form::label('name',"Title") }}
				{{ Form::text('name',null,['class'=>'form-control']) }}
				{{ Form::submit('Save Change',['class'=>'form-control']) }}
			{{ Form::close() }}
		</div>
		<div class="col-md-4">
		</div>
	</div>

@endsection