<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\UserBaseTest;
use App\Models\User;

class UserUpdateTest extends UserBaseTest
{

    public function test_put_update(): void
    {

        $user = UserBaseTest::mockUser();
        $mockUser = User::factory()->make();

        $response = $this->put(UserBaseTest::HTTP_API_USERS . '/' . $user->id, [
            'first_name' => $mockUser->first_name,
            'last_name' => $mockUser->last_name,
            'email' => $mockUser->email,
        ]);

        $response->assertStatus(202);

        $content = json_decode($response->content());

        $this->assertObjectHasProperty('id', $content);
        $this->assertObjectHasProperty('first_name', $content);
        $this->assertObjectHasProperty('last_name', $content);
        $this->assertObjectHasProperty('email', $content);

        $this->assertNotEquals($content->id, $mockUser->id);
        $this->assertNotEquals($content->first_name, $mockUser->first_name);
        $this->assertNotEquals($content->last_name, $mockUser->last_name);
        $this->assertNotEquals($content->email, $mockUser->email);

    }

}
