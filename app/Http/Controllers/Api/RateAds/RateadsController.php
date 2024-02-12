<?php

namespace App\Http\Controllers\Api\RateAds;

use App\Http\Controllers\Controller;
use App\Models\Rateads;
use Illuminate\Http\Request;

class RateadsController extends Controller
{
    public function rate(Request $request)
    {
        $user = auth()->user();
        $adId = $request->ad_id;
        $shopAdId = $request->shopad_id;

        // Check if the user has already favorited the ad
        $existingRate = Rateads::where('user_id', $user->id)
            ->where(function ($query) use ($adId) {
                $query->where('ad_id', $adId);
            })
            ->first();

        if ($existingRate) {
            $existingRate->update([
                'rate' => $request->rate
            ]);
            return responseSuccessMessage('Rate Updated');
        } else {
            Rateads::create([
                'rate' => $request->rate,
                'user_id' => $user->id,
                'ad_id' => $adId,
            ]);
            return responseSuccessMessage('Rated');
        }
    }
}
