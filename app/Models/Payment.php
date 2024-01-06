<?php

namespace App\Models;

use App\Models\User;
use App\Models\SubScription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type','status','user_id','subscription_id','expire_at'
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
     }

     public function subscription(){
        return $this->belongsTo(SubScription::class,'subscription_id');
     }
}
