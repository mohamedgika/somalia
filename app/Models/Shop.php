<?php

namespace App\Models;

use App\Models\Ads;
use App\Models\User;
use App\Models\ShopAds;
use App\Models\Category;
use App\Models\Notification;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable = [
        'name',
        'lang',
        'late',
        'phone',
        'is_active',
        'description',
        'user_id',
    ];

    public function ads(){
        return $this->hasMany(Ads::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function notifications(){
        return $this->hasMany(Notification::class,'shop_id');
    }
}
