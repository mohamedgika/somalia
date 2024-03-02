<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\Rateads;
use App\Models\AdDetail;
use App\Models\SubCategory;
use App\Models\Notification;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ads extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable = [
        'name',
        'price',
        'description',
        'feature',
        'lang',
        'late',
        'view',
        'country',
        'state',
        'city',
        'is_active',
        'subcategory_id',
        'user_id',
        'shop_id'
    ];

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('ads');
    //     // Add other collections as needed
    // }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }

    public function adDetail(){
        return $this->hasOne(AdDetail::class,'ad_id');
    }

    public function fav(){
        return $this->hasMany(Fav::class,'ad_id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

    public function rates(){
        return $this->hasMany(Rateads::class,'ad_id');
    }

    public function notifications(){
        return $this->hasMany(Notification::class,'ad_id');
    }
}
