<?php

namespace App\Http\Resources\Api\Slider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->getMedia('slider'),
            'desc'=>$this->desc,
            'link'=>$this->link,
        ];
    }
}
