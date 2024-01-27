<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ShopAds;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shopads = ShopAds::get();
        return view('backend.Shop.ShopAds.dashboard_shopads',['shopads'=>$shopads]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sa = ShopAds::where('is_active',0)->get();
        return view('backend.Shop.ShopAds.dashboard_not_active_shopads',['sa'=>$sa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Request $request,ShopAds $shopad){
        try {
            $shopad->update([
                'is_active'=>$request->active,
            ]);

            // session()->flash('ActiveAds', 'Ad Active Successfully');
            return redirect()->route('shopAds.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request , ShopAds $shopad){

    }

    public function edit(Request $request , ShopAds $shopad){
        try {
            $shopad->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'description'=>$request->description,
                'feature'=>$request->feature,
                'country'=>$request->country,
                'state'=>$request->state,
                'city'=>$request->city
            ]);

            $shopad->shopAdsDetail->update([
                'shop_ad_detail'=>[$request->input('shop_ad_detail')]
            ]);

            // session()->flash('edit_ads', 'Edit Ads Successfully');
            return redirect()->route('shopAds.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(ShopAds $shopad){
        try {
            $shopad->delete();
            // session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('shopAds.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
