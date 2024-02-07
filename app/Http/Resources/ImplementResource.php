<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImplementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "type" => "Implement",
            "attributes" => [
                'id' => $this->id,
                'idProject' => $this->idProject,
                'idTechnology' => $this->idTechnology,
            ],
            "links" => [
                'self' => url("api/implement/" . $this->id)
            ]
        ];
    }
    public function with(Request $request)
    {
        return ["jsonapi"=>["version"=>"1.0"]];
    }
}
