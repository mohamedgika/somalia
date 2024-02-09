<?php

namespace Database\Seeders;

use App\Models\Input;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        $categories_1 = Category::create(["name" => ["ar" => "سيارات", "en" => "Vehicles", "so" => "Gawaarida"]])->addMedia(public_path('category/1.png'))->toMediaCollection('category', 'category');

        $categories_2 = Category::create(["name" => ["ar" => "عقارات", "en" => "Property", "so" => "Hanti"]])->addMedia(public_path('category/6.png'))->toMediaCollection('category', 'category');

        $categories_3 = Category::create(["name" => ["ar" => "هواتف ذكيه", "en" => "SmartPhone", "so" => "Taleefanka Casriga Ah"]])->addMedia(public_path('category/2.png'))->toMediaCollection('category', 'category');

        $categories_4 = Category::create(["name" => ["ar" => "حاسوب", "en" => "Computer", "so" => "Kombiyuutarka"]])->addMedia(public_path('category/3.png'))->toMediaCollection('category', 'category');

        $categories_5 = Category::create(["name" => ["ar" => "منازل", "en" => "Home & Living", "so" => "Guriga & Nolosha"]])->addMedia(public_path('category/5.png'))->toMediaCollection('category', 'category');

        $categories_6 = Category::create(["name" => ["ar" => "اجهزة كهربائية", "en" => "Electronics", "so" => "Elektrooniga"]])->addMedia(public_path('category/4.png'))->toMediaCollection('category', 'category');

    }
}
