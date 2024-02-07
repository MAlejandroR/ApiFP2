<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Family;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FamilyController
 */
final class FamilyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $families = Family::factory()->count(3)->create();

        $response = $this->get(route('family.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FamilyController::class,
            'store',
            \App\Http\Requests\FamilyControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $familyCode = $this->faker->word();
        $familyName = $this->faker->word();

        $response = $this->post(route('family.store'), [
            'familyCode' => $familyCode,
            'familyName' => $familyName,
        ]);

        $families = Family::query()
            ->where('familyCode', $familyCode)
            ->where('familyName', $familyName)
            ->get();
        $this->assertCount(1, $families);
        $family = $families->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $family = Family::factory()->create();

        $response = $this->get(route('family.show', $family));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FamilyController::class,
            'update',
            \App\Http\Requests\FamilyControllerUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $family = Family::factory()->create();
        $familyCode = $this->faker->word();
        $familyName = $this->faker->word();

        $response = $this->put(route('family.update', $family), [
            'familyCode' => $familyCode,
            'familyName' => $familyName,
        ]);

        $family->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($familyCode, $family->familyCode);
        $this->assertEquals($familyName, $family->familyName);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $family = Family::factory()->create();

        $response = $this->delete(route('family.destroy', $family));

        $response->assertNoContent();

        $this->assertModelMissing($family);
    }


    #[Test]
    public function methods_behaves_as_expected(): void
    {
        $response = $this->get(route('family.methods'));
    }
}
