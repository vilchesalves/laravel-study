@extends('base')

@section('title', 'Post index')

@section('content')
<div class="posts-index">
  @foreach ($latestPosts as $post)
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->created_at }}</p>
    <div class="content">
      {!! nl2br(e($post->content)) !!}
    </div>
  @endforeach
  {{ $latestPosts->links() }}
</div>
@endsection
