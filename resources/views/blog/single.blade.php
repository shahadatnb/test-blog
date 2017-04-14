@extends('layouts.master')
<?php $titleTag= htmlspecialchars($post->title); ?>
@section('title'," | $titleTag")
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p>Posted in {{ $post->category->name }}</p>
			<hr>
			<p>{{ $post->body }}</p>
			<hr>
			<p>Posted In {{ $post->category->name }}</p>
		</div>
		<div class="col-md-4">
			<div class="well">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="comments-title">{{ $post->comments()->count() }} Comment</h2>
			@foreach($post->comments as $comment)
				<p><strong>Name: </strong>{{ $comment->name }}</p>
				<p><strong>Comment: </strong>{{ $comment->comment }}</p>
			@endforeach
		</div>
	</div>
	<div class="row">
		<div id="comment-form">
			{{ Form::open(['route'=>['comments.store', $post->id], 'method'=>'POST']) }}
				<div class="col-md-6">
					{{ Form::label('name',"Name") }}
					{{ Form::text('name', null,['class'=>"form-control"])}}
				</div>
				<div class="col-md-6">
					{{ Form::label('email',"Email:")}}
					{{ Form::email('email',null,['class'=>"form-control"])}}
				</div>
				<div class="col-md-12">
					{{ Form::label('comment',"Comment:")}}
					{{ Form::textarea('comment',null,['class'=>'form-control'])}}
				</div>
				<div class="col-md-12">
					{{ Form::submit('Add Comment',['class'=>'btn btn-success'])}}
				</div>
			{{  Form::Close() }}
		</div>
	</div>

@endsection