<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'               => $this->id ,
            'name'             => $this->name,
            'image'            => $this->image ,
            'get_parents'      => self::collection(collect($this->get_parents)),
            'get_children'     => self::collection(collect($this->get_children)),
            'get_parents_name' => $this->get_parents_name,
            'products_url'     => url('')."?category_id=".$this->id,
        ];
    }
}
