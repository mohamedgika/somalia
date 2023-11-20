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
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            // 'category_id'=>$this->category_id,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'category' => CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
