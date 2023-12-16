<?php

namespace App\Http\Controllers\Api\Public;

use App\Models\Ads;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Ads\AdsResource;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\SubCategory\SubCategoryResource;

class PublicController extends Controller
{
    public function public_ads(){
        $ads = Ads::where('is_active',0)->get();
        return responseSuccessData(AdsResource::collection($ads->load('adDetail','subCategory')));
    }

    public function public_ads_by_category($category){

        $ads = Ads::with(['subCategory.category'])
        ->whereHas('subCategory.category', function ($query) use ($category) {
           return $query->where('id', $category);
        })
        ->get();

        return responseSuccessData(AdsResource::collection($ads->load('adDetail')));
    }

    public function public_ads_by_price($min,$max){
        $ads = Ads::whereBetween('price', [$min, $max])
        ->get();
        return responseSuccessData(AdsResource::collection($ads->load('adDetail','subCategory')));
    }


    public function public_category(){
        $category = Category::get();
        return responseSuccessData(CategoryResource::collection($category));
    }

    public function public_subcategory(){
        $subcategory = SubCategory::get();
        return responseSuccessData(SubCategoryResource::collection($subcategory));
    }
}
