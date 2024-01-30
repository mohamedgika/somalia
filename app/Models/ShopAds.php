<?php

namespace App\Models;

use App\Models\Fav;
use App\Models\Rateads;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShopAds extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
    protected $fillable = [
        'name',
        'price',
        'description',
        'feature',
        'lang',
        'late',
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

    public function fav(){
        return $this->hasMany(Fav::class,'shopad_id');
    }

    public function rates(){
        return $this->hasMany(Rateads::class,'shopad_id');
    }
}
