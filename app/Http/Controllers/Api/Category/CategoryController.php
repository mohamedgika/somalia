<?php

namespace App\Http\Controllers\Api\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\StoreRequest;
use App\Http\Requests\Api\Category\UpdateRequest;
use App\Http\Resources\Api\Category\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::get();
        return responseSuccessData(CategoryResource::collection($category->load('subcategories')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $category = Category::create($request->validated());

        $category->addMediaFromRequest('image')->toMediaCollection('category','category');

        return responseSuccessData(CategoryResource::make($category),'تم اضافة الصنف بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if(! $category)
            return responseErrorMessage('الصنف غير موجود');

        return responseSuccessData(CategoryResource::make($category->load('subcategories')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        if(! $category)
            return responseErrorMessage('الصنف غير موجود');

       $category->update($request->validated());

       if($request->hasFile('image'))
            $category->clearMediaCollection('category','category');
            $category->addMediaFromRequest('image')->toMediaCollection('category','category');
            // Add the new images to the media library

       return responseSuccessData(CategoryResource::make($category),'تم تحديث الصنف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(! $category)
            return responseErrorMessage('الصنف غير موجود');

        $category->clearMediaCollection('category','category');
        $category->delete();
        return responseSuccessMessage('تم حذف الصنف بنجاح');
    }
}
