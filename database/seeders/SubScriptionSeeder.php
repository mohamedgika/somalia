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
                "desc" => json_encode(['desc1' => 'Lorem ipsum dolor sit consectetur.', 'desc2' => '- Lorem ipsum dolor sit consectetur.','desc3' => '- Lorem ipsum dolor sit consectetur.']),
                "price" => "5",
            ),
            array(
                "name" => "GOLD",
                "desc" => json_encode(['desc1' => 'Lorem ipsum dolor sit consectetur.', 'desc2' => '- Lorem ipsum dolor sit consectetur.','desc3' => '- Lorem ipsum dolor sit consectetur.']),
                "price" => "8",
            ),

        );

        DB::table('subscriptions')->insert($sub);
    }
}
