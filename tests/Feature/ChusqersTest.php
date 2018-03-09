<?php

namespace Tests\Feature;

use App\Chusqer;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChusqersTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Inserción incorrecta de chusqer
     */
    public function testCreateNewChusqerFault()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->post('/chusqers/create', [
            'content' => '',
            'image' => UploadedFile::fake()->image('imagen.jpg'),
        ]);

        $response->assertSessionHas('errors');
    }

    /**
     *
     */
    public function testCreateNewChusqer()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->post('/chusqers/create', [
            'content' => 'Texto de prueba',
            'image' => UploadedFile::fake()->image('imagen.jpg'),
        ]);

        $this->assertDatabaseHas('chusqers', [
            'content' => 'Texto de prueba'
        ]);
    }

    public function testCreateChusqerPageLoads()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/chusqers/create');

        $response->assertStatus(200);
    }

    public function testUpdateChusqerFault()
    {
        $user = factory(User::class)->create();
        $chusqer = factory(Chusqer::class)->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->patch('/chusqers/'.$chusqer->id, [
            'content' => '',
            'image' => UploadedFile::fake()->image('imagen.jpg'),
        ]);

        $response->assertSessionHas('errors');
    }

    public function testUpdateChusqer()
    {
        $user = factory(User::class)->create();
        $chusqer = factory(Chusqer::class)->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $this->patch('/chusqers/'.$chusqer->id, [
            'content' => 'Contenido actualizado',
            'image' => UploadedFile::fake()->image('imagen.jpg'),
        ]);

        $this->assertDatabaseHas('chusqers', [
            'id'        => $chusqer->id,
            'content' => 'Contenido actualizado',
        ]);
    }
}
