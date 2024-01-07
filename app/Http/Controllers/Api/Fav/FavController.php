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
        // Check if the user has already favorited the ad
        $existingFavorite = Fav::where('user_id', $user->id)
            ->where('ad_id', $adId)
            ->first();

        if ($existingFavorite) {
            $fav = Fav::where('user_id', auth()->user()->id)->where('ad_id', $adId);
            $fav->delete();
            return responseSuccessMessage('Unlike');
        } else {
            Fav::create([
                'user_id' => $user->id,
                'ad_id' => $adId,
            ]);
        }
        return responseSuccessMessage('Like');
    }

}
