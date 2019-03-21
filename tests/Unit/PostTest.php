<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Post;

class PostTest extends TestCase
{
    public function testPostModel()
    {
        $this->assertTrue(Post::class == 'App\Post');
    }

    public function testPostFactory()
    {
        $postAttributes = factory(Post::class)->make()->getAttributes();
        
        $this->assertTrue(array_key_exists('title', $postAttributes));
        $this->assertTrue(array_key_exists('content', $postAttributes));
    }

    public function testPostsIndex()
    {
        $response = $this->get('/');
        $response->assertSee('<div class="posts-index">');
    }

    public function testPostsSingle()
    {
        $post = Post::first();
        $response = $this->get(route('post.show', [
            'id' => $post->id
        ]));

        $response->assertSee('<div class="post">');
        $response->assertSee('<div class="content">');
    }
}
