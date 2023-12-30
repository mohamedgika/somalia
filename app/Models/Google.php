<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Google extends Model
{
    use HasFactory;
    protected $fillable = ['google','google_id','user_id','avatar'];
    protected $hidden = ['created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
