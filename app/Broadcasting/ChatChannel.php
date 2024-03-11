<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;

class ChatChannel extends PrivateChannel
{
    protected $name = 'chat';

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user): array|bool
    {
        return true;
    }
}
