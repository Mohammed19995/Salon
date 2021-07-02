<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryDTFResource extends JsonResource
{

    public function toArray($request)
    {
        $name = \GuzzleHttp\json_decode($this->getRawOriginal('name') , False);
        return [
            'id' => $this->id ,
            'name' => $this->name,
            'parent' => new self($this->parent_)
        ];
    }
}
