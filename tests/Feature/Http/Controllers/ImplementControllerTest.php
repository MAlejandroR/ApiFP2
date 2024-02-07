<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Implement;
use App\Models\Projects;
use App\Models\Technologies;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ImplementController
 */
final class ImplementControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $implements = Implement::factory()->count(3)->create();

        $response = $this->get(route('implement.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ImplementController::class,
            'store',
            \App\Http\Requests\ImplementControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $projects = Projects::factory()->create();
        $technologies = Technologies::factory()->create();

        $response = $this->post(route('implement.store'), [
            'projects_id' => $projects->id,
            'technologies_id' => $technologies->id,
        ]);

        $implements = Implement::query()
            ->where('projects_id', $projects->id)
            ->where('technologies_id', $technologies->id)
            ->get();
        $this->assertCount(1, $implements);
        $implement = $implements->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $implement = Implement::factory()->create();

        $response = $this->get(route('implement.show', $implement));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ImplementController::class,
            'update',
            \App\Http\Requests\ImplementControllerUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $implement = Implement::factory()->create();
        $projects = Projects::factory()->create();
        $technologies = Technologies::factory()->create();

        $response = $this->put(route('implement.update', $implement), [
            'projects_id' => $projects->id,
            'technologies_id' => $technologies->id,
        ]);

        $implement->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($projects->id, $implement->projects_id);
        $this->assertEquals($technologies->id, $implement->technologies_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $implement = Implement::factory()->create();

        $response = $this->delete(route('implement.destroy', $implement));

        $response->assertNoContent();

        $this->assertModelMissing($implement);
    }


    #[Test]
    public function methods_behaves_as_expected(): void
    {
        $response = $this->get(route('implement.methods'));
    }
}
