<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavouriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            "id" => (string)$this->id,
            "type" => "Favourite",
            "attributes" => [
                'id' => $this->id,
                'idProject' => $this->idProject,
                'idUser' => $this->idUser,
            ],
            "links" => [
                'self' => url("api/favourite/" . $this->id)
            ]
        ];
    }
    public function with(Request $request)
    {
        return ["jsonapi"=>["version"=>"1.0"]];
    }
}
