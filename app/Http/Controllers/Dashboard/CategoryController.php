<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Trait\UploadTrait;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\StoreRequest;
use App\Models\Input;

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

        // $subcategories = Category::find($id)->subcategory;

        return view('backend.Category.dashboard_category',['categories'=>$categories]);
    }


    public function create()
    {
        $buttonCount = 0;

        return view('backend.Category.dashboard_add_category',compact('buttonCount'));
    }


    public function store(Request $request)
    {
        try{

            $category = Category::create($request->validated());

            $subcategory = SubCategory::create([
                'name' => $request->name,
                'category_id' => $category->id,
            ]);

            $input = Input::create([
                'category_id' => $category->id,
                'inputs'=>$request->inputs,
            ]);

            $category->addMediaFromRequest('image')->toMediaCollection('category','category');
            $subcategory->addMediaFromRequest('image')->toMediaCollection('subcategory','subcategory');

            session()->flash('add_catergory','Add Category And SubCategory Successfully');
            return redirect()->route('category.index');

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
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
        $this->authorize('update',$this->category); // Secure Url

        Category::findorFail($id);

       try{
            // Function To Save In Storage With Folder Name
            $image = $this->uploadfile($request,'category','image');

           Category::where('id',$id)->update([

               'title'=>
               [
                'en'=>$request->en_title,
                'ar'=>$request->ar_title
               ],
               'slug'=>
               [
                'en'=>$request->en_slug,
                'ar'=>$request->ar_slug
               ],
               'content'=>
               [
                'en'=>$request->en_content,
                'ar'=>$request->ar_content
               ],
               'image'=>$image,

           ]);

           session()->flash('edit_user',__('backend/dashboard_message.Edit User Successfully'));
           return redirect()->route('category.index');

       }
       catch(\Exception $e){
           return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
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
