@extends('base')

@section('title', $post->title)

@section('content')
    @include('post.single', [
        'post' => $post
    ])
@endsection
