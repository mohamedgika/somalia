<?php

namespace App\Http\Resources\Api\SubCategory;

use App\Http\Resources\Api\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
            'id'=>$this->id,
            'name' => $this->getTranslation('name',$locale),
            'image'=>$this->getMedia('subcategory'),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'category' => CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
