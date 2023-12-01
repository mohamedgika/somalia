<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'condition',
        'model',
        'brand',
        'color',
        'authenticity',
        'ad_id'
    ];

    public function ads(){
        return $this->belongsTo(Ads::class);
    }
}
