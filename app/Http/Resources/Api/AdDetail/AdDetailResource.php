<?php

namespace App\Http\Resources\Api\AdDetail;

use App\Http\Resources\Api\Ads\AdsResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"    => $this->id,
            'condition' => $this->condition,
            'model' => $this->model,
            'brand' => $this->brand,
            'color' => $this->color,
            'authenticity' => $this->authenticity,
            'ad' => AdsResource::make($this->whenLoaded('ads'))
        ];
    }
}
