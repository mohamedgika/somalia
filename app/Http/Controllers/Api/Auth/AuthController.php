<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Notifications\OtpNotificate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Exception\ClientException;
use App\Http\Resources\Api\Auth\LoginResource;
use App\Http\Resources\Api\Auth\RegisterResource;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'redirectToGoogle', 'handleGoogleCallback']]); // login, register methods won't go through the api guard
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

            // $image = $user->getAvatar();

            // $userCreated->clearMediaCollection('profileauth', 'profileauth');
            // $userCreated->addMediaFromUrl($image)->toMediaCollection('profileauth', 'profileauth');


            // Generate a token manually
            $token = JWTAuth::fromUser($userCreated);

            return response()->json(['token' => $token]);

        } catch (ClientException $exception) {
            return response()->json(['error' => 'Invalid credentials provided.'], 422);
        }
    }

    public function login(LoginRequest $request)
    {
        // Should check phone_verified = 1

        if (!$token = auth()->guard('api')->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return response()->json(['error' => 'الرجاء التأكد من البيانات الصحيحة'], 401);
        }

        // Check if the token is expired
        if (auth()->guard('api')->factory()->getTTL() <= 0) {
            return response()->json(['error' => 'انتهت صلاحية الجلسة'], 401);
        }

        $tokenData =  ['token' =>  $token, 'expire_at' => auth()->guard('api')->factory()->getTTL() * 300];
        return responseSuccessData(LoginResource::make($tokenData), 'تم تسجيل الدخول بنجاح');
    }

    public function register(RegisterRequest $request)
    {
        $code_phone = $request->code_phone;
        $phone = $request->phone;

        // Check if a user with the provided phone number already exists
        $existingUser = User::where('phone', '+' . $code_phone . $phone)->first();
        if ($existingUser) {
            return response()->json([
                'status' => 208,
                'message' => 'هذا الرقم مسجل بالفعل'
            ], Response::HTTP_ALREADY_REPORTED);
        }

        $user = User::create([
            'name'     => $request->get('name'),
            'image'    => $request->get('image'),
            'phone'    => '+' . $code_phone . $phone,
            'country'  => $request->get('country'),
            'state'    => $request->get('state'),
            'city'     => $request->get('city'),
            'password' => Hash::make($request->get('password')),
        ] + $request->validated());

        // $user->generateCode();
        // $user->notify(new OtpNotificate());

        // $token = JWTAuth::fromUser($user);

        return responseSuccessData(RegisterResource::make($user), 'تم ارسال رمز التحقق');
    }

    public function getaccount()
    {
        if (!auth()->user())
            return response()->json(['error' => 'Unauthorized Access']);
        $user = User::where('id', auth()->user()->id)->first();

        return responseSuccessData(RegisterResource::make($user));
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'تم تسجيل الخروج']);
    }
}
