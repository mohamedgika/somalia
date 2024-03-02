<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ads;
use App\Charts\AdsChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function chart()
    {
        $today_ads = Ads::whereDate('created_at', today())->count();
        $yesterday_ads = Ads::whereDate('created_at', today()->subDays(1))->count();
        $ads_2_days_ago = Ads::whereDate('created_at', today()->subDays(2))->count();

        $chart = new AdsChart;
        $chart->labels(['2 days ago', 'Yesterday', 'Today']);
        $chart->dataset('My dataset', 'line', [$ads_2_days_ago, $yesterday_ads, $today_ads]);
    }
}
