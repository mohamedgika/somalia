<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Fav;
use App\Models\Chat;
use App\Models\Google;
use App\Models\Payment;
use App\Models\Rateads;
use App\Models\SubScription;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable implements HasMedia ,  JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable , InteractsWithMedia;


    protected $fillable = [
        'name',
        'phone',
        'status',
        'country',
        'state',
        'city',
        'password',
        'code',
        'phone_verified',
        'email',
        'google_id',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];


    public function ads(){
        return $this->hasMany(Ads::class);
    }

    public function shop(){
        return $this->hasOne(Shop::class);
    }

    public function chats(): BelongsToMany
    {
        return $this->belongsToMany(Chat::class);
    }

    public function favs(){
        return $this->hasMany(Fav::class);
    }

    public function subScriptions(){
        return $this->hasMany(SubScription::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function rates(){
        return $this->hasMany(Rateads::class,'user_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function generateCode()
    {
        $this->timestamps = false;
        $this->code = rand(1000, 9999);
        $this->save();
    }

    public function resetcode()
    {
        $this->timestamps = false;
        $this->code = null;
        $this->save();
    }

}
