<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Input;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CategoryRequest;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function index()
    {
        // Relation Between Category And Sub Category
        $categories = Category::get();

        // foreach ($categories as $category) {
        //     foreach ($category->inputs as $input) {
        //         $inputs = json_decode($input->inputs);
        //     }
        // }



        return view('backend.Category.dashboard_category', ['categories' => $categories]);
    }


    public function create()
    {
        return view('backend.Category.dashboard_add_category');
    }


    public function store(Request $request)
    {
        try {

            $category = Category::create([
                'name' => $request->name_category,
            ]);

            $subcategory = SubCategory::create([
                'name' => $request->name_subcategory,
                'category_id' => $category->id,
            ]);

            $category->addMediaFromRequest('image_category')->toMediaCollection('category', 'category');
            $subcategory->addMediaFromRequest('image_subcategory')->toMediaCollection('subcategory', 'subcategory');

            $input = Input::create([
                'inputs' => $request->input('inputs'),
                'category_id' => $category->id,
            ]);

            session()->flash('add_catergory', 'Add Category And SubCategory Successfully');
            return redirect()->route('category.index');
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
    public function edit(Request $request, Category $category)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $subcategory = SubCategory::where('category_id', $category->id)->update([
                'name' => $request->name_subcategory,
            ]);

            $category->update([
                'name' => $request->name_category,
            ]);

            $input = Input::where('category_id', $category->id)->update([
                'inputs' => $request->input('inputs')
            ]);

            if ($request->hasFile('image_category'))
                $category->clearMediaCollection('category', 'category');
                $category->addMediaFromRequest('image_category')->toMediaCollection('category', 'category');

            // if($request->hasFile('image_subcategory'))
            //     $subcategory->clearMediaCollection('subcategory','subcategory');
            //     $subcategory->addMediaFromRequest('image_subcategory')->toMediaCollection('subcategory','subcategory');

            // session()->flash('edit_user', __('backend/dashboard_message.Edit User Successfully'));
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            // session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
