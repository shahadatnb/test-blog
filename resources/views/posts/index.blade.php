@extends('layouts.master')
@section('title',' | All Post')
@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>All Post</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Body</th>
						<th>Created At</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->title }}</td>
						<td>{{ substr($post->body,0,50) }} {{ strlen($post->body)>50? '...':'' }}</td>
						<td>{{ $post->created_at }}</td>
						<td>
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
							<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		<div class="text-center">{!! $posts->links(); !!}</div>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-larg btn-primary">Create New Post</a>
		</div>
	</div>

@endsection