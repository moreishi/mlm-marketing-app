<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\MockTestCase;
use App\Models\User;

class UserBaseTest extends MockTestCase
{
    const HTTP_API_USERS = '/api/users';
    const HTTP_API_LOGIN = '/api/login';
    const HTTP_API_REGISTER = '/api/register';

    protected function setUp(): void
    {

        parent::setUp();

        $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->mockAuthUserToken(),
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest'
        ]);
    }

    public static function mockUser()
    {
        return User::factory()->create();
    }

    public static function mockAuthUserToken()
    {
        return UserBaseTest::mockUser()->createToken('unit-test-token')->plainTextToken;
    }

    public static function mockAsUser()
    {
        return User::first();
    }
}
