<?php

namespace App\Models;

use App\Models\ShopAds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShopAdsDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_ad_detail',
        'shop_ad_id'
    ];

    protected $casts = [
        'shop_ad_detail'=>'array'
    ];

    public function shopAd(){
        return $this->belongsTo(ShopAds::class);
    }

}
