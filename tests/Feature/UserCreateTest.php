<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\UserBaseTest;

class UserCreateTest extends UserBaseTest
{
    /**
     * A basic feature test example.
     */
    public function test_post_uri(): void
    {
        $response = $this->post('/api/users');

        $this->assertNotEquals($response->getStatusCode(), 301);
        $this->assertNotEquals($response->getStatusCode(), 303);
        $this->assertNotEquals($response->getStatusCode(), 308);
    }

    /**
     * A basic feature test example.
     */
    public function test_post_create_user(): void
    {
        $response = $this->post('/api/users');

        $response->assertStatus(201);
        // $content = $response->content();
        
        // $this->assertEquals($content->id, 1);
        // $this->assertEquals($content->name, '');
        // $this->assertEquals($content->email, 'email');
    }
}
