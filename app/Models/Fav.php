<?php

namespace App\Models;

use App\Models\Ads;
use App\Models\User;
use App\Models\ShopAds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fav extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ad_id',
        'shopad_id'
    ];

    public function ads(){
        return $this->belongsTo(Ads::class, 'ad_id');
    }

    public function shopads(){
        return $this->belongsTo(ShopAds::class, 'shopad_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
