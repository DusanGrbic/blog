<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Post;
use App\Billing\Stripe;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        
        \View::composer('templates.partials.sidebar', function ($view){
            $view->with('archives', Post::archives())
                    ->with('tags', Tag::has('posts')->oldest()->pluck('name'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Stripe::class, function (){
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
