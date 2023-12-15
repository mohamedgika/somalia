<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Input extends Model
{
    use HasFactory;

    // protected $table = "categories";

    protected $fillable = [
        'inputs','category_id'
    ];

    protected $casts = [
        'inputs' => 'array'
    ];

    public function category(){
       return $this->belongsTo(Category::class,'category_id');
    }

}
