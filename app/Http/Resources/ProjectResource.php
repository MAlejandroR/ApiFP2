<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "type" => "Project",
            "attributes" => [
                'id' => $this->id,
                'title' => $this->title,
                'logo' => $this->logo,
                'web' => $this->web,
                'projectDescription' => $this->projectDescription,
                'state' => $this->state,
                'initDate' => $this->initDate,
                'endDate' => $this->endDate,
            ],
            "links" => [
                'self' => url("api/project/" . $this->id)
            ]

        ];
    }
    public function with(Request $request)
    {
        return ["jsonapi"=>["version"=>"1.0"]];
    }
}
