<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\UserBaseTest;

class UserReadTest extends UserBaseTest
{

    public function test_get_response_structure(): void
    {
        $response = $this->get(UserBaseTest::HTTP_API_USERS);

        $response->assertStatus(200);
        
        $content = json_decode($response->content());
        $record = $content[0];
        
        $this->assertIsArray($content);

        $this->assertNotNull($record->id);
        $this->assertNotNull($record->first_name);
        $this->assertNotNull($record->last_name);
        $this->assertNotNull($record->email);

        $this->assertObjectHasProperty('id', $record);
        $this->assertObjectHasProperty('first_name', $record);
        $this->assertObjectHasProperty('last_name', $record);
        $this->assertObjectHasProperty('email', $record);
    }
}
