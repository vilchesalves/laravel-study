<div class="post">
    <h1>{{ $post->title }}</h1>
    <p><a href="{{ route('post.show', [ 'id' => $post->id ]) }}">{{ $post->created_at }}</a></p>
    <div class="content">
        {!! nl2br(e($post->content)) !!}
    </div>
</div>
