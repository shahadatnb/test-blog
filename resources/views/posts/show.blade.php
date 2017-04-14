@extends('layouts.master')
@section('title',' | Post Show')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p>Posted in {{ $post->category->name }}</p>
			<hr>
			<p>{{ $post->body }}</p>
			<hr>
			<div class="tag">
				@foreach($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>
			<div id="backend-comments" style="margin-top: 50px;">
				<h1>Comments <small>{{ $post->comments()->count() }} Total</small></h1>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($post->comments as $comment)
							<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td>
									<a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>

								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<div class="dl-horizontal">
					<dt>Url : </dt>
					<dd><a href="{{ url($post->slug) }}">{{ url($post->slug) }}</a></dd>
				</div>
				<div class="dl-horizontal">
					<dt>Creare at :</dt>
					<dd>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd>
				</div>
				<div class="dl-horizontal">
					<dt>Last Update :</dt>					
					<dd>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
					{!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-md-6">
						{!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
						{!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
						{!! Form::close(); !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection