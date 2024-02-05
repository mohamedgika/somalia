<?php

namespace App\Models;

use App\Models\Input;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations;


    protected $fillable =[
        'name'
    ];

    public $translatable = ['name'];

    protected $casts = [
        'name' => 'array'
    ];

    public function subCategories(){
        return $this->hasMany(SubCategory::class,'category_id');
    }

    public function shop(){
        return $this->hasMany(Shop::class);
    }

    public function inputs(){
        return $this->hasMany(Input::class,'category_id');
    }

}
