<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\UserBaseTest;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\User;

class UserCreateTest extends UserBaseTest
{

    /**
     * A basic feature test example.
     */
    public function test_post_create(): void
    {
        $userMock = User::factory()->make();

        $response = $this->post(UserBaseTest::HTTP_API_USERS, [
            'first_name' => $userMock->first_name,
            'last_name' => $userMock->last_name,
            'email' => $userMock->email
        ]);
        
        $response->assertStatus(201);
    }
}
