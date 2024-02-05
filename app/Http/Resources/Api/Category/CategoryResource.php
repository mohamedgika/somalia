<?php

namespace App\Http\Resources\Api\Category;

use App\Http\Resources\Api\SubCategory\SubCategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($request->header('locale')){
            $locale = $request->header('locale');

            app()->setLocale($locale);
            //  Get language
            $locale = app()->getLocale();
        }else{
            $locale = app()->getLocale();
        }

        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name',$locale),
            'image' => $this->getMedia('category'),
            'created_at' => $this->created_at->format('Y m d'),
            'updated_at' => $this->updated_at->format('Y m d'),
            'subcategory' => SubCategoryResource::collection($this->whenLoaded('subcategories')),
        ];
    }
}
