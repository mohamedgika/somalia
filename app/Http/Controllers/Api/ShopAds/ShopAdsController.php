<?php

namespace App\Http\Controllers\Api\ShopAds;

use App\Models\Shop;
use App\Models\ShopAds;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ShopAds\StoreRequest;
use App\Http\Requests\Api\ShopAds\UpdateRequest;
use App\Http\Resources\Api\ShopAds\ShopAdsResource;
use App\Models\ShopAdsDetail;

class ShopAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shopads = ShopAds::where('is_active',0)->get();
        return responseSuccessData(ShopAdsResource::collection($shopads->load('shop','shopAdsDetail')));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $shopad = ShopAds::create([
            "shop_id"=>Shop::where('user_id',auth()->user()->id)->first()->id,
            "country"=>auth()->user()->country,
            "state"=>auth()->user()->state,
            "city"=>auth()->user()->city,
            ]+$request->validated());

            // $ads->addMediaFromRequest('image')->toMediaCollection('ads');

            if ($request->hasFile('image')) {
                $fileAdders = $shopad->addMultipleMediaFromRequest(['image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('shopads','shopads');
                });
            }

        if (!empty($request->shop_ad_detail))
                $shopAdsDetail = ShopAdsDetail::create(["shop_ad_id"=>$shopad->id]+$request->validated());

        $shopad->load('shopAdsDetail');
        return responseSuccessData(ShopAdsResource::make($shopad->load('shop')),'تم اضافة اعلان المتجر بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShopAds $shopad)
    {
        if(! $shopad)
             return responseErrorMessage('اعلان المتجر غير موجود');

        return responseSuccessData(ShopAdsResource::make($shopad->load('shopAdsDetail','shop')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShopAds $shopad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ShopAds $shopad)
    {
        if(! $shopad)
             return responseErrorMessage('اعلان المتجر غير موجود');

        $shopad->update($request->validated());

        if($request->hasFile('image')){
            $shopad->clearMediaCollection('shopads','shopads');
            // Add the new images to the media library
            $fileAdders = $shopad->addMultipleMediaFromRequest(['image'])
            ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('shopads','shopads');
            });
        }

        if (!empty($request->shop_ad_detail))
                $shopad_detail = $shopad->shopAdsDetail->update($request->validated());

        return responseSuccessData(ShopAdsResource::make($shopad->load('shopAdsDetail','shop')));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShopAds $shopad)
    {
        if(! $shopad)
            return responseErrorMessage('اعلان المتجر غير موجود');

        $shopad->clearMediaCollection('shopads','shopads');
        $shopad->delete();
        return responseSuccessMessage('تم حذف اعلان المتجر بنجاح');
    }
}
