<?php

namespace App\Http\Resources\Api\Chat;

use App\Http\Resources\Api\Auth\RegisterResource;
use Illuminate\Http\Request;
use App\Http\Resources\Api\Chat\MassageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $latestMessage = $this->latestMessage;

        return [
            'id' => $this->id,
            'private' => $this->private,
            'direct_message' => $this->direct_message,
            'created_at' => $this->created_at,
            'users' => RegisterResource::collection($this->users),
            'latest_message' => $latestMessage ? [
                'message' => $latestMessage->message,
                'sender' => RegisterResource::make($latestMessage->sender)
            ] : null
        ];
    }
}
