<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function  index()
    {
        $slider = Slider::get();
        return view('backend.Slider.dashboard_slider', ['slider' => $slider]);
    }

    public function create()
    {
        return view('backend.Slider.dashboard_add_slider');
    }

    public function store(Request $request)
    {
        $validation =  $request->validate([
            'image'=>'required',
            'title'=>'required|string',
            'link'=>'nullable',
            'desc'=>'required'
        ]);

        try {
            $slider = Slider::create($validation);

            if ($request->hasFile('image')) {
                $slider->addMediaFromRequest('image')->toMediaCollection('slider', 'slider');
            }
            session()->flash('add_slider', 'Add Slider Successfully');
            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
