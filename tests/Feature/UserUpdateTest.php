<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\UserBaseTest;

class UserUpdateTest extends UserBaseTest
{
    /**
     * A basic feature test example.
     */
    public function test_get_uri(): void
    {
        $response = $this->put('/api/users');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_put_update(): void
    {
        $response = $this->put('/api/users');

        $response->assertStatus(201);
    }

    /**
     * A basic feature test example.
     */
    public function test_get_response_structure(): void
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
        $content = $response->content();
        
        $this->assertEquals($content->id, 1);
        $this->assertEquals($content->name, '');
        $this->assertEquals($content->email, 'email');
    }
}
