<?php
namespace App\Http\Resources\Api\Ads;

use App\Models\Fav;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Auth\RegisterResource;
use App\Http\Resources\Api\AdDetail\AdDetailResource;
use App\Http\Resources\Api\SubCategory\SubCategoryResource;

class AdsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        // Check if $this is not null and has an 'id' property
        if(auth()->user())
            $fav = Fav::where('ad_id', $this->id)->where('user_id', auth()->user()->id)->exists();

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
            'lang'      => $this->lang,
            'late'      => $this->late,
            'is_active'     => $this->is_active,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'fav'           => $fav ?? false,
            'adDetail'      => AdDetailResource::make($this->whenLoaded('adDetail')),
            'subcategory'   => SubCategoryResource::make($this->whenLoaded('subCategory')->load('category')),
            'user'          => RegisterResource::make($this->whenLoaded('user')),
        ];
    }
}
