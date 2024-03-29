<?php

namespace App\Http\Controllers\Api\Ads;

use App\Models\Ads;
use App\Models\AdDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Api\Ads\StoreRequest;
use App\Http\Resources\Api\Ads\AdsResource;
use App\Http\Requests\Api\Ads\UpdateRequest;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ads::where('is_active', 0)->get();
        return responseSuccessData(AdsResource::collection($ads->load('adDetail', 'subCategory', 'user','shop')));
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
            "user_id" => auth()->user()->id,
            "country" => auth()->user()->country,
            "state" => auth()->user()->state,
            "city" => auth()->user()->city,
        ] + $request->validated());

        // $ads->addMediaFromRequest('image')->toMediaCollection('ads');

        if ($request->hasFile('image')) {
            $fileAdders = $ads->addMultipleMediaFromRequest(['image'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('ads', 'ads');
                });
        }

        if (!empty($request->ad_detail)) {
            $adDetailData = is_array($request->ad_detail)
                ? $request->ad_detail
                : json_decode($request->input('ad_detail'), true);

            $adDetail = AdDetail::create([
                "ad_id" => $ads->id,
                'ad_detail' => $adDetailData,
            ]);
        }


        $ads->load('adDetail');
        return responseSuccessData(AdsResource::make($ads->load('subCategory', 'user','shop')), 'تم اضافة الاعلان بنجاح');
    }


    public function show(Ads $ad)
    {
        // Find the ad by its ID
        $ad = Ads::find($ad->id);

        if (!$ad)
            return responseErrorMessage('الاعلان غير موجود');

        $ad->increment('view');


        return responseSuccessData(AdsResource::make($ad->load('adDetail', 'subCategory', 'user','shop')));
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
        if ($ad->where('user_id', auth()->user()->id)) {
            if (!$ad)
                return responseErrorMessage('الاعلان غير موجود');

            $ad->update($request->validated());

            if ($request->hasFile('image')) {
                $ad->clearMediaCollection('ads', 'ads');
                // Add the new images to the media library
                $fileAdders = $ad->addMultipleMediaFromRequest(['image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('ads', 'ads');
                    });
            }


            if (!empty($request->ad_detail)) {
                $adDetailData = is_array($request->ad_detail)
                    ? $request->ad_detail
                    : json_decode($request->input('ad_detail'), true);

                $ad->adDetail->update([
                    'ad_detail' => $adDetailData,
                ]);
            }

            return responseSuccessData(AdsResource::make($ad->load('adDetail', 'subCategory', 'user','shop')));
        } else {
            return responseErrorMessage("You don't have permission to perform this action");
        }
    }


    public function destroy(Ads $ad)
    {
        if ($ad->where('user_id', auth()->user()->id)) {
            if (!$ad)
                return responseErrorMessage('الاعلان غير موجود');

            $ad->clearMediaCollection('ads', 'ads');
            $ad->delete();
            return responseSuccessMessage('تم حذف الاعلان بنجاح');
        } else {
            return responseErrorMessage("You don't have permission to perform this action");
        }
    }

    public function ads_by_category($category)
    {

        $ads = Ads::with(['subCategory.category'])
            ->whereHas('subCategory.category', function ($query) use ($category) {
                return $query->where('id', $category);
            })
            ->get();

        return responseSuccessData(AdsResource::collection($ads->load('adDetail', 'subCategory', 'user','shop')));
    }

    public function ads_by_price($min, $max)
    {
        $ads = Ads::whereBetween('price', [$min, $max])
            ->get();
        return responseSuccessData(AdsResource::collection($ads->load('adDetail', 'subCategory', 'user','shop')));
    }

    public function filterAds(Request $request)
    {
        $query = Ads::with(['adDetail', 'subCategory', 'user']);

        if ($request->has('category_id')) {
            $category = $request->input('category_id');
            $query->whereHas('subCategory.category', function ($q) use ($category) {
                $q->where('id', $category);
            });
        }

        if ($request->has('min') && $request->has('max')) {
            $min = $request->input('min');
            $max = $request->input('max');
            $query->whereBetween('price', [$min, $max]);
        }

        if ($request->has('name')) {
            $name = $request->input('name');
            $query->where('name', 'like', '%' . $name . '%');
        }

        // Order the results by the latest date
        $query->orderBy('created_at', 'desc');


        $ads = $query->get();

        return responseSuccessData(AdsResource::collection(
            $ads->load('adDetail', 'subCategory', 'user','shop')
        ));
    }

    public function filterAdsByDate()
    {
        $ads = Ads::latest('created_at')->get();
        return responseSuccessData(AdsResource::collection(
            $ads->load('adDetail', 'subCategory', 'user','shop')
        ));
    }
}
