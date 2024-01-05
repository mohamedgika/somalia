<?php

namespace App\Http\Resources\Api\Fav;

use Illuminate\Http\Request;
use App\Http\Resources\Api\Ads\AdsResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Auth\RegisterResource;
use App\Http\Resources\Api\AdDetail\AdDetailResource;
use App\Http\Resources\Api\SubCategory\SubCategoryResource;

class FavResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
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
            'adDetail'          => AdDetailResource::make($this->ads->adDetail),
            'subcategory'       => SubCategoryResource::make($this->ads->subCategory->load('category')),
            'user'              => RegisterResource::make($this->whenLoaded('user')),

        ];
    }
}
