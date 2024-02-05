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
        $subcategories = SubCategory::create(["name" => ["ar" => "سيارات", "en" => "Vehicles", "so" => "Gawaarida"], "category_id" => 1])->addMedia(public_path('subcategory/1.png'))->toMediaCollection('subcategory', 'subcategory');
        $subcategories = SubCategory::create(["name" => ["ar" => "عقارات", "en" => "Property", "so" => "Hanti"], "category_id" => 2])->addMedia(public_path('subcategory/6.png'))->toMediaCollection('subcategory', 'subcategory');
        $subcategories = SubCategory::create(["name" => ["ar" => "هواتف ذكيه", "en" => "SmartPhone", "so" => "Taleefanka Casriga Ah"], "category_id" => 3])->addMedia(public_path('subcategory/2.png'))->toMediaCollection('subcategory', 'subcategory');
        $subcategories = SubCategory::create(["name" => ["ar" => "حاسوب", "en" => "Computer", "so" => "Kombiyuutarka"], "category_id" => 4])->addMedia(public_path('subcategory/3.png'))->toMediaCollection('subcategory', 'subcategory');
        $subcategories = SubCategory::create(["name" => ["ar" => "منازل", "en" => "Home & Living", "so" => "Guriga & Nolosha"], "category_id" => 5])->addMedia(public_path('subcategory/5.png'))->toMediaCollection('subcategory', 'subcategory');
        $subcategories = SubCategory::create(["name" => ["ar" => "اجهزة كهربائية", "en" => "Electronics", "so" => "Elektrooniga"], "category_id" => 6])->addMedia(public_path('subcategory/4.png'))->toMediaCollection('subcategory', 'subcategory');
    }
}
