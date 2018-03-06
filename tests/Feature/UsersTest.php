<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use DatabaseTransactions;
    use InteractsWithDatabase;

    /**
     * @test
     */
    public function userCanFollowOtherUser()
    {
        $user = factory(User::class)->create();
        $other = factory(User::class)->create();

        $this->actingAs($user)->post($other->slug.'/follow');

        $this->assertDatabaseHas('followers',[
            'user_id' => $user->id,
            'followed_id' => $other->id,
        ]);
    }

    /**
     * @test
     */
    public function userCanLogin()
    {
        $user = factory(User::class)->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function testShowUserPage()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/'.$user->slug);

        $response->assertStatus(200);
    }
}
