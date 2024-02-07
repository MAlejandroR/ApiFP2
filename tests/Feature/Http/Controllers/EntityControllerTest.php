<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Entity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EntityController
 */
final class EntityControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $entities = Entity::factory()->count(3)->create();

        $response = $this->get(route('entity.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EntityController::class,
            'store',
            \App\Http\Requests\EntityControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $entityName = $this->faker->word();
        $entityCode = $this->faker->word();

        $response = $this->post(route('entity.store'), [
            'entityName' => $entityName,
            'entityCode' => $entityCode,
        ]);

        $entities = Entity::query()
            ->where('entityName', $entityName)
            ->where('entityCode', $entityCode)
            ->get();
        $this->assertCount(1, $entities);
        $entity = $entities->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $entity = Entity::factory()->create();

        $response = $this->get(route('entity.show', $entity));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EntityController::class,
            'update',
            \App\Http\Requests\EntityControllerUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $entity = Entity::factory()->create();
        $entityName = $this->faker->word();
        $entityCode = $this->faker->word();

        $response = $this->put(route('entity.update', $entity), [
            'entityName' => $entityName,
            'entityCode' => $entityCode,
        ]);

        $entity->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($entityName, $entity->entityName);
        $this->assertEquals($entityCode, $entity->entityCode);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $entity = Entity::factory()->create();

        $response = $this->delete(route('entity.destroy', $entity));

        $response->assertNoContent();

        $this->assertModelMissing($entity);
    }


    #[Test]
    public function methods_behaves_as_expected(): void
    {
        $response = $this->get(route('entity.methods'));
    }
}
