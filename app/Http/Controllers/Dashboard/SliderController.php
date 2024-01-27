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

    public function update(Request $request , Slider $slide)
    {
        try {
            $slide->update([
                'title'=>$request->title,
                'link'=>$request->link,
                'desc'=>$request->input('desc')
            ]);

            if ($request->hasFile('image')) {
                $slide->clearMediaCollection('slider', 'slider');
                $slide->addMediaFromRequest('image')->toMediaCollection('slider', 'slider');
            }

            session()->flash('add_slider', 'Add Slider Successfully');
            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function destroy(Slider $slide)
    {
        try {
            $slide->delete();
            // session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
