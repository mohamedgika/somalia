<?php

namespace App\Http\Controllers\Api\SubCategory;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SubCategory\StoreRequest;
use App\Http\Requests\Api\SubCategory\UpdateRequest;
use App\Http\Resources\Api\SubCategory\SubCategoryResource;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategory = SubCategory::get();
        return responseSuccessData(SubCategoryResource::collection($subcategory->load('category')));
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
    public function store(StoreRequest $request)
    {
        $translations = $request->input('name');

        $subcategory = new SubCategory(); // Create a new instance of Category model

        $subcategory->setTranslations('name', $translations);

        $subcategory->category_id = $request->category_id;

        $subcategory->name = $request->name; // Make sure you're getting the name from the request

        $subcategory->save(); // Save the category to the database

        $subcategory->addMediaFromRequest('image')->toMediaCollection('subcategory','subcategory');

        return responseSuccessData(SubCategoryResource::make($subcategory),'تم اضافة الصنف الفرعي بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subcategory)
    {
        if(! $subcategory)
            return responseErrorMessage('الصنف الفرعي غير موجود');

        return responseSuccessData(SubCategoryResource::make($subcategory->load('category')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, SubCategory $subcategory)
    {
        if(! $subcategory)
            return responseErrorMessage('الصنف الفرعي غير موجود');

        if($request->hasFile('image'))
            $subcategory->clearMediaCollection('subcategory','subcategory');
            $subcategory->addMediaFromRequest('image')->toMediaCollection('subcategory','subcategory');
            // Add the new images to the media library

        $subcategory->update($request->validated());

        return responseSuccessData(SubCategoryResource::make($subcategory),'تم تحديث الصنف الفرعي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        if(! $subcategory)
            return responseErrorMessage('الصنف الفرعي غير موجود');

        $subcategory->clearMediaCollection('subcategory','subcategory');
        $subcategory->delete();
        return responseSuccessMessage('تم حذف الصنف الفرعي بنجاح');
    }
}
