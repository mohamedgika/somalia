<?php

namespace Database\Seeders;

use App\Models\SubScription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubScriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subscriptions')->delete();

        $sub = SubScription::create([
            "name"=>"BASIC",
            "desc"=>"Lorem ipsum dolor sit consectetur.
                       Lorem ipsum dolor sit consectetur.
                       Lorem ipsum dolor sit consectetur.",
            "price"=>"5",
        ]);
        $sub = SubScription::create([
            "name"=>"GOLD",
            "desc"=>"Lorem ipsum dolor sit consectetur.
                       Lorem ipsum dolor sit consectetur.
                       Lorem ipsum dolor sit consectetur.",
            "price"=>"8",
        ]);
    }
}
