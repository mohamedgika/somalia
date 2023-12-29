<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Chat;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use App\Models\GoogleProviderLogin;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject , HasMedia
{
    use HasApiTokens, HasFactory, Notifiable , InteractsWithMedia;


    protected $fillable = [
        'name',
        'phone',
        'email',
        'country',
        'state',
        'city',
        'password',
        'code',
        'phone_verified',
        'status'
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

    public function chat(){
        return $this->hasMany(Chat::class);
    }

    public function googles()
    {
        return $this->hasMany(GoogleProviderLogin::class,'user_id','id');
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
