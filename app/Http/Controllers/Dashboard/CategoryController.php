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
        $categories = Category::all();

        return view('backend.Category.dashboard_category', ['categories' => $categories]);
    }


    public function create()
    {
        return view('backend.Category.dashboard_add_category');
    }


    public function store(CategoryRequest $request)
    {

        // Remove elements with null values for both "input" and "type"
        $filteredArray = array_filter($request->inputs, function ($item) {
            return $item['input'] !== null || $item['type'] !== null;
        });

        $filteredArray = array_values($filteredArray);

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
                'inputs' => json_encode($filteredArray),
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
    public function edit(Request $request, $id)
    {
        $this->authorize('update', $this->category); // Secure Url

        Category::findorFail($id);

        try {
            // Function To Save In Storage With Folder Name
            $image = $this->uploadfile($request, 'category', 'image');

            Category::where('id', $id)->update([

                'title' =>
                [
                    'en' => $request->en_title,
                    'ar' => $request->ar_title
                ],
                'slug' =>
                [
                    'en' => $request->en_slug,
                    'ar' => $request->ar_slug
                ],
                'content' =>
                [
                    'en' => $request->en_content,
                    'ar' => $request->ar_content
                ],
                'image' => $image,

            ]);

            session()->flash('edit_user', __('backend/dashboard_message.Edit User Successfully'));
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
