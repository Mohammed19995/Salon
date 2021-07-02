<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\General\SimpleDataResource;

class UserResource extends JsonResource
{
    public $data;

    public function __construct($resource, $data = null)
    {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->data = $data;
    }

    public function toArray($request)
    {
        $data = [
            'id'          => $this->id,
            'name'        => $this->name,
            'image'       => $this->image,
            'phone_code'  => $this->phone_code,
            'phone'       => $this->phone,
            'email'       => $this->email,
            'city'        => new SimpleDataResource($this->city),
            'is_verified' => !is_null($this->verified_at) ? true : false ,
            'type'        => $this->type,
            'is_active'   => $this->status == 1,
        ];
       // if($this->data) $data['token'] = $this->data->token;
        return $data;
    }

}
