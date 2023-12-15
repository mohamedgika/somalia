<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ShopAds extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
    protected $fillable = [
        'name',
        'price',
        'description',
        'feature',
        'location',
        'country',
        'state',
        'city',
        'is_active',
        'shop_id'
    ];

    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

    public function shopAdsDetail(){
        return $this->hasOne(ShopAdsDetail::class,'shop_ad_id');
    }
}
