<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => (string)$this->id,
            "type" => "User",
            "attributes" => [

                'id' => $this->id,
                'login' => $this->login,
                'userName' => $this->userName,
                'surname' => $this->surname,
                'email' => $this->email,
                'linkedIn' => $this->linkedIn,
                'idEntity' => $this->idEntity,
            ],
            "links" => [
                'self' => url("api/user/" . $this->id)
            ]


        ];
    }
    public function with(Request $request)
    {
        return ["jsonapi"=>["version"=>"1.0"]];
    }
}
