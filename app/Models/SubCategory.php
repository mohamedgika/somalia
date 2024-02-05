<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations;


    public $translatable = ['name'];

    protected $casts = [
        'name' => 'array'
    ];

    protected $table = 'subcategories';

    protected $fillable = ['name','category_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function ads(){
        return $this->hasMany(Ads::class);
    }

}
