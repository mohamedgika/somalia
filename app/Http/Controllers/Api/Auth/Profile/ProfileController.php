<?php

namespace App\Http\Controllers\Api\Auth\Profile;

use App\Models\Ads;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Api\Ads\AdsResource;
use App\Http\Resources\Api\Auth\RegisterResource;

class ProfileController extends Controller
{
    public function getAccount()
    {
        if (!auth()->user())
            return response()->json(['error' => 'Unauthorized Access']);

        $user = User::where('id',auth()->user()->id)->first();

        return responseSuccessData(RegisterResource::make($user));
    }

    public function getMyAds()
    {
        $ads = Ads::where('user_id', auth()->user()->id)->get();
        $ads->load('adDetail');
        return responseSuccessData(AdsResource::collection($ads->load('adDetail','subCategory','user')));
    }

    public function update_profile(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->update(['name' => $request->name]);
        // Retrieve the updated user instance
        $user = User::find(auth()->user()->id);
        $user->clearMediaCollection('profileauth','profileauth');
        // Add media to the user's profileauth collection
        $user->addMediaFromRequest('image')->toMediaCollection('profileauth', 'profileauth');

        return response()->json([auth()->user(),'image'=>$user->getMedia('profileauth')]);
    }
}
