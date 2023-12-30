<?php

namespace App\Http\Resources\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'phone'   => $this->phone,
            'email'   => $this->email,
            'country' => $this->country,
            'state'   => $this->state,
            'city'    => $this->city,
            'phone_verified' =>$this->phone_verified,
            'email_verified_at'=>$this->email_verified_at,
        ];
    }
}
