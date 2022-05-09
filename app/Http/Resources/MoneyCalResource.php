<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MoneyCalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            '500'=>$this->fiveHundred,
            '100'=>$this->oneHundred,
            '50'=>$this->fifty,
            '10'=>$this->ten,
            '5'=>$this->five,
            '1'=>$this->one,
        ];
    }
}
