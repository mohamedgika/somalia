<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Ads;
use App\Models\Shop;
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

            //Ads Not Active
            $ads_not_active = $ads->where('is_active', 0)->count();
            view()->share('adsNotActive', $ads_not_active);

            $adses = Ads::where('is_active', 0)->get();
            view()->share('adses', $adses);

            //Shop Not Active
            $shop_not_active = Shop::where('is_active', 0)->count();
            view()->share('shopNotActive', $shop_not_active);

            $shops = Shop::where('is_active', 0)->get();
            view()->share('shops', $shops);

            //ShopAds Not Active
            $shop_not_active = Shop::where('is_active', 0)->count();
            view()->share('shopNotActive', $shop_not_active);

            $shops = Shop::where('is_active', 0)->get();
            view()->share('shops', $shops);

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
