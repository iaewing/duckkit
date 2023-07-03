<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Subduckkit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItCanReturnComments()
    {
        $subduckkit = Subduckkit::factory()->create();

        $post = Post::factory()->create(['subduckkit_id' => $subduckkit->id]);

        $comments = Comment::factory()->count(5)->create([
            'post_id' => $post->id
        ]);

        $response = Http::get(route('posts.comments', ['id' => $post->id]));

        $this->assertEquals($comments, $response->json());
        $this->assertTrue(true);
    }
}
