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
}
