@extends('layouts.master')
@section('title'," | $tag->name Tag")
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
			

		</div>
		<div class="col-md-2 col-md-offset-2"><a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary pull-right">Edit</a></div>
		<div class="col-md-2 col-md-offset-2">
			{!! Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE']) !!}
			{!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
			{!! Form::close(); !!}</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<tr>
					<th>*</th>
					<th>Title</th>
					<th>Tags</th>
					<th></th>
				</tr>
				@foreach($tag->posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td> @foreach($post->tags as $tag) 
						<span class="label label-default">{{ $tag->name }}</span>
					@endforeach
					</td>
					<td></td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>

@endsection