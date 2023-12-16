<?php

namespace App\Http\Controllers\Api\Ads;

use App\Models\Ads;
use App\Models\AdDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Ads\StoreRequest;
use App\Http\Requests\Api\Ads\UpdateRequest;
use App\Http\Resources\Api\Ads\AdsResource;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ads::where('is_active',0)->get();
        return responseSuccessData(AdsResource::collection($ads->load('adDetail','subCategory','user')));

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
        // dd($request->file('image'));

        $ads = Ads::create([
            "user_id"=>auth()->user()->id,
            "country"=>auth()->user()->country,
            "state"=>auth()->user()->state,
            "city"=>auth()->user()->city,
            ]+$request->validated());

            // $ads->addMediaFromRequest('image')->toMediaCollection('ads');

            if ($request->hasFile('image')) {
                $fileAdders = $ads->addMultipleMediaFromRequest(['image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('ads','ads');
                    });
            }

        if (!empty($request->ad_detail))
                $adDetail = AdDetail::create(["ad_id"=>$ads->id]+$request->validated());

        $ads->load('adDetail');
        return responseSuccessData(AdsResource::make($ads->load('user','subCategory')),'تم اضافة الاعلان بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ads $ad)
    {
        if(! $ad)
            return responseErrorMessage('الاعلان غير موجود');

        return responseSuccessData(AdsResource::make($ad->load('adDetail','subCategory','user')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ads $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Ads $ad)
    {
        if ($ad->where('user_id',auth()->user()->id)){
            if(! $ad)
                return responseErrorMessage('الاعلان غير موجود');

            $ad->update($request->validated());

            if($request->hasFile('image')){
                $ad->clearMediaCollection('ads','ads');
                // Add the new images to the media library
                $fileAdders = $ad->addMultipleMediaFromRequest(['image'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('ads','ads');
                });
            }

            if (!empty($request->ad_detail))
                $adDetail = $ad->adDetail->update($request->validated());


            return responseSuccessData(AdsResource::make($ad->load('adDetail','subCategory','user')));
        }else{
            return responseErrorMessage("You don't have permission to perform this action");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ads $ad)
    {
        if ($ad->where('user_id',auth()->user()->id)){
            if(! $ad)
                return responseErrorMessage('الاعلان غير موجود');

            $ad->clearMediaCollection('ads','ads');
            $ad->delete();
            return responseSuccessMessage('تم حذف الاعلان بنجاح');
        }else{
            return responseErrorMessage("You don't have permission to perform this action");
        }

    }
}
