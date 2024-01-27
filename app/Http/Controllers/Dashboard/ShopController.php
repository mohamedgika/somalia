<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shop = Shop::get();
        return view('backend.Shop.dashboard_shop',['shop'=>$shop]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shops = Shop::where('is_active',0)->get();
        return view('backend.Shop.dashboard_not_active_shop',['shops',$shops]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , Shop $shop){
        try {
         $shop->update(
            [
                'is_active'=> $request->active,
            ]
        );
            // session()->flash('ActiveAds', 'Ad Active Successfully');
            return redirect()->route('shop.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request , Shop $shop){
        try {
            $shop->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'description'=>$request->description,
            ]);

            // session()->flash('edit_ads', 'Edit Ads Successfully');
            return redirect()->route('shop.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop){
        try {
            $shop->delete();
            // session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('shop.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
