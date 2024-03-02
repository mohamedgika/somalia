<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shop = Shop::where('is_active', 1)->get();
        return view('backend.Shop.dashboard_shop', ['shop' => $shop]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    public function show(Request $request, Shop $shop)
    {
        try {

            $shop->update(
                [
                    'is_active' => $request->active,
                ]
            );

            $notify = $shop->where('is_active',1)->first();
            if ($notify){
                Notification::create([
                    'user_id' => $shop->user_id,
                    'type'=>'shop',
                    'message'=>'your shop '.$shop->name.' accepted',
                    'shop_id'=>$shop->id
                ]);
            }else{
                Notification::create([
                    'user_id' => $shop->user_id,
                    'type'=>'shop',
                    'message'=>'your shop '.$shop->name.' rejected',
                    'shop_id'=>$shop->id
                ]);
            }


            // session()->flash('ActiveAds', 'Ad Active Successfully');
            return redirect()->route('shop.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Shop $shop)
    {
        try {
            $shop->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'description' => $request->description,
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
    public function destroy(Shop $shop)
    {
        try {
            $shop->delete();
            // session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('shop.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
