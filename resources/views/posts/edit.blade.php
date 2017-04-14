@extends('layouts.master')
@section('title',' | Post Edit')
@section('stylesheet')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
	<div class="row">
	{!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('title','Title: ') }}
			{{ Form::text('title',null,['class'=>'form-control']) }}

			{{ Form::label('slug','Slug: ') }}
			{{ Form::text('slug',null,['class'=>'form-control']) }}

			{{ Form::label('category_id','Category') }}
			{{ Form::select('category_id',$categories,null,['class'=>'form-control']) }}

			{{ Form::label('tags','Tags',['class'=>'form-spacing-top']) }}
			{{ Form::select('tags[]',$tags,null,['class'=>'select2-multi form-control','multiple'=>'multiple']) }}

			{{ Form::label('body','Body: ') }}
			{{ Form::textarea('body',null,['class'=>'form-control']) }}

		</div>
		<div class="col-md-4">
			<div class="well">
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
					{!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-md-6">
						{{ Form::submit('Save Change', ['class'=>'btn btn-success btn-block']) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@endsection
@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}
	<script>
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({{ json_encode($post->tags()->getRelatedIds()) }}).trigger('change');
	</script>
@endsection