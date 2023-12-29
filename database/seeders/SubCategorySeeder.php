<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = SubCategory::create(["name"=>"Vehicles","category_id"=>1])->addMedia(public_path('subcategory/1.png'))->toMediaCollection('subcategory','subcategory');
        $subcategories = SubCategory::create(["name"=>"Property","category_id"=>2])->addMedia(public_path('subcategory/6.png'))->toMediaCollection('subcategory','subcategory');
        $subcategories = SubCategory::create(["name"=>"SmartPhone","category_id"=>3])->addMedia(public_path('subcategory/2.png'))->toMediaCollection('subcategory','subcategory');
        $subcategories = SubCategory::create(["name"=>"Computer","category_id"=>4])->addMedia(public_path('subcategory/3.png'))->toMediaCollection('subcategory','subcategory');
        $subcategories = SubCategory::create(["name"=>"Home & Living","category_id"=>5])->addMedia(public_path('subcategory/5.png'))->toMediaCollection('subcategory','subcategory');
        $subcategories = SubCategory::create(["name"=>"Electronics","category_id"=>6])->addMedia(public_path('subcategory/4.png'))->toMediaCollection('subcategory','subcategory');
    }
}
