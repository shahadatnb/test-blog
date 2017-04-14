@extends('layouts.master')
@section('title','Home')
@section('content')

<div class="row">
    <div class="col-md-8">
        @foreach($posts as $post)
        <div class="post">
            <h3>{{ $post->title }}</h3>
            <p>{{ substr($post->body,0,50) }}{{ strlen($post->body)>50? '...':''}}</p>
            <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
        </div>
        <hr>
        @endforeach
    </div>
    <div class="col-md-4">
        <h3></h3>
    </div>
</div>

@endsection