<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubScription extends Model
{
    use HasFactory;

    protected $table = "subscriptions";

    protected $fillable = [
        'name',
        'desc',
        'price',
        'month'
    ];

    public function payments(){
        return $this->hasMany(Payment::class);
    }

}
