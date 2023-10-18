<?php

namespace Tests\Feature\Members;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class CreateMembersTest extends TestCase
{
    use RefreshDatabase;

    protected string $endpoint = '/members';

    public function test_create_members_success()
    {
        $user = User::factory()->create(); 
        $this->actingAs($user); 

        $payload = [
            'first_name' => 'test name',
            'email_address' => 'Example@g.com', 
            'school' => ['1,2']
        ]; 
        $response = $this->post($this->endpoint, $payload);
        $response->assertRedirect(route('members.index')); 
    }

     
}
