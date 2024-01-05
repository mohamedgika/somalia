<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Notifications\OtpNotificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Api\Auth\LoginResource;
use App\Http\Resources\Api\Auth\RegisterResource;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register','redirectToGoogle','handleGoogleCallback']]); // login, register methods won't go through the api guard
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $userCreated = User::updateOrCreate(
                [
                    'google_id' => $user->getId(),
                ],
                [
                    'email' => $user->getEmail(),
                    'email_verified_at' => now(),
                    'name' => $user->getName(),
                ]
            );


        // Generate a token manually
        $token = $userCreated->createToken('token-name')->plainTextToken;
        return response()->json(['token' => $token]);

        } catch (ClientException $exception) {
            return response()->json(['error' => 'Invalid credentials provided.'], 422);
        }
    }

    public function login(LoginRequest $request)
    {
        // Should check phone_verified = 1

        if (! $token = auth()->guard('api')->attempt(['phone'=> $request->phone , 'password'=>$request->password]))
            return response()->json(['error' => 'الرجاء التأكد من البيانات الصحيحة'], 401);

        $token =  [ 'token' =>  $token , 'expire_at' => auth()->guard('api')->factory()->getTTL() * 100 ];
        return responseSuccessData(LoginResource::make($token),'تم تسجيل الدخول بنجاح');

    }

    public function register(RegisterRequest $request)
    {
        $code_phone = $request->code_phone;
        $phone = $request->phone;

        $user = User::create([
            'name'     =>$request->get('name'),
            'image'    =>$request->get('image'),
            'phone'    =>'+'.$code_phone.$phone,
            'country'  =>$request->get('country'),
            'state'    =>$request->get('state'),
            'city'     =>$request->get('city'),
            'password' => Hash::make($request->get('password')),
        ] + $request->validated());

        // $user->generateCode();
        // $user->notify(new OtpNotificate());

        // $token = JWTAuth::fromUser($user);

        return responseSuccessData(RegisterResource::make($user),'تم ارسال رمز التحقق');
    }

    public function getaccount()
    {
        if( ! auth()->user() )
            return response()->json(['error' => 'Unauthorized Access']);
            $user = User::where('id',auth()->user()->id)->first();

            return responseSuccessData(RegisterResource::make($user));
        }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'تم تسجيل الخروج']);
    }

}
