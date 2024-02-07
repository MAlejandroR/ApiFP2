<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FamilyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "type" => "Family",
            "attributes" => [
                'id' => $this->id,
                'familyCode' => $this->familyCode,
                'familyName' => $this->familyName,
            ],
            "links" => [
                'self' => url("api/family/" . $this->id)
            ]

        ];
    }
    public function with(Request $request)
    {
        return ["jsonapi"=>["version"=>"1.0"]];
    }
}
