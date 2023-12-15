<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_detail',
        'ad_id'
    ];

    protected $casts = [
        'ad_detail' => 'array'
    ];

    public function ads(){
        return $this->belongsTo(Ads::class);
    }
}
