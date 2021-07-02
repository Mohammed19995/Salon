<?php

namespace App\Http\Resources\General;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'     => $this->id ,
            'name'   => $this->name ,
            'flag'   => $this->flag ,
            'phone'  => $this->phone_code
        ];
    }
}
