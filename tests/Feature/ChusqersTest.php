<?php

namespace Tests\Feature;

use App\Chusqer;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChusqersTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateNewChusqer()
    {
        $user = factory(User::class)->create();
        $chusqer = factory(Chusqer::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get('/chusqers/'.$chusqer->id);

        $response->assertStatus(200);
        $response->assertSeeText(e($chusqer->content));
    }

    public function testCreateChusqerPageLoads()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/chusqers/create');

        $response->assertStatus(200);
    }
}
