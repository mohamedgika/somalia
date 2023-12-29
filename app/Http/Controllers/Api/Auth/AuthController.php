<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Notifications\OtpNotificate;
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
        $this->middleware('auth:api'); // login, register methods won't go through the api guard
    }

    public function redirectToGoole($google)
    {
        $validated = $this->validateGoogle($google);
        if (!is_null($validated)) {
            return $validated;
        }

        return Socialite::driver($google)->stateless()->redirect();
    }

    public function handleGoogleCallback($google)
    {
        $validated = $this->validateGoogle($google);
        if (!is_null($validated)) {
            return $validated;
        }
        try {
            $user = Socialite::driver($google)->stateless()->user();
        } catch (ClientException $exception) {
            return response()->json(['error' => 'Invalid credentials provided.'], 422);
        }

        $userCreated = User::firstOrCreate(
            [
                'email' => $user->getEmail()
            ],
            [
                'email_verified_at' => now(),
                'name' => $user->getName(),
                'status' => true,
            ]
        );
        $userCreated->googles()->updateOrCreate(
            [
                'google' => $google,
                'google_id' => $user->getId(),
            ],
            [
                'avatar' => $user->getAvatar()
            ]
        );
        $token = $userCreated->createToken('token-name')->plainTextToken;

        return response()->json($userCreated, 200, ['Access-Token' => $token]);
    }

    protected function validateGoogle($google)
    {
        if (!in_array($google, ['google'])) {
            return response()->json(['error' => 'Please login using google'], 422);
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

        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'تم تسجيل الخروج']);
    }

}
