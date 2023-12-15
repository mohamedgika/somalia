<?php

namespace App\Models;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fav extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ad_id'
    ];

    public function ads(){
        return $this->belongsTo(Ads::class, 'ad_id');
    }
}
