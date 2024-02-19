<?php

namespace App\Http\Controllers\Api\Auth\Profile;

use App\Models\Ads;
use App\Models\Fav;
use App\Models\Shop;
use App\Models\User;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Api\Ads\AdsResource;
use App\Http\Resources\Api\Auth\RegisterResource;
use App\Http\Resources\Api\MyShop\MyShopResource;
use App\Http\Resources\Api\Payment\PaymentResource;
use App\Http\Requests\Api\Profile\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function getAccount()
    {
        if (!auth()->user())
            return response()->json(['error' => 'Unauthorized Access']);

        $user = User::where('id', auth()->user()->id)->first();

        return responseSuccessData(RegisterResource::make($user));
    }

    public function getMyAds()
    {
        $ads = Ads::where('user_id', auth()->user()->id)->get();
        $ads->load('adDetail');
        return responseSuccessData(AdsResource::collection($ads->load('adDetail', 'subCategory', 'user','shop')));
    }

    public function getMyShop()
    {
        $shop = Shop::where('user_id', auth()->user()->id)->with('ads')->get();
        return responseSuccessData(MyShopResource::collection($shop));
    }

    public function update_profile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $updateData = []; // Initialize the variable

        // Check if the request has the 'image' file
        if ($request->hasFile('image')) {
            // Clear existing media collection and add new media
            $user->clearMediaCollection('profileauth', 'profileauth');
            $user->addMediaFromRequest('image')->toMediaCollection('profileauth', 'profileauth');
        }

        if ($request->filled('name')) {
            $updateData['name'] = $request->input('name');
        }

        // Check if 'phone' is provided and not empty
        if ($request->filled('phone')) {
            $updateData['phone'] = $request->input('code_phone') . $request->input('phone');
        }

        if ($request->filled('country')) {
            $updateData['country'] = $request->input('country');
        }

        if ($request->filled('state')) {
            $updateData['state'] = $request->input('state');
        }

        // Update the user with the prepared data
        $user->update($updateData);

        return responseSuccessData(RegisterResource::make($user), 'تم تحديث الملف الشخصي بنجاح');
    }


    public function update_profile_password(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // Check if the current password matches the user's actual password
        if (!Hash::check($request->input('current_password'), auth()->user()->password)) {
            return responseErrorMessage('Not Current Password', 400);
        }

        // Update the user's password
        User::where('id', auth()->user()->id)->update([
            'password' =>  Hash::make($request->input('new_password'))

        ]);

        return responseSuccessMessage('تم تحديث كلمة المرور بنجاح');
    }

    public function count_of_my_ads()
    {
        $count = Ads::where('user_id', Auth::user()->id)->count();
        return response()->json(['count' => $count]);
    }

    public function fav_ads()
    {
        $favs = Fav::where('user_id', auth()->user()->id)->count();
        return response()->json(['favs' => $favs]);
    }

    public function get_view_one_ad($ad)
    {
        $view = Ads::where('id', $ad)->first('view')->view;
        return response()->json(['views' => $view]);
    }

    public function get_view_ads()
    {
        $ads = Ads::select('name', 'view')->get();

        $adsArray = $ads->map(function ($ad) {
            return ['name' => $ad->name, 'view' => $ad->view];
        })->all();

        return response()->json($adsArray);
    }

    public function getMySubscription(){
        $subscriptions = Payment::where('user_id', auth()->user()->id)->get();
        return responseSuccessData(PaymentResource::collection($subscriptions));
    }
}
