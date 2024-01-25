<?php

namespace App\Http\Controllers\Api\Slider;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Slider\SliderResource;

class SliderController extends Controller
{
    public function store(Request $request){
        $slider = Slider::create([
            'desc'=>$request->desc,
            'link'=>$request->link
        ]);

        $slider->addMediaFromRequest('image')->toMediaCollection('slider','slider');

        return responseSuccessData(SliderResource::make($slider),'تم اضافة سلايدر بنجاح');
    }
}
