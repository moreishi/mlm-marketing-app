<?php

namespace Tests\Feature;

use Tests\Feature\UserBaseTest;
use App\Models\User;

class LoginPostTest extends UserBaseTest
{
    const HTTP_API_LOGIN = '/api/login';

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_post_login(): void
    {

        $user = UserBaseTest::mockUser();

        $response = $this->post(UserBaseTest::HTTP_API_LOGIN, [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);

        $content = json_decode($response->content());

        $this->assertObjectHasProperty('user', $content);
        $this->assertObjectHasProperty('access_token', $content);
        $this->assertObjectHasProperty('token_type', $content);

        $this->assertNotNull($content->user);
        $this->assertNotNull($content->access_token);
        $this->assertNotNull($content->token_type);

    }

    public function test_post_login_failed(): void
    {

        $response = $this->post(UserBaseTest::HTTP_API_LOGIN, [
            'email' => 'test@domain.com',
            'password' => 'password'
        ]);

        $response->assertStatus(401);

        $content = json_decode($response->content());

        $this->assertObjectHasProperty('user', $content);
        $this->assertObjectHasProperty('access_token', $content);
        $this->assertObjectHasProperty('token_type', $content);

        $this->assertNull($content->user);
        $this->assertNull($content->access_token);
        $this->assertNull($content->token_type);

    }
}
