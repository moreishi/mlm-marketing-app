<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\UserBaseTest;

class UserDeleteTest extends UserBaseTest
{
    /**
     * A basic feature test example.
     */
    public function test_delete_uri(): void
    {
        $response = $this->delete('/api/users');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_delete_success(): void
    {
        $response = $this->delete('/api/users');

        $response->assertStatus(200);
        $content = $response->content();
        
        $this->assertEquals($content->id, 1);
        $this->assertEquals($content->name, '');
        $this->assertEquals($content->email, 'email');
    }
}
