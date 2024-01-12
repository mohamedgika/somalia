<?php

namespace App\Http\Controllers\Api\Public;

use App\Models\Ads;
use App\Models\Shop;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Ads\AdsResource;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\PublicShop\PublicShopResource;
use App\Http\Resources\Api\SubCategory\SubCategoryResource;

class PublicController extends Controller
{
    public function public_ads()
    {
        $ads = Ads::where('is_active', 0)->get();
        return responseSuccessData(AdsResource::collection($ads->load('adDetail', 'subCategory', 'user')));
    }

    public function public_shops()
    {
        $shop = Shop::get();
        return responseSuccessData(PublicShopResource::collection($shop->load('categories', 'shopAds', 'user')));
    }

    public function show(Ads $ad)
    {
        if (!$ad)
            return responseErrorMessage('الاعلان غير موجود');

        return responseSuccessData(AdsResource::make($ad->load('adDetail', 'subCategory', 'user')));
    }

    public function show_shop(Shop $shop)
    {
        if (!$shop)
            return responseErrorMessage('المتجر غير موجود');

        return responseSuccessData(PublicShopResource::make($shop->load('categories', 'shopAds', 'user')));
    }

    public function public_ads_by_category($category)
    {

        $ads = Ads::with(['subCategory.category'])
            ->whereHas('subCategory.category', function ($query) use ($category) {
                return $query->where('id', $category);
            })
            ->get();

        return responseSuccessData(AdsResource::collection($ads->load('adDetail', 'subCategory', 'user')));
    }

    public function public_ads_by_price($min, $max)
    {
        $ads = Ads::whereBetween('price', [$min, $max])
            ->get();
        return responseSuccessData(AdsResource::collection($ads->load('adDetail', 'subCategory', 'user')));
    }

    public function public_ads_by_name($name)
    {
        $ads = Ads::where('name', 'like', '%' . $name . '%')
            ->get();

        return responseSuccessData(AdsResource::collection($ads->load('adDetail', 'subCategory', 'user')));
    }

    public function filterAds(Request $request)
    {
        $query = Ads::query();

        if ($request->has('category_id')) {
            $category = $request->input('category_id');
            $query->whereHas('subCategory.category', function ($q) use ($category) {
                $q->where('id', $category);
            });
        }

        if ($request->has('min') && $request->has('max')) {
            $min = $request->input('min');
            $max = $request->input('max');
            $query->whereBetween('price', [$min, $max]);
        }

        if ($request->has('name')) {
            $name = $request->input('name');
            $query->where('name', 'like', '%' . $name . '%');
        }

        $ads = $query->get();

        return responseSuccessData(AdsResource::collection(
            $ads->load('adDetail', 'subCategory', 'user')
        ));
    }

    public function filterAdsByDate()
    {
        $ads = Ads::latest('created_at')->get();
        return responseSuccessData(AdsResource::collection(
            $ads->load('adDetail', 'subCategory', 'user')
        ));
    }

    public function public_category()
    {
        $category = Category::get();
        return responseSuccessData(CategoryResource::collection($category->load('subcategories')));
    }

    public function public_subcategory()
    {
        $subcategory = SubCategory::get();
        return responseSuccessData(SubCategoryResource::collection($subcategory->load('category')));
    }

    public function pop_locations()
    {
        // Get the number of ads grouped by country
        $adsByCountry = Ads::groupBy('country')
            ->selectRaw('country, count(*) as ads_count')
            ->get();

        return response()->json(['ads_by_country' => $adsByCountry]);
    }
}
