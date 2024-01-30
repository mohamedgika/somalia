<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rateads extends Model
{
    use HasFactory;

    protected $table = "rateads";

    protected $fillable = [
        'ad_id',
        'shopad_id',
        'rate',
        'user_id',
    ];

    public function ads()
    {
        return $this->belongsTo(Ads::class,'ad_id');
    }

    public function shopads()
    {
        return $this->belongsTo(ShopAds::class,'shopad_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
