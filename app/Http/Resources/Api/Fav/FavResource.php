<?php

namespace App\Http\Resources\Api\Fav;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\AdDetail\AdDetailResource;
use App\Http\Resources\Api\Ads\AdsResource;

class FavResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (!is_null($this->ads->adDetail) && !is_null($this->ads->adDetail->condition)) {
            $adDetail = [
                'id' => $this->ads->adDetail->id,
                'condition'=>$this->ads->adDetail->condition,
                'brand' => $this->ads->adDetail->brand,
                'color' => $this->ads->adDetail->color,
                'authenticity' => $this->ads->adDetail->authenticity,

            ];
        } else {
            $adDetail = 'null';
        }

        return [
            'id'                => $this->ads->id,
            'name'              => $this->ads->name,
            'price'             => $this->ads->price,
            'image'             => $this->ads->getMedia('ads'),
            'description'       => $this->ads->description,
            'feature'           => $this->ads->feature,
            'country'           => $this->ads->country,
            'state'             => $this->ads->state,
            'city'              => $this->ads->city,
            'location'          => $this->ads->location,
            'is_active'         => $this->ads->is_active,
            'adDetail'          => $adDetail,
        ];
    }
}
