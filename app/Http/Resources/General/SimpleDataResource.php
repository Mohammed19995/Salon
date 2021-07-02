<?php

namespace App\Http\Resources\General;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleDataResource extends JsonResource
{

    public function toArray($request)
    {
       return [
           'id'     => $this->id ,
           'name'   => $this->name
       ];
    }
}
