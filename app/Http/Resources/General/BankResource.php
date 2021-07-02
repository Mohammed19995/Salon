<?php

namespace App\Http\Resources\General;

use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
{

    public function toArray($request)
    {
       return [
           'id'             => $this->id ,
           'name'           => $this->name,
           'account_number' => $this->account_number,
           'iban'           => $this->iban,
       ];
    }
}
