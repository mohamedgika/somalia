<?php

namespace App\Http\Resources\Api\ShopAds;

use App\Models\Fav;
use Illuminate\Http\Request;
use App\Models\ShopAdsDetail;
use App\Http\Resources\Api\Shop\ShopResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Auth\RegisterResource;
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
        // Check if $this is not null and has an 'id' property
        if (auth()->user())
            $fav = Fav::where('shopad_id', $this->id)->where('user_id', auth()->user()->id)->exists();

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
            'fav'               => $fav ?? false,
            'is_active'         => $this->is_active,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'shopAdDetail'      => ShopAdsDetailResource::make($this->whenLoaded('shopAdsDetail')),
            'shop'              => ShopResource::make($this->whenLoaded('shop')),
            'user'              => RegisterResource::make($this->shop)
        ];
    }
}
