<?php

namespace App\Http\Resources\Api\SubScription;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubScriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'desc'=>$this->desc,
            'price'=>$this->price,
            'month'=>$this->month
        ];
    }
}
