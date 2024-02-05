<?php

namespace App\Http\Resources\Api\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'payment_type' => $this->type,
            'status' => $this->status == 1 ? 'Active' : 'Disactive',
            'subscription' => $this->subscription->where('id',$this->subscription_id)->get(),
        ];
    }
}
