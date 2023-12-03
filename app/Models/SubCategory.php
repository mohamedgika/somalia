<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SubCategory extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $table = 'subcategories';

    protected $fillable = ['name','category_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function ads(){
        return $this->hasMany(Ads::class);
    }

}
