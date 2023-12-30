<?php

namespace App\Http\Resources\Api\Shop;

use App\Http\Resources\Api\Auth\RegisterResource;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\ShopAds\ShopAdsResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            =>$this->id,
            'name'          =>$this->name,
            'image'         =>$this->getMedia('shop'),
            'location'      =>$this->location,
            'phone'         =>$this->phone,
            'description'   =>$this->description,
            'is_active'     =>$this->is_active,
            'created_at'    =>$this->created_at,
            'updated_at'    =>$this->updated_at,
            'shopAd'        =>ShopAdsResource::make($this->whenLoaded('shopAds')),
            'category'      =>CategoryResource::make($this->whenLoaded('categories')),
            'user'          =>RegisterResource::make($this->whenLoaded('user')),
        ];
    }
}
