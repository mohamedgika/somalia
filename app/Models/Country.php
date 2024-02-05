<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $table = "countries";
    protected $fillable = [
        'code',
        'name',
        'phonecode',
        'currency'
    ];
}
