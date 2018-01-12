<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStoreDraft()
    {
        $fakePost = factory(\App\Post::class)->make();

        $response = $this->post('posts', [
            'title' => $fakePost->title,
            'status' => 'draft',
        ]);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals($response->getSession()->get('ms'), 'Post created');
        $this->assertDatabaseHas('posts', [
            'title' => $fakePost->title
        ]);
    }

    // public function testStorePublish()
    // {
    //     $fakePost = factory(\App\Post::class)->make();

    //     $response = $this->post('posts', [
    //         'title' => $fakePost->title,
    //         'status' => 'publish',
    //     ]);

    //     $this->assertEquals(302, $response->getStatusCode());
    //     $this->assertEquals($response->getSession()->get('ms'), 'Post created');
    //     $this->assertDatabaseHas('posts', [
    //         'title' => $fakePost->title
    //     ]);
    // }
}
