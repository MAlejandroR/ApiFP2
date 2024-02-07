<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TechnologyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "type" => "Technology",
            "attributes" => [
                'id' => $this->id,
                'tag' => $this->tag,
                'techName' => $this->techName,
            ],
            "links" => [
                'self' => url("api/technology/" . $this->id)
            ]

        ];
    }
    public function with(Request $request)
    {
        return ["jsonapi"=>["version"=>"1.0"]];
    }
}
