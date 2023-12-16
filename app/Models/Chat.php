<?php

namespace App\Models;

use App\Models\User;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id_1","user_id_2"
    ];

    public function user_1(){
        return $this->belongsTo(User::class,'user_id_1');
    }

    public function user_2(){
        return $this->belongsTo(User::class,'user_id_2');
    }

    public function message(){
        return $this->hasMany(Message::class);
    }

}
