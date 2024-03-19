<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopNotActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops_not_active = Shop::where('is_active', 0)->get();
        return view('backend.Shop.dashboard_not_active_shop', ['shops_not_active'=> $shops_not_active]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        $shops = Shop::where('id', $shop->id)->get();
        return view('backend.Shop.dashboard_not_active_shop', ['shops' => $shops]);
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
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
