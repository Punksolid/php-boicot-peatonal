<?php

namespace Tests\Feature;

use App\Models\Prospect;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProspectTest extends TestCase
{

    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /**
     * A basic feature test example.
     */
    public function test_show_form(): void
    {
        $call = $this->get('/prospects/create');
        $call->assertStatus(200);

        /** @var Prospect $prospect */
        $prospect = Prospect::factory()->make();

        $attributes = $prospect->getAttributes();
        unset($attributes['is_active']);
        unset($attributes['reporter_email']);
        unset($attributes['image_url']);
        foreach (array_keys($attributes) as $key) {
            $call->assertSee($key);
        }

    }

    public function test_store_prospect(): void
    {

        $prospect = Prospect::factory()->make([
            'cover-photo' => UploadedFile::fake()->create('file.jpg', 500)
        ]);
        $attributes = $prospect->getAttributes();
        unset($attributes['is_active']);
        unset($attributes['reporter_email']);
        unset($attributes['image_url']);
        unset($attributes['cover-photo']);

        $call = $this->post('/prospects', $prospect->toArray());
        $call->assertStatus(302);
        $call->assertRedirect('/prospects');
        $this->assertDatabaseHas('prospects', $attributes);

    }

    public function test_api_can_delete_prospect()
    {
        $prospect = Prospect::factory()->create([
            'reporter_email' => $this->user->email
        ]);
        $call = $this->delete(route('api.prospects.destroy', $prospect->id));
        $call->assertStatus(200);
    }
}
