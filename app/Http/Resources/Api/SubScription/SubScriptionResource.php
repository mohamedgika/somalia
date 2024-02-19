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
            'id'=>$this->id,
            'name'=>$this->name,
            'desc'=>$this->desc,
            'package_details'=>$this->package_details,
        ];
    }
}
