<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\UserBaseTest;

class UserDeleteTest extends UserBaseTest
{

    public function test_delete_success(): void
    {
        $userMock = UserBaseTest::mockUser();
        $response = $this->delete(UserBaseTest::HTTP_API_USERS . "/" . $userMock->id);
        $response->assertStatus(204);
    }

}
