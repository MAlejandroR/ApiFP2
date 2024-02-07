<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CollaborationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "type" => "Collaboration",
            "attributes" => [
                'id' => $this->id,
                'idProject' => $this->idProject,
                'idUser' => $this->idUser,
                'idFamily' => $this->idFamily,
                'isManager' => $this->isManager,
            ],
            "links" => [
                'self' => url("api/collaboration/" . $this->id)
            ]
        ];
    }
    public function with(Request $request)
    {
        return ["jsonapi"=>["version"=>"1.0"]];
    }
}
