<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $table = "subscriptions";

    protected $fillable = [
        'name',
        'desc',
        'package_details'
    ];

    protected $casts = [
        'package_details'=>'array'
    ];

    public function payments(){
        return $this->hasMany(Payment::class);
    }

}
