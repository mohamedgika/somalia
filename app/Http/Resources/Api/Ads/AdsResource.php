<?php

namespace App\Http\Resources\Api\Ads;

use App\Models\Fav;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Auth\RegisterResource;
use App\Http\Resources\Api\AdDetail\AdDetailResource;
use App\Http\Resources\Api\Shop\ShopResource;
use App\Http\Resources\Api\SubCategory\SubCategoryResource;
use App\Models\Rateads;

class AdsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        // Check if $this is not null and has an 'id' property
        if (auth()->user())
            $fav = Fav::where('ad_id', $this->id)->where('user_id', auth()->user()->id)->exists();

        if (auth()->user())
            $user_rate = Rateads::where('ad_id', $this->id)->where('user_id', auth()->user()->id)->first();

        if (auth()->user())
            $total_rate = Rateads::where('ad_id', $this->id)->avg('rate');

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'price'         => $this->price,
            'image'         => $this->getMedia('ads'),
            'description'   => $this->description,
            'feature'       => $this->feature,
            'country'       => $this->country,
            'state'         => $this->state,
            'city'          => $this->city,
            'lang'          => $this->lang,
            'late'          => $this->late,
            'is_active'     => $this->is_active,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'fav'           => $fav ?? false,
            'user_rate'     => $user_rate->rate ?? 0,
            'total_rate'    => (int)$total_rate ?? 0,
            'adDetail'      => AdDetailResource::make($this->adDetail),
            'subcategory'   => SubCategoryResource::make($this->whenLoaded('subCategory')->load('category')),
            'shop'          => ShopResource::make($this->whenLoaded('shop')),
            'user'          => RegisterResource::make($this->whenLoaded('user')),
        ];
    }
}
