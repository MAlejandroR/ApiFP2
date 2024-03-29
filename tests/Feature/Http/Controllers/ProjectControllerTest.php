<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProjectController
 */
final class ProjectControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $projects = Project::factory()->count(3)->create();

        $response = $this->get(route('project.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectController::class,
            'store',
            \App\Http\Requests\ProjectControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $title = $this->faker->sentence(4);
        $state = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('project.store'), [
            'title' => $title,
            'state' => $state,
        ]);

        $projects = Project::query()
            ->where('title', $title)
            ->where('state', $state)
            ->get();
        $this->assertCount(1, $projects);
        $project = $projects->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $project = Project::factory()->create();

        $response = $this->get(route('project.show', $project));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectController::class,
            'update',
            \App\Http\Requests\ProjectControllerUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $project = Project::factory()->create();
        $title = $this->faker->sentence(4);
        $state = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('project.update', $project), [
            'title' => $title,
            'state' => $state,
        ]);

        $project->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $project->title);
        $this->assertEquals($state, $project->state);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $project = Project::factory()->create();

        $response = $this->delete(route('project.destroy', $project));

        $response->assertNoContent();

        $this->assertModelMissing($project);
    }


    #[Test]
    public function methods_behaves_as_expected(): void
    {
        $response = $this->get(route('project.methods'));
    }
}
