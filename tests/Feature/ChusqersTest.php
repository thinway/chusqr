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
        $response->assertSee($chusqer->content);
    }
}
