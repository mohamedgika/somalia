<?php

namespace App\Http\Resources\Api\MyShop;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Auth\RegisterResource;
use App\Http\Resources\Api\ShopAds\ShopAdsResource;
use App\Http\Resources\Api\Category\CategoryResource;

class MyShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'image'         => $this->getMedia('shop'),
            'lang'      => $this->lang,
            'late'      => $this->late,
            'phone'         => $this->phone,
            'description'   => $this->description,
            'is_active'     => $this->is_active,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'shopAd'        => ShopAdsResource::collection($this->whenLoaded('shopAds')),
            'category'      => CategoryResource::make($this->whenLoaded('categories')),
        ];
    }
}
