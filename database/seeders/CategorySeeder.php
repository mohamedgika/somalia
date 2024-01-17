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

        $categories = Category::create(["name"=>"Vehicles"])->addMedia(public_path('category/1.png'))->toMediaCollection('category','category');
        Input::create([
            'category_id'=>$categories->id,
            'inputs'=>json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]')
        ]);
        $categories = Category::create(["name"=>"Property"])->addMedia(public_path('category/6.png'))->toMediaCollection('category','category');
        Input::create([
            'category_id'=>$categories->id,
            'inputs'=>json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]')

        ]);
        $categories = Category::create(["name"=>"SmartPhone"])->addMedia(public_path('category/2.png'))->toMediaCollection('category','category');
        Input::create([
            'category_id'=>$categories->id,
            'inputs'=>json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]')

        ]);
        $categories = Category::create(["name"=>"Computer"])->addMedia(public_path('category/3.png'))->toMediaCollection('category','category');
        Input::create([
            'category_id'=>$categories->id,
            'inputs'=>json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]')

        ]);
        $categories = Category::create(["name"=>"Home & Living"])->addMedia(public_path('category/5.png'))->toMediaCollection('category','category');
        Input::create([
            'category_id'=>$categories->id,
            'inputs'=>json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]')

        ]);
        $categories = Category::create(["name"=>"Electronics"])->addMedia(public_path('category/4.png'))->toMediaCollection('category','category');
        Input::create([
            'category_id'=>$categories->id,
            'inputs'=>json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]')

        ]);
    }
}
