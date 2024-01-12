<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Ads;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            // Get all ads
            $ads = Ads::all();

            // Total number of ads
            $totalAds = $ads->count();
            view()->share('totalAds', $totalAds);


            // Number of ads monthly
            $now = Carbon::now();
            $adsMonthly = Ads::whereMonth('created_at', $now->month)->count();
            view()->share('adsMonthly', $adsMonthly);


            // Number of ads daily
            $adsDaily = Ads::whereDate('created_at', $now->toDateString())->count();
            view()->share('adsDaily', $adsDaily);


        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
