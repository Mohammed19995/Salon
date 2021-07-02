<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\General\SimpleDataResource;

class UserListResource extends JsonResource
{
    public $data;

    public function __construct($resource, $data = null)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name
        ];
    }

}
