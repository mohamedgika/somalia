<?php

namespace App\Http\Resources\Api\Input;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Category\CategoryResource;

class InputResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'inputs'   => json_decode($this->inputs),
            'category' => CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
