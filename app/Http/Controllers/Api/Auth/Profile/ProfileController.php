<?php

namespace App\Http\Controllers\Api\Auth\Profile;

use App\Models\Ads;
use App\Models\Fav;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Api\Ads\AdsResource;
use App\Http\Resources\Api\Auth\RegisterResource;
use App\Http\Resources\Api\MyShop\MyShopResource;
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
        return responseSuccessData(AdsResource::collection($ads->load('adDetail', 'subCategory', 'user')));
    }

    public function getMyShop()
    {
        $shop = Shop::where('user_id', auth()->user()->id)->get();
        return responseSuccessData(MyShopResource::collection($shop->load('categories', 'shopAds')));
    }

    public function update_profile(UpdateProfileRequest $request)
    {
        $code_phone = $request->code_phone;
        $phone = $request->phone;

        $user = User::where('id', auth()->user()->id)->update([
            'name'     => $request->get('name'),
            'phone'    => '+' . $code_phone . $phone,
            'password' => Hash::make($request->get('password')),
        ]);

        // Retrieve the updated user instance
        $user = User::find(auth()->user()->id);
        $user->clearMediaCollection('profileauth', 'profileauth');
        // Add media to the user's profileauth collection
        $user->addMediaFromRequest('image')->toMediaCollection('profileauth', 'profileauth');

        return responseSuccessData(RegisterResource::make($user),'تم تحديث الملف الشخصي بنجاح');
    }

    public function count_of_my_ads(){
        $count = Ads::where('user_id',Auth::user()->id)->count();
        return response()->json(['count'=>$count]);
    }

    public function fav_ads(){
        $favs = Fav::where('user_id', auth()->user()->id)->count();
        return response()->json(['favs'=>$favs]);
    }

    public function get_view_one_ad($ad){
        $view = Ads::where('id',$ad)->first('view')->view;
        return response()->json(['views'=>$view]);
    }

    public function get_view_ads(){
        $ads = Ads::select('name', 'view')->get();
        
        $adsArray = $ads->map(function ($ad) {
            return ['name' => $ad->name, 'view' => $ad->view];
        })->all();

        return response()->json($adsArray);    }

}
