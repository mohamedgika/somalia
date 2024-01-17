<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::get();

        // foreach ($ads as $ad) {
        //     $data = json_decode($ad->adDetail->ad_detail);

        //     if (is_array($data)) {
        //         // Assuming each ad detail is an object with 'model', 'brand', and 'year' properties
        //         $formattedData = [];

        //         foreach ($data as $adDetail) {
        //             foreach ($adDetail as $key => $value){
        //                 $formattedData[] = " $key :  $value ";
        //             }
        //       }

        //         $resultString = implode(', ', $formattedData);

        //         dd($resultString);
        //     } else {
        //         // Handle the case where $data is not an array (e.g., JSON decoding failed)
        //         dd('Invalid data structure');
        //     }
        // }


        return view('backend.Ads.dashboard_ads', ['ads' => $ads]);
    }

    public function show(Request $request,Ads $ad){

        try {
            $ad->update([
                'is_active'=>$request->active,
            ]);

            session()->flash('ActiveAds', 'Ad Active Successfully');
            return redirect()->route('ads.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request , Ads $ad){

    }

    public function edit(Request $request , Ads $ad){
        try {
            $ad->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'description'=>$request->description,
                'feature'=>$request->feature,
                'country'=>$request->country,
                'state'=>$request->state,
                'city'=>$request->city
            ]);

            $ad->adDetail->update([
                'ad_detail'=>[$request->input('ad_detail')]
            ]);

            session()->flash('edit_ads', 'Edit Ads Successfully');
            return redirect()->route('ads.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Ads $ad){
        try {
            $ad->delete();
            session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('ads.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
