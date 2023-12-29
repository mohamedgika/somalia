<?php

namespace App\Http\Resources\Api\Ads;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Auth\RegisterResource;
use App\Http\Resources\Api\AdDetail\AdDetailResource;
use App\Http\Resources\Api\SubCategory\SubCategoryResource;

class AdsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'price'             => $this->price,
            'image'             => $this->getMedia('ads'),
            'description'       => $this->description,
            'feature'           => $this->feature,
            'country'           => $this->country,
            'state'             => $this->state,
            'city'              => $this->city,
            'location'          => $this->location,
            'is_active'         => $this->is_active,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'adDetail'          => AdDetailResource::make($this->whenLoaded('adDetail')),
            'subcategory'       => SubCategoryResource::make($this->whenLoaded('subCategory')->load('category')),
            'user'              => RegisterResource::make($this->whenLoaded('user')),
        ];
    }
}
