<?php

namespace Database\Seeders;

use App\Models\Input;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Input::create([
            'inputs' => json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]'),
            'category_id' => 1,
        ]);
        Input::create([
            'inputs' => json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]'),
            'category_id' => 2,
        ]);
        Input::create([
            'inputs' => json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]'),
            'category_id' => 3,

        ]);
        Input::create([
            'inputs' => json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]'),
            'category_id' => 4,

        ]);
        Input::create([
            'inputs' => json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]'),
            'category_id' => 5,

        ]);
        Input::create([
            'inputs' => json_decode('[{"name":"model","type":"string"},{"name":"year","type":"string"}]'),
            'category_id' => 6,
        ]);
    }
}
