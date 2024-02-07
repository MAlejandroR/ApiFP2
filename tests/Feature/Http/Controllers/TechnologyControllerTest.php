<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Technology;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TechnologyController
 */
final class TechnologyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $technologies = Technology::factory()->count(3)->create();

        $response = $this->get(route('technology.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TechnologyController::class,
            'store',
            \App\Http\Requests\TechnologyControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $tag = $this->faker->word();
        $techName = $this->faker->word();

        $response = $this->post(route('technology.store'), [
            'tag' => $tag,
            'techName' => $techName,
        ]);

        $technologies = Technology::query()
            ->where('tag', $tag)
            ->where('techName', $techName)
            ->get();
        $this->assertCount(1, $technologies);
        $technology = $technologies->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $technology = Technology::factory()->create();

        $response = $this->get(route('technology.show', $technology));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TechnologyController::class,
            'update',
            \App\Http\Requests\TechnologyControllerUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $technology = Technology::factory()->create();
        $tag = $this->faker->word();
        $techName = $this->faker->word();

        $response = $this->put(route('technology.update', $technology), [
            'tag' => $tag,
            'techName' => $techName,
        ]);

        $technology->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($tag, $technology->tag);
        $this->assertEquals($techName, $technology->techName);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $technology = Technology::factory()->create();

        $response = $this->delete(route('technology.destroy', $technology));

        $response->assertNoContent();

        $this->assertModelMissing($technology);
    }


    #[Test]
    public function methods_behaves_as_expected(): void
    {
        $response = $this->get(route('technology.methods'));
    }
}
