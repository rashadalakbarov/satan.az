<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Config;
use App\Models\Category;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            $company = [
                'name' => Config::get('site_name'),
                'logo' => Config::get('logo'),
                'favicon' => Config::get('favicon'),
                'about' => Config::get('about'),
            ];

            $categories = Category::where('parent_id', null)->get();

            // $socialSettings = Config::where('key', 'like', '%_url')->get();

            $view->with([
                'company' => $company,
                'categories'=> $categories,
                'socials'=> Config::where('type', 'social')->get(),
                // 'socialSettings' => $socialSettings,
            ]);
        });
    }
}
