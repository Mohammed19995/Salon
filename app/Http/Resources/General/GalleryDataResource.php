<?php

namespace App\Http\Resources\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryDataResource extends JsonResource
{

    public function toArray($request)
    {
       return [
           'id'     => $this->id ,
           'src'    => $this->src
       ];
    }
}
