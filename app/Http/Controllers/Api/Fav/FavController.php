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
        $shopAdId = $request->shopad_id;

        // Check if the user has already favorited the ad
        $existingFavorite = Fav::where('user_id', $user->id)
            ->where(function ($query) use ($adId, $shopAdId) {
                $query->where('ad_id', $adId)
                      ->orWhere('shopad_id', $shopAdId);
            })
            ->first();

        if ($existingFavorite) {
            $existingFavorite->delete();
            return responseSuccessMessage('Unlike');
        } else {
            Fav::create([
                'user_id' => $user->id,
                'ad_id' => $adId,
                'shopad_id' => $shopAdId,
            ]);
            return responseSuccessMessage('Like');
        }
    }


}
