<?php

namespace App\Http\Resources\Api\Notification;

use Illuminate\Http\Request;
use App\Http\Resources\Api\Ads\AdsResource;
use App\Http\Resources\Api\Shop\ShopResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'message' => $this->message,
            'status'=> $this->status,
            'shop' => $this->shop ? ShopResource::make($this->shop) : null,
            'ad' => $this->ad ? AdsResource::make($this->ad->load('subCategory')) : null,
            'created_at' => $this->created_at,
        ];
    }
}
