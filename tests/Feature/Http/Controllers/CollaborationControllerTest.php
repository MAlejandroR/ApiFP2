<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Collaboration;
use App\Models\Families;
use App\Models\Projects;
use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CollaborationController
 */
final class CollaborationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $collaborations = Collaboration::factory()->count(3)->create();

        $response = $this->get(route('collaboration.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CollaborationController::class,
            'store',
            \App\Http\Requests\CollaborationControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $projects = Projects::factory()->create();
        $users = Users::factory()->create();
        $families = Families::factory()->create();
        $isManager = $this->faker->boolean();

        $response = $this->post(route('collaboration.store'), [
            'projects_id' => $projects->id,
            'users_id' => $users->id,
            'families_id' => $families->id,
            'isManager' => $isManager,
        ]);

        $collaborations = Collaboration::query()
            ->where('projects_id', $projects->id)
            ->where('users_id', $users->id)
            ->where('families_id', $families->id)
            ->where('isManager', $isManager)
            ->get();
        $this->assertCount(1, $collaborations);
        $collaboration = $collaborations->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $collaboration = Collaboration::factory()->create();

        $response = $this->get(route('collaboration.show', $collaboration));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CollaborationController::class,
            'update',
            \App\Http\Requests\CollaborationControllerUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $collaboration = Collaboration::factory()->create();
        $projects = Projects::factory()->create();
        $users = Users::factory()->create();
        $families = Families::factory()->create();
        $isManager = $this->faker->boolean();

        $response = $this->put(route('collaboration.update', $collaboration), [
            'projects_id' => $projects->id,
            'users_id' => $users->id,
            'families_id' => $families->id,
            'isManager' => $isManager,
        ]);

        $collaboration->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($projects->id, $collaboration->projects_id);
        $this->assertEquals($users->id, $collaboration->users_id);
        $this->assertEquals($families->id, $collaboration->families_id);
        $this->assertEquals($isManager, $collaboration->isManager);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $collaboration = Collaboration::factory()->create();

        $response = $this->delete(route('collaboration.destroy', $collaboration));

        $response->assertNoContent();

        $this->assertModelMissing($collaboration);
    }



}
