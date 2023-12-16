<?php

namespace App\Http\Controllers\Api\Shop;

use App\Models\Shop;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Shop\StoreRequest;
use App\Http\Requests\Api\Shop\UpdateRequest;
use App\Http\Resources\Api\Shop\ShopResource;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shop = Shop::where('is_active',0)->get();
        return responseSuccessData(ShopResource::collection($shop->load('categories','user')));

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
        $shop = Shop::create([
            'user_id'=>auth()->user()->id
            ]+$request->validated());

        if ($request->hasFile('image'))
                $shop->addMediaFromRequest('image')->toMediaCollection('shop','shop');

        return responseSuccessData(ShopResource::make($shop->load('categories','user')),'تم اضافة المتجر بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        if(! $shop)
            return responseErrorMessage('المتجر غير موجود');

        return responseSuccessData(ShopResource::make($shop->load('categories','user')),'تم اضافة المتجر بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Shop $shop)
    {
        if ($shop->where('user_id',auth()->user()->id)){

            if(! $shop)
                return responseErrorMessage('المتجر غير موجود');

            $shop->update($request->validated());

            if($request->hasFile('image')){
                $shop->clearMediaCollection('shop','shop');
                // Add the new images to the media library
                $shop->addMediaFromRequest('image')->toMediaCollection('shop','shop');
            }

            return responseSuccessData(ShopResource::make($shop->load('categories','user')),'تم تحديث المتجر بنجاح');
        }else{
            return responseErrorMessage("You don't have permission to perform this action");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        if ($shop->where('user_id',auth()->user()->id)){
            if(! $shop)
                return responseErrorMessage('المتجر غير موجود');

            $shop->clearMediaCollection('shop','shop');
            $shop->delete();
            return responseSuccessMessage('تم حذف المتجر بنجاح');
        }else{
            return responseErrorMessage("You don't have permission to perform this action");
        }
    }
}
