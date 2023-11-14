<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Feature\MockTestCase;
use App\Models\User;

class RegisterPostTest extends MockTestCase
{
   
    const HTTP_API_REGISTER = '/api/register';

    public function test_post_uri(): void
    {
        $response = $this->post(RegisterPostTest::HTTP_API_REGISTER, []);

        $this->assertEquals($response->getStatusCode(), 422);
    }

    public function test_post_register(): void
    {
        
        $userMock = User::factory()->make();

        $response = $this->post(RegisterPostTest::HTTP_API_REGISTER, [
            'first_name' => $userMock->first_name,
            'last_name' => $userMock->last_name,
            'email' => $userMock->email,
            'password' => $userMock->password,
            'confirm_password' => $userMock->password
        ]);

        $response->assertStatus(200);

        $content = json_decode($response->content());

        $this->assertObjectHasProperty('user', $content);
        $this->assertObjectHasProperty('access_token', $content);
        $this->assertObjectHasProperty('token_type', $content);

    }

}
