<?php

namespace App\Models;

use App\Models\Ads;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'message',
        'status',
        'ad_id',
        'shop_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ad()
    {
        return $this->belongsTo(Ads::class,'ad_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
