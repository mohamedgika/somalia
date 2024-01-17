<?php

namespace App\Models;

use App\Models\User;
use App\Models\ShopAds;
use App\Models\Category;
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
        'category_id'
    ];


    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function shopAds(){
        return $this->hasMany(ShopAds::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
