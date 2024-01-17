<?php

namespace App\Http\Resources\Api\ShopAds;

use Illuminate\Http\Request;
use App\Models\ShopAdsDetail;
use App\Http\Resources\Api\Shop\ShopResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\ShopAdsDetail\ShopAdsDetailResource;

class ShopAdsResource extends JsonResource
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
            'image'             => $this->getMedia('shopads'),
            'description'       => $this->description,
            'feature'           => $this->feature,
            'country'           => $this->country,
            'state'             => $this->state,
            'city'              => $this->city,
            'lang'      => $this->lang,
            'late'      => $this->late,
            'is_active'         => $this->is_active,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'shopAdDetail'      => ShopAdsDetailResource::make($this->whenLoaded('shopAdsDetail')),
            'shop'              => ShopResource::make($this->whenLoaded('shop')->load('user')),
        ];
    }
}
