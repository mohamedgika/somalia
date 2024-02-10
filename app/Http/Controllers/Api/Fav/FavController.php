<?php

namespace App\Http\Controllers\Api\Fav;

use App\Models\Fav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Fav\FavResource;

class FavController extends Controller
{
    public function getFav()
    {
        $favs = Fav::where('user_id', auth()->user()->id)->get();
        // dd($favs->ads);
        return responseSuccessData(FavResource::collection($favs->load('user')));
    }

    public function fav(Request $request)
    {
        $user = auth()->user();
        $adId = $request->ad_id;

        // Check if the user has already favorited the ad based on ad_id
        $existingFavoriteAd = Fav::where('ad_id', $adId)->where('user_id', $user->id)
            ->first();

        // Unfavorite ad based on ad_id if already favorited
        if ($existingFavoriteAd) {
            $existingFavoriteAd->delete();
            return responseSuccessMessage('Unlike');
        }

        // If not favorited, create a new favorite entry
        Fav::create([
            'user_id' => $user->id,
            'ad_id' => $adId,
        ]);

        return responseSuccessMessage('Like');
    }

    public function favshopad(Request $request)
    {
        $user = auth()->user();
        $shopAdId = $request->shopad_id;

        $existingFavoriteShopAd = Fav::where('shopad_id', $shopAdId)->where('shopad_id', $shopAdId)
            ->first();

        if ($existingFavoriteShopAd) {
            $existingFavoriteShopAd->delete();
            return responseSuccessMessage('Unlike');
        }

        Fav::create([
            'user_id' => $user->id,
            'shopad_id' => $shopAdId,
        ]);

        return responseSuccessMessage('Like');

    }
}
