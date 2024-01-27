<?php

namespace App\Models;

use App\Models\User;
use App\Models\Message;
use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'direct_message'];

    protected $casts = [
        'data'           => 'array',
        'direct_message' => 'boolean',
        'private'        => 'boolean',
    ];


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function isUser($user_id)
    {
        $data = $this->users->where('id', $user_id)->first();
        if (!empty($data)) {
            return true;
        }
        return false;
    }

    public function makePrivate($isPrivate = true)
    {
        $this->private = $isPrivate;
        $this->save();
        return $this;
    }

    public function latestMessage(): HasOne
    {
        return $this->hasOne(ChatMessage::class)->latest()->with('sender');
    }
}
