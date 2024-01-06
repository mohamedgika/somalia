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

        $sub = array(
            array(
                "name" => "BASIC",
                "desc" => "Lorem ipsum dolor sit consectetur.
                       Lorem ipsum dolor sit consectetur.
                       Lorem ipsum dolor sit consectetur.",
                "price" => "5",
            ),
            array(
                "name" => "GOLD",
                "desc" => "Lorem ipsum dolor sit consectetur.
                       Lorem ipsum dolor sit consectetur.
                       Lorem ipsum dolor sit consectetur.",
                "price" => "8",
            ),

        );

        DB::table('subscriptions')->insert($sub);
    }
}
