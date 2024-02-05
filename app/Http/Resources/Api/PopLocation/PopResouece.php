<?php

namespace App\Http\Resources\Api\PopLocation;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PopResouece extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $country = Country::where('name', $this->country)->first(); // Retrieve the Country model instance

        if ($country) {
            $image = $country->getMedia('country'); // Get the media for the country
        } else {
            $image = null; // Handle the case when the country is not found
        }


        return [
            'country' => $this->country,
            'ads_count' => $this->ads_count,
            'image' => $image
        ];
    }
}
