<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleProviderLogin extends Model
{
    use HasFactory;
    protected $fillable = ['google','google_id','user_id','avatar'];
    protected $hidden = ['created_at','updated_at'];
}
