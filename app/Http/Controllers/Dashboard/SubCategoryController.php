<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Relation Between Sub Category
        $subcategories = SubCategory::get();
        $categories = Category::get();
        return view('backend.Category.SubCategory.dashboard_subcategory', ['subcategories' => $subcategories, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $subcategory = SubCategory::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
            ]);

            if ($request->hasFile('image'))
                $subcategory->addMediaFromRequest('image')->toMediaCollection('subcategory', 'subcategory');

            session()->flash('add_subcategory', 'Add SubCategory Successfully');
            return redirect()->route('subcategory.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $sub)
    {
        try {
            // Find the SubCategory by ID
            $subcategory = SubCategory::find($sub->id);

            // Update the SubCategory's name
            $subcategory->update([
                'name' => $request->name,
            ]);

            // Check if the request has the 'image_subcategory' file
            if ($request->hasFile('image_subcategory')) {
                // Clear existing media collection and add new media
                $subcategory->clearMediaCollection('subcategory', 'subcategory');
                $subcategory->addMediaFromRequest('image_subcategory')->toMediaCollection('subcategory', 'subcategory');
            }

            // session()->flash('edit_user', __('backend/dashboard_message.Edit User Successfully'));
            return redirect()->route('subcategory.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $sub)
    {
        try {
            $sub->delete();
            // session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('subcategory.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
