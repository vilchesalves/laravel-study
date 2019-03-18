@extends('base')

@section('title', 'Post index')

@section('content')
<div class="posts-index">
    @each('post.single', $latestPosts, 'post')
    {{ $latestPosts->links() }}
</div>
@endsection
