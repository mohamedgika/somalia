<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsNotActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $not_active_ads = Ads::where('is_active',0)->get();
        return view('backend.Ads.dashboard_not_active_ads',['not_active_ads'=>$not_active_ads]);
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
    public function show(Ads $ad)
    {
        $not_active_ads = Ads::where('id', $ad->id)->get();
        return view('backend.Ads.dashboard_not_active_ads', ['not_active_ads' => $not_active_ads]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
