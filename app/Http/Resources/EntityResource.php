<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "type" => "Entity",
            "attributes" => [
                'id' => $this->id,
                'entityName' => $this->entityName,
                'entityCode' => $this->entityCode,
                'web' => $this->web,
                'email' => $this->email,
            ],
            "links" => [
                'self' => url("api/entity/" . $this->id)
            ]

        ];
    }
    public function with(Request $request)
    {
        return ["jsonapi"=>["version"=>"1.0"]];
    }
}
