<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Favourite;
use App\Models\Projects;
use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FavouriteController
 */
final class FavouriteControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $favourites = Favourite::factory()->count(3)->create();

        $response = $this->get(route('favourite.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FavouriteController::class,
            'store',
            \App\Http\Requests\FavouriteControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $projects = Projects::factory()->create();
        $users = Users::factory()->create();

        $response = $this->post(route('favourite.store'), [
            'projects_id' => $projects->id,
            'users_id' => $users->id,
        ]);

        $favourites = Favourite::query()
            ->where('projects_id', $projects->id)
            ->where('users_id', $users->id)
            ->get();
        $this->assertCount(1, $favourites);
        $favourite = $favourites->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $favourite = Favourite::factory()->create();

        $response = $this->get(route('favourite.show', $favourite));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FavouriteController::class,
            'update',
            \App\Http\Requests\FavouriteControllerUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $favourite = Favourite::factory()->create();
        $projects = Projects::factory()->create();
        $users = Users::factory()->create();

        $response = $this->put(route('favourite.update', $favourite), [
            'projects_id' => $projects->id,
            'users_id' => $users->id,
        ]);

        $favourite->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($projects->id, $favourite->projects_id);
        $this->assertEquals($users->id, $favourite->users_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $favourite = Favourite::factory()->create();

        $response = $this->delete(route('favourite.destroy', $favourite));

        $response->assertNoContent();

        $this->assertModelMissing($favourite);
    }


    #[Test]
    public function methods_behaves_as_expected(): void
    {
        $response = $this->get(route('favourite.methods'));
    }
}
